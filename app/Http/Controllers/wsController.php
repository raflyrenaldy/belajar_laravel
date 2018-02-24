<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\workspaces;

class wsController extends Controller
{
     public function index()
    {
         $workspaces = \DB::table('workspaces')
         ->join('client', 'client.client_id', '=', 'workspaces.id_clients')
         ->join('room', 'room.room.id', '=', 'workspaces.id_room')
         ->select('client.name, client.no_account, client.join_date, room.room ,workspace.dates, workspaces.video')
         ->get();        
        return view('workspace', compact('workspaces'));
    }
 
   public function workspace()
    {
        return view('workspace');
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
        $workspaces = new workspaces([
          'id_client' => $request->get('id_client'),
          'id_room' => $request->get('id_room'),
          'dates' => $request->get('dates'),
          'video' => $request->get('video')
        ]);
 
        $workspaces->save();
        return redirect('/');
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
