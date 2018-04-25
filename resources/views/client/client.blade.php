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
                Client
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
             
                <li class="active">Client </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                <section class="panel">
                <header class="panel-heading">
                    Client
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
                    </div>
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-1" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Add New</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-horizontal" role="form" method="post" action="{{url('client')}}">
                                            <div class="form-group">
                                                 {{csrf_field()}}
                                                <label for="" class="col-lg-2 col-sm-2 control-label">Nama</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="nama" name="nama">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="" class="col-lg-2 col-sm-2 control-label">No Account</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="no_account" name="no_account" >
                                                </div>
                                            </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Join Date</label>
                                    <div class="col-lg-10">
                                        <input class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" id="join_date" name="join_date"/>
                                        <span class="help-block">Select Date</span>
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
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Add New</h4>
                                    </div> 
                                    <form action="{{route('client.update','test')}}" method="post" class="form-horizontal" role="form">
                                            {{method_field('patch')}}
                                            {{csrf_field()}}
                                    <div class="modal-body">
                   
                                    <input type="hidden" name="client_id" id="client_id" value="">
                                           
                                            <div class="form-group">
                                              
                                                <label for="" class="col-lg-2 col-sm-2 control-label">Nama</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="nama" name="nama">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-lg-2 col-sm-2 control-label">No Account</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="no_account" name="no_account" >
                                                </div>
                                            </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Join Date</label>
                                    <div class="col-lg-10">
                                        <input class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" id="join_date" name="join_date"/>
                                        <span class="help-block">Select Date</span>
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
                    </div>
                      
                        
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Id Client</th>
                    <th>Name</th>
                    <th>No Account</th>
                    <th>Join Date</th>
                      <?php if($user->role_id == '1'){
                   ?>
                    <th>Action</th>
                     <?php }else{
                     } ?>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                     @foreach($clients as $post)
                     
                <tr class="">
                    <td>{{$i}}</td>
                    <td>{{$post['client_id']}}</td>
                    <td>{{$post['nama']}}</td>
                    <td>{{$post['no_account']}}</td>
                    <td>{{$post['join_date']}}</td>
                     <?php if($user->role_id == '1'){
                   ?>
                  <td align="center"> <button class="btn btn-info" data-client_id="{{$post->client_id}}" data-nama="{{$post->nama}}" data-no_account="{{$post->no_account}}" data-join_date="{{$post->join_date}}" data-toggle="modal" data-target="#edit">Edit</button>
                                    
                                    <button class="btn btn-danger" data-client_id="{{$post->client_id}}" data-toggle="modal" data-target="#delete">Hapus</button>
                                </td>
                                <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('client.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                <p class="text-center">
                    Are you sure you want to delete this?
                </p>
                <input type="hidden" name="client_id" id="client_id" value="">

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
      var client_id = button.data('client_id') 
      var nama = button.data('nama') 
      var no_account = button.data('no_account') 
      var join_date = button.data('join_date')
      var modal = $(this)
      modal.find('.modal-body #client_id').val(client_id);
      modal.find('.modal-body #nama').val(nama);
      modal.find('.modal-body #no_account').val(no_account);
      modal.find('.modal-body #join_date').val(join_date);
})

      $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var client_id = button.data('client_id')
      var modal = $(this)
      modal.find('.modal-body #client_id').val(client_id);
      })
  </script>
@endsection
