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
                Setting
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
               
                <li class="active"> Setting Profile </li>
            </ul>
        </div>
        <div class="wrapper">
 <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Setting Profile
            </header>
            <div class="panel-body">
               
                    <form method="post" action="{{route('users.update', $user)}}" class="form-horizontal adminex-form" enctype="multipart/form-data">
                {{ csrf_field() }}
    {{ method_field('patch') }}
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control round-input" value="{{ $user->name }}" />
                        </div>
                    </div>

                  @if (!is_null($user->avatar))
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Avatar</label>
                    <div class="col-sm-10">
                    <img style="width: 200px; height: 150px;" src="{{asset('storage/avatar/'.$user->avatar)}}" class="img-responsive">
                    </div>
                </div>
            @endif
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Avatar</label>
                <div class="col-sm-10">
                    <input type="file" id="file" name="file" class="custom-file-input">
                    <span class="custom-file-control"></span>
                </div>
            </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                             <input type="email" name="email" class="form-control round-input" value="{{ $user->email }}" />
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                             <input type="password" name="password" class="form-control round-input"" />
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Repeat Password</label>
                        <div class="col-sm-10">
                             <input type="password" name="password_confirmation" class="form-control round-input""/>
                        </div>
                    </div>
                    <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                   
                                                     <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                </form>
            </div>
        </section>
               
                     

                        
             
                </div>
            </div>
                 </div>
            @endsection