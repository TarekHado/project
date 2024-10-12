@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>

          Edit Governorates

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
      <h3 class="card-title">Edit the Category</h3>
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

      <form action="{{route('category.update',$Category->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PATCH')}}
         <div class="form-group">
           <label for ="name">Name</label>
           {!! Form::text('name',null,[
                 'class' => 'form-control'
           ])!!}
         </div>

         <div class="form-group">
           <button class="btn btn-primary" type="submit">Edit</button>
         </div>


</form>
    </div>
  <!-- /.card -->

</section>
<!-- /.content -->

@endsection
