@extends('layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>

                       Client Details

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
                <h3 class="card-title">About Client:</h3>
            </div>

            <div class="box-body">
                <div class="box-header with-border">
                    &emsp;&emsp;Name: {{$client->name}}
                    &emsp; &emsp;Email: {{$client->email}}
                    &emsp; &emsp;Phone: {{$client->phone}}

                    <br><br>
                    &emsp; &emsp;Date of birth: {{$client->date_of_birth}}
                    &emsp; &emsp;Last donation request: {{$client->last_donation_request}}
                    &emsp; &emsp;Blood Type: {{$client->bloodType->name}}
                    &emsp; &emsp;City: {{$client->city->name}}

                    <br><br>







                    <!-- /.box-tools -->
                </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
