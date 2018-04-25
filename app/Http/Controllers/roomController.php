<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rooms;
use App\User;
use Auth;
class roomController extends Controller
{
    public function index()
    {
         $rooms = rooms::all();
        $user = Auth::user();
        return view('room', compact('rooms','user'));
    }
      public function room()
    {
        return view('room');
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rooms = new rooms([
          'room' => $request->get('room')         
        ]);
 
        $rooms->save();
        return redirect('/room');
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
   public function update(Request $request)
    {
        $rooms = rooms::findOrFail($request->room_id);
        $rooms->update($request->all());
     

      
        return back();
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy(Request $request)
    {
      
        $rooms = rooms::findOrFail($request->room_id);
       
        $rooms->delete();
        return back();
    }
}
