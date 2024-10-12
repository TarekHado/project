@extends('layouts.app')
@inject('model','App\City')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>

          Create Cities

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
      <h3 class="card-title">Create Cities</h3>
    </div>

    <div class="box-body">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
      @endif

      {!! Form::model($model,[

         'action' => 'CityController@store'

        ]) !!}

         <div class="form-group">
           <label for ="name">Name</label>
           {!! Form::text('name',null,[
                 'class' => 'form-control'
           ])!!}
         </div>

         <div class="form-group">
           <button class="btn btn-primary" type="submit">Add</button>
         </div>

         <div>
           <select name= "governorate_id" for"governorate_id" id="capital" class="form-control my-3">
             <option>governorate</option>
             @foreach($governorates as $governorate)
             <option value="{{$governorate->id}}">{{$governorate->name}}</option>
             @endforeach
           </select>
         </div>




      {!! Form::close() !!}

    </div>
  <!-- /.card -->

</section>
<!-- /.content -->

@endsection
