@extends('layouts.app')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>

                        Donation Requests

                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">


        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Donation Requests</h3>
            </div>

            <div class="box-body">

                @if(count($requests))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>  Name  </th>
                                <th>phone</th>
                                <th>Blood Type</th>
                                <th class="text-center">  Show  </th>
                                <th class="text-center">  Delete  </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($requests as $request)
                                <tr>
                                    <td>  {{$loop->iteration}}  </td>
                                    <td>  {{$request->patient_name}}  </td>
                                    <td>  {{$request->patient_phone}}  </td>
                                    <td>  {{$request->bloodType->name}}  </td>
                                    <td class="text-center"> <a href="{{url(route('donation-requests.show',$request->id))}}" class="btn btn-success btn-xs"> <i class="fa fa-info"></i></a> </td>
                                    <td class="text-center">
                                        {!!Form::open([
                                            'action' => ['DonationRequestsController@destroy',$request->id],
                                            'method' => 'delete'
                                          ])!!}

                                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"></i>X</button>

                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                @else
                    <div class="alert alert-alert" role="alert">
                        No Data
                    </div>
                @endif
            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
