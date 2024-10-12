<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Governorate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;


class GovernorateController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:governorate-list|governorate-create|governorate-edit|governorate-delete', ['only' => ['index']]);
        $this->middleware('permission:governorate-create', ['only' => ['create','store']]);
        $this->middleware('permission:governorate-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:governorate-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Governorate::paginate(20);
        return view('governorates.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('governorates.create');
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

         $records = Governorate::create($request->all());
        flash()->success('Added successfully');
        return redirect(route('governorates.index'));
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

        $record = Governorate::findOrfail($id);
        return view('governorates.edit',compact('record'));
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
            'name.required' => 'Name is required'
        ];
        $this->validate($request,$rules,$messages);

        $record = Governorate::findOrfail($id);
       $record->update($request->all());
       flash()->success('Edited successfully');
       return redirect(route('governorates.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Governorate::findOrfail($id);
        $record->delete();
        flash()->success('Deleted');
        return redirect(route('governorates.index'));
    }
}
