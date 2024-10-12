@extends('layouts.app')
@inject('model','App\City')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>

                        A donation request

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
                <h3 class="card-title">Donation Request details</h3>
            </div>

            <div class="box-body">
                <div class="box-header with-border">
                    &emsp;&emsp;&emsp;Name: {{$requests->patient_name}}
                    &emsp;&emsp;&emsp;Phone: {{$requests->patient_phone}}
                    &emsp;&emsp;&emsp;Blood Type: {{$requests->bloodType->name}}
                    &emsp;&emsp;&emsp;Age :{{$requests->patient_age}}
                    &emsp;&emsp;&emsp;Number of bags needed: {{$requests->bags_num}}
                    <br><br>
                    &emsp;&emsp;&emsp;City: {{$requests->city->name}}
                    &emsp;&emsp;&emsp;Hospital Name: {{$requests->hospital_name}}
                    &emsp;&emsp;&emsp;Hospital Address: {{$requests->hospital_address}}
                    &emsp;&emsp;&emsp;Details: {{$requests->details}}

                    <br><br>



                    <!-- /.box-tools -->
                </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
