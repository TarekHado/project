@extends('layouts.app')
@inject('model','App\City')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>

                        Showing Message

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
                <h3 class="card-title">Message: </h3>
            </div>

            <div class="box-body">
                <div class="box-header with-border">
                    <br>
                    &emsp; <b>{{$link->message}}</b><br><br>

                    <!-- /.box-tools -->
                </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
