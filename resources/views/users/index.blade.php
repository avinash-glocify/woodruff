@extends('layouts.auth')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="mr-md-3 mr-xl-5">
            <h2>Users</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="">
              <a href="{{route('user.create')}}" class="btn btn-success mb-3 float-right btn-rounded">Add New</a>
            </div>
            @if(Session::has('success'))
              <div class="d-flex justify-content-between align-items-end flex-wrap">
                <div class="alert alert-success col-md-12 text-center">
                  {{ Session::get('success')}}
                </div>
              </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                      <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $key => $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                          <div class="template-demo justify-content-between flex-nowrap">
                            <a type="button" href="javascript:void(0);" data-url="{{ route('user.destroy', [$user->id])}}"  title="Delete" class="btn btn-danger btn-rounded btn-icon p-2 del-btn @if(Auth::user()->id == $user->id) disabled @endif"><i class="mdi mdi-delete-forever"></i></a>
                            <a type="button" href="{{ route('user.edit', [$user->id])}}"  title="Edit" class="btn btn-info btn-rounded btn-icon p-2"><i class="mdi mdi-grease-pencil"></i></a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
