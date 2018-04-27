<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\User;
use App\Role;
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
        
         $posts = \DB::table('users')
         ->join('roles', 'roles.id', '=', 'users.role_id')
         ->select('users.*', 'roles.name AS nm', 'roles.full_name AS fn')
         ->orderBy('users.id')
         ->get();      
        return view('setting',compact('user','posts'));
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

  if($request->get('name') == null){

    
     $user = user::findOrFail($request->id);
     $user->role_id = $request->get('role_id');

  }else if ($request->file('file') == null) {
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
    public function destroy(Request $request)
    {
      
        $users = user::findOrFail($request->id);
       
        $users->delete();
        return back();
    }

    
}
