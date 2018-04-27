<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\workspaces;
use App\clients;
use App\rooms;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = clients::count();
        $workspaces = workspaces::count();
        $rooms = rooms::count();
        $user = Auth::user();
        return view('home', compact('user','clients','workspaces','rooms'));
    }
}
