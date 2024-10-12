<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Contact;
use App\DonationRequest;
use App\Notifaction;
use App\Post;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Governorate;
use App\City;

class MainController extends Controller
{
    private function apiResponse($status,$message,$data=null){
      $response = [
        'status' => $status,
        'message' => $message,
        'data' => $data,
      ];

      return response()->json($response);
    }


    //function notifyByFirebase($title,$content,$tokens,$data=[])
    //{
      //   $registrationIDs = $tokens;

//         $fcmMsg = array (
  //           'body' => $body,
    //         'title' => $title,
      //       'sound' => 'default',
        //     'color' => '#203E78'
         //);


         //$fcmFields = array(
           //  'registration_ids' => $registrationIDs,
             //'priority' => 'high',
             //'notification' => $fcmMsg,
             //'data' => $data
         //);


    //}

    public function governorates()
    {
        $governorates = Governorate::all();
      return $this->apiResponse( 1, 'success', $governorates);
    }

    public function posts(Request $request)
    {

      $posts = Post::with('category')->where(function($post) use($request){
          if($request->category_id){
              $post->where('category_id',$request->category_id);
              $post->whereHas('category',function ($category) use($request){
                  $category->where('name','like','%'.$request->name.'%');
              });
          }
      })->latest()->paginate(20);
      return $this->apiResponse( 1, 'success', $posts);
    }

    public function index()
    {
      return view('Admin.index');
    }

    public function cities(Request $request)
    {
      $cities = City::where(function($query) use($request){
        if($request->has('governorate_id')){
           $query->where('governorate_id', $request->governorate_id);
        }
      })->get();
    return $this->apiResponse( 1, 'success', $cities);
    }

    public function donationRequestCreate(Request $request)
    {

        $validator = validator()->make($request->all(), [
        'patient_name' => 'required',
        'patient_age' => 'required:digits',
        'blood_type_id' => 'required:exists:blood_types',
        'bags_num' => 'required:digits',
        'hospital_address' => 'required',
        'city_id' =>'required:exists:cities,id',
        'patient_phone' =>'required|digits:11',
        'details' => ''
    ]);

        if($validator->fails())
        {
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $donationRequest = $request->user()->requests()->create($request->all());


        $clientsIds = $donationRequest->city->governorate->clients()->whereHas('bloodTypes',function($q) use ($request,$donationRequest){
          $q->where('blood_types.id',$donationRequest->blood_type_id);
        })->pluck('clients.id')->toArray();

        dd($clientsIds);


        if(count($clientsIds)) {
            $notification = $donationRequest->notifications()->create([
                'title' => 'I need a volunteer',
                'content' => $donationRequest->blood_type_id.'I need a volunteer for blood of type :'
            ]);
        }

        $notification->clients()->attach()($clientsIds);


        $tokens = $clients->token()->where('token', '!=' , '')
            ->whereIn('client_id' , $clientsIds)->pluck('token')->toArray();

        if(count($tokens)){
            $audience = ['include_players_id'=> $tokens];
            $content = [
                'ar' => 'يوجد إشعار من   ل   ' . $request->user()->name(),
                'en' => ' you have new notification' . $request->user()->name(),
            ];

            $title = $notification->tittle;
            $content = $notification->content;
            $data = [
              'action' => ' new notify',
              'data' => null ,
              'client' => 'client',
              'tittle'  => $notification->tittle,
                'content' => $notification->content,
               'donation_request_id' => $donationRequest->id
            ];

           // info(json_encode($data));

            //$send = notifyByFirebase($title,$content,$tokens,$data);
            //info($send);
            //info('firebase result' . $send);
            //$send = json_decode($send);


        }

          return $this->apiResponse(1, 'request added successfully',compact('donationRequest'));
    }


    public function Notifications(Request $request)
    {

        $notification = Notifaction::paginate(20)->first();

       // $items = $request->user()->notifications()->latest()->paginate(20);
        //return $this->apiResponse(1, 'loaded...',$items);
    }


    public function notificationSettings(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'api_token' => 'required',
            'governorates' => 'required',
            'blood_types' => 'required:exists:blood_types'
        ]);

        if($validator->fails())
        {
            return $this->apiResponse(0,'data error');
        }

        else
        {
            return $this->apiResponse(1, 'selected');
        }
    }

    public function settings(){
        $settings=Setting::all();
        return $this->apiResponse(1, 'loaded',$settings);
    }


    public function Favourites(Request $request)
    {
        $request->user->favourites()->toggle($request->post_id);
        return $this->apiResponse(1, 'favored');
        $client = Client;
        $isFavored = $client->favourites()->where('post_id', $post)->count();

            if ($isFavored == 0) {
                $client->favourites()->attach($post);
            } else {
                $client->favourites()->detach($post);
            }
    }

    public function postFavourite(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'post_id' => 'required|exists:posts,id'
        ]);

        if($validator->fails())
        {
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $toggle = $request->user()->posts()->toggle($request->post_id);
        return $this->apiResponse(1,"success",$toggle);

    }




    public function post($id)
    {
        $post=Post::findOrFail(id);
    }

    public function donationRequests()
    {
        $donationRequests=DonationRequest::paginate(20);
        return $this->apiResponse(1,'Available donation requests',$donationRequests);
    }

    public function donationRequest(Request $request)
    {
        $donationRequest=$request->donationRequest();

    }

    public function contact()
    {
        $contact=Contact::paginate(20);
        return $this->apiResponse('Try to contact us through :  ',$contact);
    }
}
