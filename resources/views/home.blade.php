@extends('layouts.app')

@section('content')

<div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--search start-->
            
            <!--search end-->

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">
                   
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('storage/avatar/'.$user->avatar)}}" alt="" />
                           {{$user->name}}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                  <li><a href="{{URL::to('/setting')}}"><i class="fa fa-cog"></i>  Settings</a></li>
                            <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Log Out</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
          </div>
            <!--notification menu end -->

<!-- page heading start-->
        <div class="page-heading">
            <h3>
                Dashboard
            </h3>
            
               
               
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
             <div class="row">
                <div class="col-md-6">
                    <!--statistics start-->
                    <div class="row state-overview">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel purple" href="Keuangan.php?page=admin/Keuangan">
                                <div class="symbol">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value" align="center">CLIENTS</div>
                                    <div class="title" align="center">{{$clients}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel red" href="StockBarang.php?page=admin/StockBarang">
                                <div class="symbol">
                                    <i class="fa fa-plus-square-o"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value" align="center">ROOMS</div>
                                    <div class="title" align="center">{{$rooms}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <!--statistics end-->
                </div>
               <div class="col-md-6">
                    <!--statistics start-->
                   <div class="row state-overview">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel blue" href="Pegawai.php?page=admin/Pegawai">
                                <div class="symbol">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value" align="center">WORKSPACES</div>
                                    <div class="title" align="center"> {{$workspaces}}</div>
                                </div>
                            </div>
                        </div>
                      
                    
              
                  <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel green" href="Penjualan.php?page=admin/Penjualan">
                                <div class="symbol">
                                    <i class="fa fa-video-camera"></i>
                                </div>
                                <div class="state-value">
                                  <div class="value" align="center">VIDEOS</div>
                                    <div class="title" align="center"> {{$workspaces}}</div>
                                </div>
                            </div>
                        </div>
                   </div>
                   
                </div>
        
        </div>
        <!--body wrapper end-->
        </div>

@endsection
