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
                Room
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
               
                <li class="active"> Room </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                <section class="panel">
                <header class="panel-heading">
                    Room
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                <div class="adv-table editable-table ">
                <div class="clearfix">
                   <div class="btn-group">
                       <?php if($user->role_id == '1' || $user->role_id == '2'){
                         ?>   
                          
                   <a href="#myModal-1" data-toggle="modal" class="btn btn-xs btn-success">
                             Add New <i class="fa fa-plus"></i>
                        </a>
                      <?php }else{?>
                      <?php }?>
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-1" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Add New</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-horizontal" role="form" method="post" action="{{url('room')}}">
                                            <div class="form-group">
                                                 {{csrf_field()}}
                                                <label for="" class="col-lg-2 col-sm-2 control-label">Ruangan</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" name="room" id="room">
                                                </div>
                                            </div>
                                            
                                                                      
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit</h4>
                                    </div>
                                    <form action="{{route('room.update','test')}}" method="post" class="form-horizontal" role="form">
                                            {{method_field('patch')}}
                                            {{csrf_field()}}
                                    <div class="modal-body">

                                    <input type="hidden" name="room_id" id="room_id" value="">
                                   
                                            <div class="form-group">
                                                 
                                                <label for="" class="col-lg-2 col-sm-2 control-label">Ruangan</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" name="room" id="room">
                                                </div>
                                            </div>
                                            
                                                                      
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                     <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Id Room</th>
                    <th>Room</th>
                   <?php if($user->role_id == '1'){
                   ?>
                    <th>Action</th>
                    <?php }else{
                     } ?>
                </tr>
                </thead>
                <tbody>
                       <?php $i=1; ?>
                     @foreach($rooms as $post)
                <tr class="">
                    <td>{{$i}}</td>
                    <td>{{$post->room_id}}</td>
                    <td>{{$post->room}}</td>
                    <?php if($user->role_id == '1'){
                   ?>
                     <td align="center"> <button class="btn btn-info" data-room_id="{{$post->room_id}}" data-room="{{$post->room}}" data-toggle="modal" data-target="#edit">Edit</button>
                                    
                                    <button class="btn btn-danger" data-room_id="{{$post->room_id}}" data-toggle="modal" data-target="#delete">Hapus</button>
                                </td>
                        
                         
                      <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('room.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                <p class="text-center">
                    Are you sure you want to delete this?
                </p>
                <input type="hidden" name="room_id" id="room_id" value="">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
          </div>
      </form>
    </div>
  </div>
   </div> 
       
                    <?php }else{
                     } ?>

                </form>
                </tr>
                <?php $i++;
                 ?>
                 @endforeach
                </tbody>
                </table>
                </div>
                </div>
                </section>
                </div>
                
        </div>
        <!--body wrapper end-->
        </div>

<script src="{{asset('js/app.js')}}"></script>
<script>

  $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var room_id = button.data('room_id') 
      var room = button.data('room') 
      var modal = $(this)
      modal.find('.modal-body #room_id').val(room_id);
      modal.find('.modal-body #room').val(room);
    
})

      $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var room_id = button.data('room_id')
      var modal = $(this)
      modal.find('.modal-body #room_id').val(room_id);
      })

  </script>
@endsection
