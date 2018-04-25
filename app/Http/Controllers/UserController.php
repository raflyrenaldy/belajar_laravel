<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\User;
use Auth;
use File;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
          $user = Auth::user();
       
        return view('setting',compact('user'));
    }
    public function setting()
    {
        $user = Auth::user();
        return view('setting',compact('user'));
    }
     public function edit(User $user)
    {   
        $user = Auth::user();
        return view('setting', compact('user'));
    }


    public function update(request $request)
    {

  

if ($request->file('file') == null) {
     $user = Auth::user();
                 
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
  
}else{
   $user = Auth::user();
   if ($request->hasFile('file')){

             $filename = $request->file->getClientOriginalName();
            $name_only = pathinfo($filename, PATHINFO_FILENAME);
            $ext_only =  $request->file->getClientOriginalExtension();

            $name = $name_only.'-'.date('His').'.'.$ext_only;
            $request->file->storeAs('public/avatar', $name); 
            $user->avatar = $name;    

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
    }
             //$request->file('avatar')->store('public/avatar');
}
        
       
        
        $user->save();
        return back()->with('success','Upload Berhasil');
    }
}
