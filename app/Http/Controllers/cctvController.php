<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;
use App\workspaces;
use App\clients;
use App\rooms;
use Gate;
use File;
use Auth;

class cctvController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $workspaces = \DB::table('workspaces')
         ->join('clients', 'clients.client_id', '=', 'workspaces.id_clients')
         ->join('rooms', 'rooms.room_id', '=', 'workspaces.id_room')
         ->select('workspaces.*', 'clients.nama', 'clients.no_account', 'clients.join_date', 'rooms.room')
         ->orderBy('workspaces_id')
         ->paginate(10);      
          $client=clients::all();  
          $room = rooms::all();
           $user = Auth::user();

        return view('cctv', compact('workspaces','user'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function search(Request $request)
    {
         $query = $request->get('keyword');        
        $workspaces= workspaces::where('workspaces_id', 'like', '%' . $query . '%')
        ->orWhere('video', 'like', '%' . $query . '%')
        ->orWhere('dates', 'like', '%' . $query . '%');
        $workspaces = $workspaces->paginate(10);
         $user = Auth::user();
        return view('cctv', compact('workspaces','user'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
