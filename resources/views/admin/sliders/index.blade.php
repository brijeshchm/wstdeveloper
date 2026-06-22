@extends('admin.layouts.app')
@section('title')
  {{$data['title']}}
@endsection 
@section('keyword')
   {{$data['title']}}
@endsection
@section('description')
    {{$data['title']}}
@endsection
@section('content')

    <!-- mani page content body part -->
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>{{$data['header']}}</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>                            
                            <li class="breadcrumb-item"><a href="{{url('admin/sliders')}}">sliders</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                <button type="button" class="btn btn-primary"><a href="{{url('admin/slidersAdd/add')}}"> <i class="fa fa-plus" aria-hidden="true"></i> Add Sliders</a></button>
                                 
                              <!--  <button type="button" class="btn btn-secondary"><i class="fa fa-send"></i> Send report</button>-->
                            </div>
                            <div class="p-2 d-flex">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            

            <div class="row clearfix">
                
                 @if(Request::segment(3)=='add'  || Request::segment(3)=='edit'  )
                  
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>{{$data['title']}}</h2>
                        </div>
                        <div class="body"> 
                        @if(Request::segment(3)=='add')
                         <form class="speciality_form" method="post" onsubmit="return SliderController.saveSlider(this)" autocomplete="off" enctype="multipart/form-data"> 
                         
                         @elseif(Request::segment(3)=='edit')
                         
                         <form id="form" method="post" autocomplete="off" action="" onsubmit="return SliderController.editSaveslider(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">
                         
                         @endif
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="name" value="{{ old('name',(isset($edit_data)) ? $edit_data->name:"")}}" placeholder="Enter Slider Name">
                                    </div>
                                </div>
                                
                            </div>
                            
                           <div class="col-lg-12">
								<label>Photo</label>
								<div class="form-group mt-3">
								
								@if(isset($edit_data) && $edit_data->image !='')									 
							<?php $vicons= unserialize($edit_data->image);  ?>
							<div >
							<img src="<?php echo asset('/'.$vicons['image']['src']); ?>" style="max-width:100px;" height="100" width="100">	
							<a href="/admin/sliders/del_icon/{{$edit_data->id}}" class="btn btn-inverse btn-circle m-b-5 deleteIcon"><i class="fa fa-trash" aria-hidden="true"></i></a>
							<input type="hidden" class="" name="image" value="{{ $edit_data->image }}" >
							</div>
							@else											 
							<input type="file" dir="auto" name="image" accept=".jpeg,.jpg,.png,.svg,.webp">


							@endif
							
							
									<!--<input type="file" name="image" class="dropify">-->
								</div>
							</div>
                            
                            <div class="row clearfix">                                
                                
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                     
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>{{$data['title']}}</h2>                       
                        </div>
                        <div class="body">
                            <!--<button id="addToTable" class="btn btn-primary m-b-15" type="button">
                                <i class="icon wb-plus" aria-hidden="true"></i> Add row
                            </button>-->
							<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" cellspacing="0" id="datatable-all-sliders">
                                <thead>
                                    <tr>
                                        <th>Slider Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                       <th>Slider Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                
                            </table>
							</div>
                        </div>
                    </div>
                </div>
                
                @endif
            </div>

        </div>
    </div>
    
</div>

 @endsection