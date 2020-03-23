@extends('user.layout')
 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add User</a></h2>
<br>
 
<form action="{{ route('user.store') }}" method="POST" name="add_user" enctype="multipart/form-data">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Name</strong>
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Email</strong>
            <input type="text" name="email" class="form-control" placeholder="Enter Email ">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Password</strong>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
            <span class="text-danger">{{ $errors->first('password') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Image</strong>
            <input type="file" class="form-control"  name="image">
            <span class="text-danger">{{ $errors->first('image') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection