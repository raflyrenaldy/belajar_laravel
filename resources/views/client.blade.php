@extends('layouts.app')

@section('content')
<div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--search start-->
            <form class="searchform" action="index.html" method="post">
                <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
            </form>
            <!--search end-->

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">
                    
                   
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('storage/avatar/'.$user->avatar)}}" alt="" />
                            John Doe
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
                Editable Table
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Data Table</a>
                </li>
                <li class="active"> Editable Table </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                <section class="panel">
                <header class="panel-heading">
                    Editable Table
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                <div class="adv-table editable-table ">
                <div class="clearfix">
                    <div class="btn-group">
                        <a href="#myModal-1" data-toggle="modal" class="btn btn-xs btn-success">
                             Add New <i class="fa fa-plus"></i>
                        </a>
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
                                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="inputEmail4" name="name" id="name">
                                                </div>
                                            </div>
                                            
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                    <div class="col-lg-10">
                                        <input size="16" type="text" readonly class="form_datetime form-control" name="created_at" id="created_at">
                                    </div>
                                </div>
                                       
                                            <div class="form-group">
                                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Jumlah</label>
                                                <div class="col-lg-10">
                                                    <input type="number" class="form-control" id="inputPassword4" name="qty" id="qty">
                                                </div>
                                            </div>
                                                   
                                   <div class="form-group">
                                              <label class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                                                 <div class="col-sm-10">
                                         <textarea rows="6" class="form-control" name="description" id="description"></textarea>
                                     </div>
                                      </div>
                                       <div class="form-group">
                                              <label class="col-lg-2 col-sm-2 control-label">Keterangan+</label>
                                                 <div class="col-sm-10">
                                         <textarea rows="6" class="form-control" name="decsription2" id="description2"></textarea>
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
                    <iv aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit Data</h4>
                                    </div>
                                    <form action="{{route('workspace.update','test')}}" method="post">
                                            {{method_field('patch')}}
                                            {{csrf_field()}}
                                    <div class="modal-body">

                                       
                                             <div class="form-group">

                                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Id Client</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="inputEmail4" name="id_client2" id="id_client2">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="inputEmail4" name="name2" id="name2">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">No Account</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="inputEmail4" name="no_account2" id="no_account2">
                                                </div>
                                            </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Join Date</label>
                                    <div class="col-lg-10">
                                        <input size="16" type="text" readonly class="form_datetime form-control" name="join_date2" id="join_date2">
                                    </div>
                                </div>
                                       
                                            <div class="form-group">
                                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Jumlah</label>
                                                <div class="col-lg-10">
                                                    <input type="number" class="form-control" id="inputPassword4" name="qty" id="qty">
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
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Id Client</th>
                    <th>Name</th>
                    <th>No Account</th>
                    <th>Join Date</th>
                    <th>Action</th>
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
                   <td>
                                    <button class="btn btn-info" data-client_id="{{$post->client_id}}" data-nama="{{$post->nama}}" data-no_account="{{$post->no_account}}" data-join_date="{{$post->join_date}}" data-toggle="modal" data-target="#edit">Edit</button>
                                    /
                                    <button class="btn btn-danger" data-catid={{$cat->id}} data-toggle="modal" data-target="#delete">Delete</button>
                                </td>
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
      modal.find('.modal-body #client_id2').val(client_id);
      modal.find('.modal-body #nama2').val(nama);
      modal.find('.modal-body #no_account2').val(no_account);
      modal.find('.modal-body #join_date2').val(join_date);
})
</script>
@endsection
