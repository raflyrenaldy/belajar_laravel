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
                 <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
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
                     <div id="pw" class="form-group" style=" display: none" >
                        <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                        <div class="col-sm-10">
                             <input type="password" id="password" name="password" class="form-control round-input" onchange="check_pass()" />
                        </div>
                    </div>
                      <div id="rppw" class="form-group" style=" display: none">
                        <label class="col-sm-2 col-sm-2 control-label">Repeat Password</label>
                        <div class="col-sm-10">
                             <input type="password" id="confirm_password" name="password_confirmation" class="form-control round-input" onchange="check_pass()"/>
                        </div>
                        </div>
                                         <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">     
                                                    <button id="btnChange" type="button" class="btn btn-info" onclick="ChangePassword()">Change Password</button>
                                                    <button id="submit" type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                                 </form>
                                                       
                 
            </div>
        </section>
               
                     

                     
             </div>
                </div>
            </div>

             <?php if($user->role_id == '1'){
                   ?>

            <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                <section class="panel">
                <header class="panel-heading">
                    User
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                <div class="adv-table editable-table ">
                <div class="clearfix">
                    
                    
                </div>
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr class="">
                     <?php $i=1; ?>
                     @foreach($posts as $post)
                    <td>{{$i}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->email}}</td>
                     <td align="center"><button type="button" class="btn btn-info btn-sm" type="button">{{$post->fn}}</button></td>
                     <form method="post" action="{{route('users.update', $post->id)}}" class="form-horizontal adminex-form">
                {{ csrf_field() }}
    {{ method_field('patch') }}
                     <?php if($post->role_id == '2'){
                   ?> 
                    <td align="center"><input type="hidden" name="id" value="{{$post->id}})"><button class="btn btn-success" name="role_id" value="1">Upgrade</button> <button name="role_id" value="3" class="btn btn-warning">Downgrade</button> <button data-user_id="{{$post->id}}" class="btn btn-danger" data-toggle="modal" type="button" data-target="#delete">Delete</button> </td>
                    <?php }else if($post->role_id == '3'){ ?>
                 <td align="center"><input type="hidden" name="id" value="{{$post->id}})"><button class="btn btn-success" name="role_id" value="2">Upgrade</button> <button type="button" data-user_id="{{$post->id}}" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button></td>
                 <?php }else if(($post->role_id == '1') AND ($post->id == '1')){ ?>
                 <td align="center"><button type="button" class="btn btn-primary">Max</button></td>
                 <?php }else if($post->role_id == '1'){?>
                   <td align="center"><input type="hidden" name="id" value="{{$post->id}})"><button type="button" class="btn btn-primary">Max</button> <button name="role_id" value="2" class="btn btn-warning">Downgrade</button> <button type="button" data-user_id="{{$post->id}}" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button></td>
                    <?php }?>
                </tr>
            </form>

                      <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('user.delete','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                <p class="text-center">
                    Are you sure you want to delete this?
                </p>
                <input type="hidden" name="id" id="id" value="">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
          </div>
      </form>
    </div>
  </div>
   </div> 
                <?php $i++;
                 ?>
                 @endforeach
                </tbody>
                </table>
                </div>
                
                </section>
                
                
        </div>
        <?php }else{
            ?>
            <?php }?>
                 </div>
                 <script src="{{asset('js/app.js')}}"></script>
<script>

  

      $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('user_id')
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      })

  </script>
                 <script>
                    function ChangePassword(){
                              var x = document.getElementById("pw");
                               var y = document.getElementById("rppw");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "block";
         document.getElementById('btnChange').innerHTML = "Cancel";
    } else {
        x.style.display = "none";
         y.style.display = "none";
 document.getElementById('btnChange').innerHTML = "Change Password";
    }
                    }
                 </script>
                 <script>
                   function check_pass() {
    if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}
                 </script>
            @endsection