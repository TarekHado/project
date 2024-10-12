@extends('layouts.app')
@inject('model','App\Category')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>

                        Post

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
                <h3 class="card-title">A post details: </h3>
            </div>

            <div class="box-body">
                <div class="box-header with-border">
                @if($post->category)
                    &emsp;Category of the post :   {{$post->category->name}}
                @endif
                    <br><br>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i>{{$post->title}}</i>

                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            &emsp;&emsp; <img src="/images/{{$post->image}}">
                            <br><br><br>

                            <p>{{$post->content}}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>



                    <!-- /.box-tools -->
                </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
