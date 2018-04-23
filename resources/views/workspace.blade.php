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
                            <img src="images/photos/user-avatar.png" alt="" />
                            John Doe
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="#"><i class="fa fa-user"></i>  Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i>  Settings</a></li>
                            <li><a href="#"><i class="fa fa-sign-out"></i> Log Out</a></li>
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

                                        <form class="form-horizontal" role="form" method="post" action="{{url('workspace')}}" enctype="multipart/form-data">
                                            <div class="form-group">
                                {{csrf_field()}}
                        <label class="col-sm-2 col-sm-2 control-label">Client</label>
                        <div class="col-sm-10">
                             <select class="form-control m-bot15" id="id_clients" name="id_clients"> 
                                 
                                <option value="0" disabled="true" selected="true" id="id_clients" name="id_clients">-Select-</option>
                              @foreach($client as $clients)
                                <option value="{{$clients->client_id}}" id="id_clients" name="id_clients">{{$clients->nama}}</option>
                                 @endforeach
                                </select>

                        </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-2 col-sm-2 control-label">Room</label>
                        <div class="col-sm-10">
                             <select class="form-control m-bot15" id="id_room" name="id_room"> 
                                 
                                <option value="0" disabled="true" selected="true" id="id_room" name="id_room">-Select-</option>
                              @foreach($room as $rooms)
                                <option value="{{$rooms->room_id}}" id="id_room" name="id_room">{{$rooms->room}}</option>
                                 @endforeach
                                </select>

                        </div>
                    </div>
                  
                            <div class="form-group">
                                <label  class="col-sm-2 col-sm-2 control-label">Video</label>
                                    <div class="controls col-md-9">
                                          {{ csrf_field() }}
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <span class="btn btn-default btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" name="file" id="file" multiple />
                                                </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                        </div>
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
</div>   

                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Client</th>
                    <th>No Account</th>
                    <th>Room</th>
                    <th>dates</th>
                    <th>video</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                     @foreach($workspaces as $post)
                <tr class="">
                    <td>{{$i}}</td>
                    <td>{{$post->nama}}</td>
                    <td>{{$post->no_account}}</td>
                    <td>{{$post->room}}</td>
                    <td>{{$post->dates}}</td>
                    <td>{{$post->video}}</td>
              
                     <td align="center">
           <button class="btn btn-danger" data-catid={{$post->workspaces_id}} data-toggle="modal" data-target="#delete">Delete</button>
                                </td>
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('workspace.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                <p class="text-center">
                    Are you sure you want to delete this?
                </p>
                <input type="hidden" name="category_id" id="cat_id" value="">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
          </div>
      </form>
    </div>
  </div>
</div>
       
                   

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
        </div>
        <!--body wrapper end-->
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.client',function(){
            // console.log("hmm its change");

            var client_id=$(this).val();
            // console.log(cat_id);
            var div=$(this).parent();

            var op=" ";

            $.ajax({
                type:'get',
                url:'{!!URL::to('findClientName')!!}',
                data:{'id':client_id},
                success:function(data){
                    //console.log('success');

                    //console.log(data);

                    //console.log(data.length);
                    op+='<option value="0" selected disabled>chose product</option>';
                    for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].nama+'</option>';
                   }

                   div.find('.nama').html(" ");
                   div.find('.nama').append(op);
                },
                error:function(){

                }
            });
        });


    });

     

          function hapusdata(){
      $('#myModal-5').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                });
    }
 

</script>
<script>
     $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); 
      var cat_id = button.data('catid'); 
      var modal = $(this);
      modal.find('.modal-body #cat_id').val(cat_id);
      document.getElementById("cat_id").value = '5555';
});
</script>

@endsection
