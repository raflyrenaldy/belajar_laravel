@extends('layouts.app')

@section('content')

<div class="header-section">
        
        <form class="searchform" action="{{ url('search') }}" method="GET"  >
                    <input type="text" class="form-control" name="keyword" placeholder="Search here..." class="validate" value="" >
                 
                      </form>
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
        <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                CCTV
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li class="active"> CCTV </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CCTV
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            
  <div class="col-md-12 text-center clearfix">
                                <ul class="pagination">
                                   
                                    {{ $workspaces->links() }}
                                </ul>
                            </div>
                            @if($workspaces->count())
@foreach($workspaces as $post)
   


                     
                            <div id="gallery" class="media-gal">
                            	  <div class="images item " >
                                    <a  data-toggle="modal">
                                    <video src="{{asset('storage/upload/'.$post->video)}}" width="233" height="300" type="video/mp4" >
                                    </a>	
                                       </video>
                                   <button class="btn btn-success btn-sm" type="button" data-workspaces_id="{{$post->workspaces_id}}" data-video="{{asset('storage/upload/'.$post->video)}}" data-nama="{{$post->nama}}" data-ruangan="{{$post->room}}" data-dates="{{$post->dates}}" data-toggle="modal" data-target="#play"><i class="fa fa-play"> </i></button>{{$post->video}} 
                                </div>
                              

   
                 @endforeach
                            </div>

                          
  @else
           <div class="alert alert-block alert-danger fade in">
                                <button type="button" class="close close-sm" data-dismiss="alert" onclick="func()">
                                    <i class="fa fa-times" ></i>
                                </button>
                                <strong><i class="fa fa-exclamation-triangle" ></i>Video yang dicari tidak ada</strong> 
                            </div>
        @endif
                         

                            <!-- Modal -->
                            <div class="modal fade" id="play" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Video Player</h4>
                                        </div>

                                        <div class="modal-body row">
                                         {{csrf_field()}}
                                         
                                         <input type="hidden" name="workspaces_id" id="workspaces_id" value="">
                                        
                                          <div class="form-group">

                                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama </label>
                                                <div class="col-lg-10">
                                                   <p id="nama"></p>
                                                </div>
                                            </div>
                                              <div class="form-group">

                                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Ruangan </label>
                                                <div class="col-lg-10">
                                                   <p id="ruangan"></p>
                                                </div>
                                            </div>
                                              <div class="form-group">

                                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tanggal </label>
                                                <div class="col-lg-10">
                                                   <p id="dates"></p>
                                                </div>
                                            </div>
            

                                        
                                           <video style=" width: 100%; height: auto; " width="400"  id="video1" name="video1" type="video/mp4" controls>
  											  
 							 				
  								
 										 Your browser does not support HTML5 video.
										</video>
                                                <div class="pull-right">
                                                    <button class="btn btn-info btn-sm" type="button" data-dismiss="modal">close</button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
 
                        </div>

                    </section>
                </div>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
<script>
     $('#play').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var w_id = button.data('workspaces_id')
      var asb = button.data('video')
      var nama = button.data('nama')
      var dates = button.data('dates')
      var room = button.data('ruangan')
      var modal = $(this)
      modal.find('.modal-body #workspaces_id').val(w_id);
     // modal.find('.modal-body #video1').src(asb);
        document.getElementById("video1").src = asb;
        document.getElementById('nama').innerHTML = nama;
        document.getElementById('dates').innerHTML = dates;
        document.getElementById('ruangan').innerHTML = room;
       });

    
</script>
        @endsection