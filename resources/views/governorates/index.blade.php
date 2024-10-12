@extends('layouts.app')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>

          Governorates

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
      <h3 class="card-title">List of Governorates</h3>
    </div>

    <div class="box-body">

    <div class ="form-group">
      <a href="{{url(route('governorates.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i> New Governorate
                        </a>
          <br>
        @include('flash::message')

      </div>

      @if(count($records))
        <div class="table-responsive">
          <table class="table table-bordered">
           <thead>
             <tr>
               <th>#</th>
               <th>  Name  </th>
               <th class="text-center">  Edit  </th>
               <th class="text-center">  Delete  </th>
             </tr>
            </thead>

            <tbody>
               @foreach($records as $record)
                   <tr>
                      <td>  {{$loop->iteration}}  </td>
                      <td>  {{$record->name}}  </td>
                      <td class="text-center"> <a href="{{url(route('governorates.edit',$record->id))}}" class="btn btn-success btn-xs"> <i class="fa fa-edit"></i></a> </td>
                      <td class="text-center">
                          {!!Form::open([
                              'action' => ['GovernorateController@destroy',$record->id],
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
