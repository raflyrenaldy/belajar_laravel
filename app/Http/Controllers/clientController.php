<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clients;
class clientController extends Controller
{
    public function index()
    {
         $clients = clients::all()->toArray();
        
        return view('home', compact('clients'));
    }
      public function client()
    {
        return view('client');
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
        $clients = new clients([
          'id' => $request->get('id'),
          'nama' => $request->get('nama'),
          'no_account' => $request->get('no_account'),
          'join_date' => $request->get('join_date'),
          'description2' => $request->get('description2')
        ]);
 
        $clients->save();
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
