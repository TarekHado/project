<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Governorate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;


class CityController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:city-list|city-create|city-edit|city-delete', ['only' => ['index']]);
        $this->middleware('permission:city-create', ['only' => ['create','store']]);
        $this->middleware('permission:city-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:city-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cities = City::paginate(20);
      return view('cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates=Governorate::all();

        return view('cities.create',compact('governorates'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'name' =>'required'
      ];

      $messages = [
        'name.required' => 'Name is required'
      ];
     $this->validate($request,$rules,$messages);

      $cities = City::create($request->all());
     flash()->success('Added successfully');
     return redirect(route('cities.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $city = City::findOrfail($id);
      return view('cities.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' =>'required'
        ];

        $messages = [
            'name.required' => 'Name of the city is required'
        ];
        $this->validate($request,$rules,$messages);

      $city = City::findOrfail($id);
      $city->update($request->all());
      flash()->success('Edited successfully');
      return redirect(route('cities.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $city = City::findOrfail($id);
      $city->delete();
      flash()->success('Deleted');
      return redirect(route('cities.index'));
    }
}
