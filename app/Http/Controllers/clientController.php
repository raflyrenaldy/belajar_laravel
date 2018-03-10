<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clients;

class clientController extends Controller
{
    public function index()
    {
         $clients = clients::all();
        
        return view('client.client', compact('clients'));
    }
      public function client()
    {
        return view('client.client');
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
    public function show($client_id)
    {
          // mengambil semua users untuk di jadikan dropdwon list pemilik di form create
 
        $users = \App\User::all();
 
        // melempar ke view di file create.blade.php yang berada di folder crud/kendaraan, sekaligus mengirim data user yang disimpan di variable $users dan data yg akan di edit yaitu $showById
        $client = \App\clients::find($client_id);
 
        return view('client.edit', compact('client', 'client_id'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($client_id)
    {
      
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
            $client = clients::find($client_id);
        $client->nama = $request->get('nama');
        $client->no_account = $request->get('no_account');
        $client->join_date = $request->get('join_date');
        $client->save();
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
