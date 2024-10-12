@extends('layouts.app')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>

                        Clients

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
                <h3 class="card-title">Your Clients</h3>
            </div>

            <div class="box-body">


                @if(count($client))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="text-center">  more info  </th>
                                <th class="text-center">  delete  </th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($client as $Client)
                                <tr>
                                    <td>  {{$loop->iteration}}  </td>
                                    <td>  {{$Client->name}}  </td>
                                    <td>  {{$Client->email}}  </td>
                                    <td>  {{$Client->phone}}  </td>
                                    <td class="text-center"> <a href="{{url(route('clients.show',$Client->id))}}" class="btn btn-success btn-xs"> <i class="fas fa-info"></i></a> </td>
                                    <td class="text-center">
                                        {!!Form::open([
                                            'action' => ['ClientsController@destroy',$Client->id],
                                            'method' => 'delete'
                                          ])!!}

                                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-trash-o"></i>X</button>

                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                @else
                    <div class="alert alert-alert" role="alert">
                        No Links
                    </div>
                @endif
            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
