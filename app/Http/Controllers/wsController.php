<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\workspaces;
use App\clients;
use App\rooms;
use App\User;
use Auth;
use Gate;
use File;
date_default_timezone_set('Asia/Jakarta');
class wsController extends Controller
{
     public function index()
    {
        
         $workspaces = \DB::table('workspaces')
         ->join('clients', 'clients.client_id', '=', 'workspaces.id_clients')
         ->join('rooms', 'rooms.room_id', '=', 'workspaces.id_room')
         ->select('workspaces.*', 'clients.nama', 'clients.no_account', 'clients.join_date', 'rooms.room')
         ->orderBy('workspaces_id')
         ->get();      
          $client=clients::all();  
          $room = rooms::all();
          $user = Auth::user();
        return view('workspace', compact('workspaces', 'client', 'room','user'));

    }
   

    public  function showUploadForm()
    {
        return view('workspace');

    }


 
    public function findClientName(Request $request){


        //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        $data=clients::select('nama','client_id')->where('client_id',$request->id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
    }

   public function workspace()
    {
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home2()
    {
        return view('');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('file')){

            $filename = $request->file->getClientOriginalName();
            $name_only = pathinfo($filename, PATHINFO_FILENAME);
            $ext_only =  $request->file->getClientOriginalExtension();

            $name = $name_only.'-'.date('His').'.'.$ext_only;
            // dd($name);
            $request->file->storeAs('public/upload', $name);         
           $workspaces = new workspaces([
          'id_clients' => $request->get('id_clients'),
          'id_room' => $request->get('id_room'),
          'video' => $name
        ]);

    

        $workspaces->save();
        return redirect('/workspace');
        }
        
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
     public function hapus($workspaces_id)
    {
        
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function destroy(Request $request)
    {
      
        $workspaces = workspaces::findOrFail($request->workspaces_id);
       
    File::delete($workspaces->photo);
        $workspaces->delete();
        return back();
    }
}
