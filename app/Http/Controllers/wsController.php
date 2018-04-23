<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\workspaces;
use App\clients;
use App\rooms;
use Gate;
class wsController extends Controller
{
     public function index()
    {
        
         $workspaces = \DB::table('workspaces')
         ->join('clients', 'clients.client_id', '=', 'workspaces.id_clients')
         ->join('rooms', 'rooms.room_id', '=', 'workspaces.id_room')
         ->select('workspaces.*', 'clients.nama', 'clients.no_account', 'clients.join_date', 'rooms.room')
         ->get();      
          $client=clients::all();  
          $room = rooms::all();
        return view('workspace', compact('workspaces', 'client', 'room'));

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
            $request->file->storeAs('public/upload',$filename);         
           $workspaces = new workspaces([
          'id_clients' => $request->get('id_clients'),
          'id_room' => $request->get('id_room'),
          'video' => $filename
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
 public function destroy($id)
    {
           $workspaces = workspaces::find($id);
        $workspaces ->delete();
        return redirect('workspace');
    }
}
