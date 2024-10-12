@extends('layouts.app')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>

                        Settings

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


            <div class="box-body">

                <div class ="form-group">
                    <a href="{{url(route('settings.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i> New Link
                    </a>
                    <br>
                    @include('flash::message')

                </div>
                @if(count($links))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">  Links  </th>
                                <th class="text-center">  About us  </th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($links as $link)
                                <tr>
                                    <td class="text-center">  {{$link->links}} </td>
                                    <td class="text-center"> <a href="{{url(route('settings.show',$link->id))}}" class="btn btn-success btn-xs"> <i class="fas fa-info"></i></a> </td>
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
