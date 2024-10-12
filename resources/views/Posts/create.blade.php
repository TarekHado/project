@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>

          Create Posts

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
      <h3 class="card-title">Create a post</h3>
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

          <form  enctype="multipart/form-data" action="{{route('posts.store')}}" method="post">
            @csrf
         <div class="form-group">
           <label for ="title">Title</label>
           <input type="text" for="title" name="title">
         </div>

          <input type="text" name="content" for="content">

          <div>
              <input type="file" for="image" name="image">
          </div>
         <div class="form-group">
           <button class="btn btn-primary" type="submit">Add</button>
         </div>

         <div>
           <select name= "categeory_id" for="categeory_id" id="capital" class="form-control my-3">
             <option>Category</option>
             @foreach($categories as $Category)
             <option value="{{$Category->id}}">{{$Category->name}}</option>
             @endforeach
           </select>
         </div>




          </form>

    </div>
  <!-- /.card -->

</section>
<!-- /.content -->

@endsection
