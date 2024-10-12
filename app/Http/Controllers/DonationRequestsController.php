<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonationRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;


class DonationRequestsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:donationRequests-list|donationRequests-delete', ['only' => ['index','show']]);
        $this->middleware('permission:donationRequests-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = DonationRequest::paginate(20);
        return view('DonationRequests.index',compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requests = DonationRequest::findOrfail($id);
        return view('DonationRequests.show',compact('requests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
       // $request = DonationRequest::findOrfail($id);
        //$request->update($request->all());
       // flash()->success('Edited successfully');
      //  return redirect(route('DonationRequests.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = DonationRequest::findOrfail($id);
        $request->delete();
        flash()->success('deleted');
        return redirect(route('DonationRequests.index'));
    }
}
