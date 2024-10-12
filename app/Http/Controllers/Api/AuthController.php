<?php

namespace App\Http\Controllers\Api;


use App\CreateTokens;
use App\DonationRequest;
use App\Notifaction;
use App\Post;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;






class AuthController extends Controller
{
    private function apiResponse($status, $message, $data = null)
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'status' => $data,
        ];

        return response()->json($response);
    }

    public function register(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'city_id' => 'required',
            'phone' => 'required',
            'last_donation_request' => 'required',
            'blood_type' => 'required|in: O-,O+,A-,A+,B-,B+,AB-,AB+',
            'password' => 'required|confirmed',
            'email' => 'required|unique:clients'
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(0, 'validation error', $validator->errors());
        }
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = str::random(60);
        $client->save();
        return $this->apiResponse(1, 'added successfully', ['api_token' => $client->api_token,
            'client' => $client]);
    }

    public function login(Request $request)
    {
        $validator = validator()->make($request->all(), [

            'phone' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(0, 'validation error', $validator->errors());
        }

        $client = Client::where('phone', $request->phone)->first();
        if ($client) {

            if (Hash::check($request->password, $client->password)) {
                return $this->apiResponse(1, 'logged in successfully', [
                    'api_token' => $client->api_token,
                    'client' => $client
                ]);
            } else {
                return $this->apiResponse(0, 'Wrong Data');
            }

        } else {
            return $this->apiResponse(0, 'Wrong Data');
        }
    }

    public function reset(Request $request)
    {
        $user = Client::where('phone', $request->phone)->first();
        if ($user) {
            $code = rand(1111, 9999);
            $update = $user->update(['pin_code' => $code]);
            if ($update) {
                Mail::to($user->email)
                    ->bcc("tarekhado1234@gmail.com")
                    ->send(new ResetPassword($code));

                return $this->apiResponse(1, 'please check your phone', ['pin_code_for_test' => $code]);

            } else {
                return $this->apiResponse(0, 'error,please try again');
            }
        } else {
            return $this->apiResponse(0, 'there is no account related to this phone');
        }

    }








    public function password(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'pin_code' => 'required',
            'password' => 'required'
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return $this->apiResponse(0, $validation->errors()->first(), $data);
        }

        $user = Client::where('pin_code', $request->pin_code)->where('pin_code', '!=', 0)->first();

        if ($user) {
            $user->password = bcrypt($request->password);
            $user->pin_code = null;

            if ($user->save()) {
                return $this->apiResponse(1, 'Password changed successfully');
            } else {
                return $this->apiResponse(0, 'error,please try again');
            }

        } else {
            return $this->apiResponse(0, 'This pin code is not illegible');
        }
    }


    public function registerToken(Request $request)
    {
        $validation = validator()->make($request->all(),[
            'token' => 'required',
            'platform' => 'required|in:android,os'
        ]);

        if($validation->fails())
        {
            $data = $validation->errors;
            return $this->apiResponse(0, $validation->errors()->first(), $data);
        }

        CreateTokens::where('token',$request->token)->delete();
        $request->user()->token()->create($request->all());
        return $this->apiResponse(1, 'registered successfully');

    }

    public function removeToken(Request $request)
    {
        $validation = validator()->make($request->all(),[
            'token' => 'required'
        ]);

        if($validation->fails())
        {
            $data = $validation->errors;
            return $this->apiResponse(0, $validation->errors()->first(), $data);
        }

        CreateTokens::where('token',$request->token)->delete();

        return $this->apiResponse(1, 'deleted successfully');

    }

    public function myProfile(Request $request)
    {
       $user = $request->user();
       $user->update($request->all());
    }

}




