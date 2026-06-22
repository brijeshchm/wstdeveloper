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
                            <li class="breadcrumb-item"><a href="{{url('admin/service')}}">Service</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                <button type="button" class="btn btn-primary"><a href="{{url('admin/serviceAdd/add')}}"> <i class="fa fa-plus" aria-hidden="true"></i> Edit product</a></button>
                                 
                              
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
                         <form class="speciality_form" method="post" onsubmit="return productController.saveproduct(this)" autocomplete="off" enctype="multipart/form-data" > 
                         
                         @elseif(Request::segment(3)=='edit')
                         
                         <form id="form" method="post" autocomplete="off" action="" onsubmit="return productController.editSaveproduct(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)"  enctype="multipart/form-data">
                         
                         @endif
                            <div class="row clearfix">
                                <div class="col-sm-6">
									  <label>Product Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="name" value="{{ old('name',(isset($edit_data)) ? $edit_data->name:"")}}" placeholder="Enter product Name">
                                    </div>
                                </div>
								     <div class="col-sm-6">
									  <label>Category Name</label>
                                    <div class="form-group">
								<select class="form-control show-tick" name="categories_id" >
											 
                                                    
                                                    
								<?php 
									
									
									if(!empty($edit_data->categories_id) ){						 	
									foreach($categories as $category){
									 
									?>
									<option value="<?php echo $category->id; ?>"  @if ($category->id == $edit_data->categories_id )
                                            selected="selected"	
                                            @endif><?php echo $category->name; ?></option>
								  
									<?php	   } } ?>
								</select>
								</div>
								</div>
								<div class="col-sm-6">
                                    <label>Meta title</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="meta_title" value="{{ old('meta_title',(isset($edit_data)) ? $edit_data->meta_title:"")}}" placeholder="Enter meta itle">
                                    </div>
                                </div>
								
								<div class="col-sm-6">
                                    <label>Meta Keyword</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="meta_keyword" value="{{ old('meta_keyword',(isset($edit_data)) ? $edit_data->meta_keyword:"")}}" placeholder="Enter meta keyword">
                                    </div>
                                </div>
                                
                                  <div class="col-sm-6">
                                    <label>Meta Description</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="meta_description" value="{{ old('meta_description',(isset($edit_data)) ? $edit_data->meta_description:"")}}" placeholder="Enter meta description">
                                    </div>
                                </div>
								
								<div class="col-sm-6">
                                    <label>product Fees</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="productFees" value="{{ old('productFees',(isset($edit_data)) ? $edit_data->productFees:"")}}" placeholder="Enter product Fees">
                                    </div>
                                </div>
								
								<div class="col-sm-6">
                                    <label>Old Fees</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="oldFees" value="{{ old('oldFees',(isset($edit_data)) ? $edit_data->oldFees:"")}}" placeholder="Enter Old Fees">
                                    </div>
                                </div>
								
								<div class="col-sm-6">
                                    <label>product Duration</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="productDuration" value="{{ old('productDuration',(isset($edit_data)) ? $edit_data->productDuration:"")}}" placeholder="Enter product Duration">
                                    </div>
                                </div>
                                
                               								
                                
                            </div>
							
							<div class="row clearfix">
                                <div class="col-sm-12">
								<div class="form-group mt-3">
									<label>Photo</label>
                                    @if(isset($edit_data) && $edit_data->image !='')									 
									<?php $vicons= unserialize($edit_data->image);  ?>
									<div >
									<img src="<?php echo asset('/'.$vicons['image']['src']); ?>" style="max-width:100px;" height="100" width="100">	
									<a href="/admin/product/del_icon/{{$edit_data->id}}" class="btn btn-inverse btn-circle m-b-5 deleteIcon"><i class="fa fa-trash" aria-hidden="true"></i></a>
									<input type="hidden" class="" name="image" value="{{ $edit_data->image }}" >
									</div>
									@else											 
									<input type="file" dir="auto" name="image" accept=".jpeg,.jpg,.png,.svg,.webp">
									@endif
							
							
									<!--<input type="file" name="image" class="dropify">-->
								</div>
								</div>
							</div>
							
							<div class="row clearfix">
                                <div class="col-sm-12">
                                    <label>product Description</label>
								    <div class="form-group ">
									    <textarea rows="4"  class="form-control no-resize" name="description">{{ old('description',(isset($edit_data)) ? $edit_data->description:"")}}</textarea>
								    </div>
							    </div>
							</div>
							
							<div class="row clearfix">
                                <div class="col-sm-6">
								<div class="form-group mt-3">
									<label>Photo one</label>
                                    @if(isset($edit_data) && $edit_data->image_one !='')									 
									<?php $vicons= unserialize($edit_data->image_one);  ?>
									<div >
									<img src="<?php echo asset('/'.$vicons['image_one']['src']); ?>" style="max-width:100px;" height="100" width="100">	
									<a href="/admin/product/del_icon/{{$edit_data->id}}" class="btn btn-inverse btn-circle m-b-5 deleteIcon"><i class="fa fa-trash" aria-hidden="true"></i></a>
									<input type="hidden" class="" name="image_one" value="{{ $edit_data->image }}" >
									</div>
									@else											 
									<input type="file" dir="auto" name="image_one" accept=".jpeg,.jpg,.png,.svg,.webp">
									@endif
							
							
									<!--<input type="file" name="image" class="dropify">-->
								</div>
								</div>
								<div class="col-sm-6">
                                    <label>Heading One</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="heading_one" value="{{ old('heading_one',(isset($edit_data)) ? $edit_data->heading_one:"")}}" placeholder="Enter Heading One">
                                    </div>
                                </div>
							</div>
							
							<div class="row clearfix">
                                <div class="col-sm-12">
                                    <label>product Description one</label>
								    <div class="form-group ">
									    <textarea rows="4"  class="form-control no-resize" name="description_one">{{ old('description_one',(isset($edit_data)) ? $edit_data->description_one:"")}}</textarea>
								    </div>
							    </div>
							</div>
							
							
							<div class="row clearfix">
                                <div class="col-sm-6">
								<div class="form-group mt-3">
									<label>Photo Two</label>
                                    @if(isset($edit_data) && $edit_data->image_two !='')									 
									<?php $vicons= unserialize($edit_data->image_two);  ?>
									<div >
									<img src="<?php echo asset('/'.$vicons['image_two']['src']); ?>" style="max-width:100px;" height="100" width="100">	
									<a href="/admin/product/del_icon/{{$edit_data->id}}" class="btn btn-inverse btn-circle m-b-5 deleteIcon"><i class="fa fa-trash" aria-hidden="true"></i></a>
									<input type="hidden" class="" name="image_two" value="{{ $edit_data->image }}" >
									</div>
									@else											 
									<input type="file" dir="auto" name="image_two" accept=".jpeg,.jpg,.png,.svg,.webp">
									@endif
							
							
									<!--<input type="file" name="image" class="dropify">-->
								</div>
								</div>
								<div class="col-sm-6">
                                    <label>Heading Two</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="heading_two" value="{{ old('heading_two',(isset($edit_data)) ? $edit_data->heading_two:"")}}" placeholder="Enter Heading Two">
                                    </div>
                                </div>
							</div>
							<div class="row clearfix">
                                <div class="col-sm-12">
                                    <label>product Description Two</label>
								    <div class="form-group ">
									    <textarea rows="4"  class="form-control no-resize" name="description_two">{{ old('description_two',(isset($edit_data)) ? $edit_data->description_two:"")}}</textarea>
								    </div>
							    </div>
							</div>
							
							
							<div class="row clearfix">
                                <div class="col-sm-6">
								<div class="form-group mt-3">
									<label>Photo Three</label>
                                    @if(isset($edit_data) && $edit_data->image_three !='')									 
									<?php $vicons= unserialize($edit_data->image_three);  ?>
									<div >
									<img src="<?php echo asset('/'.$vicons['image_three']['src']); ?>" style="max-width:100px;" height="100" width="100">	
									<a href="/admin/product/del_icon/{{$edit_data->id}}" class="btn btn-inverse btn-circle m-b-5 deleteIcon"><i class="fa fa-trash" aria-hidden="true"></i></a>
									<input type="hidden" class="" name="image_three" value="{{ $edit_data->image }}" >
									</div>
									@else											 
									<input type="file" dir="auto" name="image_three" accept=".jpeg,.jpg,.png,.svg,.webp">
									@endif
							
							
									<!--<input type="file" name="image" class="dropify">-->
								</div>
								</div>
								<div class="col-sm-6">
                                    <label>Heading Three</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="heading_three" value="{{ old('heading_three',(isset($edit_data)) ? $edit_data->heading_three:"")}}" placeholder="Enter Heading Three">
                                    </div>
                                </div>
							</div>
							<div class="row clearfix">
                                <div class="col-sm-12">
                                    <label>product Description Three</label>
								    <div class="form-group ">
									    <textarea rows="4"  class="form-control no-resize" name="description_three">{{ old('description_three',(isset($edit_data)) ? $edit_data->description_three:"")}}</textarea>
								    </div>
							    </div>
							</div>
							<div class="row clearfix">
								<div class="col-sm-6">
									<select name="rating" class="form-control">
										<option value="">Select Rating</option>
										<option value="4" @if (4== old('rating'))
											selected="selected"	
										@else
										{{ (isset($edit_data) && $edit_data->rating == 4 ) ? "selected":"" }} @endif >4</option>
										<option value="4.5" @if (4.5== old('rating'))
											selected="selected"	
										@else
										{{ (isset($edit_data) && $edit_data->rating == 4.5 ) ? "selected":"" }} @endif >4.5</option>
										<option value="4.75" @if (4.75== old('rating'))
											selected="selected"	
										@else
										{{ (isset($edit_data) && $edit_data->rating == 4.75 ) ? "selected":"" }} @endif >4.75</option>
										<option value="4.8" @if (4.8== old('rating'))
											selected="selected"	
										@else
										{{ (isset($edit_data) && $edit_data->rating == 4.8 ) ? "selected":"" }} @endif >4.8</option>
										<option value="4.9" @if (4.9== old('rating'))
											selected="selected"	
										@else
										{{ (isset($edit_data) && $edit_data->rating == 4.9 ) ? "selected":"" }} @endif >4.9</option>
										<option value="5" @if (5== old('rating'))
											selected="selected"	
										@else
										{{ (isset($edit_data) && $edit_data->rating == 5 ) ? "selected":"" }} @endif >5</option>						  
									</select>
								</div>
								<div class="col-sm-6">
									<input class="form-control" type="number" name="total_rating" value="{{ old('total_rating',(isset($edit_data)) ? $edit_data->total_rating:"")}}" placeholder="Enter Total Rating"> </div>
							</div>	
							<div class="row clearfix">                                
                                
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" value="submit"  class="btn btn-primary">Submit</button>
                                     
                                </div>
                            </div>
                            </form>	
						</div>
							
                            
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
                            <table class="table table-bordered table-hover table-striped" cellspacing="0" id="datatable-all-product">
                                <thead>
                                    <tr>
                                        <th>product Name</th>
                                        <th>product Title</th>
                                        <th>product Fees</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                       <th>product Name</th>
                                       <th>product Title</th>
                                       <th>product Fees</th>
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
<script src="{{asset('admin/assets/vendor/ckeditor/ckeditor.js')}}"></script>

<script>
CKEDITOR.replace('ckeditor');
CKEDITOR.config.height = 300;
</script>

 @endsection