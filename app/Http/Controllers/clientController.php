<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clients;

class clientController extends Controller
{
    public function index()
    {
         $clients = clients::all();
        
        return view('client', compact('clients'));
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
          'ganti' => $request->get('ganti'),
          'nama' => $request->get('nama'),
          'no_account' => $request->get('no_account'),
          'join_date' => $request->get('join_date'),
          'description2' => $request->get('description2')
        ]);
 
        $clients->save();
        return redirect('/client');
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
    public function edit($client_id)
    {
        $clients = clients::findOrFail($client_id);
        
        return view('clientedit', compact('clients','client_id'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $clients = clients::find($client_id);
        $clients->client_id = $request->get('client_id');
        $clients->nama = $request->get('nama');
        $clients->no_account = $request->get('no_account');
        $clients->join_date = $request->get('join_date');
        $clients->save();
        return redirect('/client');
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
