<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator,Redirect,Response,File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data['user'] = User::orderBy('id','asc')->paginate(10);
   
        return view('user.list',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }
   
          
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $email = $request['email'];
        $name = $request['name'];
        $password = $request['password'];
        $image = $request->file('image');

        if($image->isValid()){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('storage/users/'), $imageName);
            $user = new User();
            $user->email = $email;
            $user->name = $name;
            $user->image = $imageName;
            $user->password = $password;
            $user->save();
        }
           
        return Redirect::to('/user')
       ->with('success','Greate! User created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['user_info'] = User::where($where)->first();
 
        return view('user.edit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $image = $request->image;
        if($image->isValid()){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('storage/users/'), $imageName);
            $update = ['name' => $request->name, 'email' => $request->email, 'password' => $request->password, 'image' => $imageName];
        
            User::where('id',$id)->update($update);
        }
        return Redirect::to('user')
       ->with('success','Great! User updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
   
        return Redirect::to('user')->with('success','User deleted successfully');
    }
     
}
