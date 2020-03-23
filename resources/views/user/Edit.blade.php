@extends('user.layout')
 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit user</a></h2>
<br>
 
<form action="{{ route('user.update', $user_info->id) }}" method="POST" name="update_user" enctype="multipart/form-data">
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Name</strong>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $user_info->name }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>email</strong>
            <input type="text" name="email" class="form-control" placeholder="Enter user email" value="{{ $user_info->email }}">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>password</strong>
            <input class="form-control" type="text" name="password" placeholder="Enter Description" value="{{ $user_info->password }}">
            <div class="avatar-edit">
                     <img id="image" src= "{{ asset ('storage/users/'.$user_info->image) }}"  width="200" height="150" >
               </div>
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