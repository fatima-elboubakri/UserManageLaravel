@extends('user.layout')
   
@section('content')
  <a href="{{ route('user.create') }}" class="btn btn-success mb-2">Add</a> 
  <br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>name</th>
                 <th>email</th>
                 <th>image</th>
                 <th>Created at</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($user as $user)
              <tr>
                 <td>{{ $user->id }}</td>
                 <td>{{ $user->name }}</td>
                 <td>{{ $user->email }}</td>
                 <td>
                 <div class="avatar-edit">
                     <img id="image" src= "{{ asset ('storage/users/'.$user->image) }}"  width="200" height="150" >
               </div>
                 
                 </td>
                 <td>{{ date('Y-m-d', strtotime($user->created_at)) }}</td>
                 <td><a href="{{ route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('user.destroy', $user->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
        
       </div> 
   </div>
 @endsection  