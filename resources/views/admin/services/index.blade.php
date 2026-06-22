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
	<style>
	 .card-border{
		border: 1px solid;
		padding: 15px;
		margin-bottom: 20px;
	}
	</style>
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
                                <button type="button" class="btn btn-primary"><a href="{{url('admin/serviceAdd/add')}}"> <i class="fa fa-plus" aria-hidden="true"></i> Add Service</a></button>
                                 
                            
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
                       
                        <div class="body"> 
                        @if(Request::segment(3)=='add')
                         <form class="service_form" method="post" onsubmit="return serviceController.serviceSave(this)" autocomplete="off" enctype="multipart/form-data" > 
                         
                         @elseif(Request::segment(3)=='edit')
                         
                         <form id="form" method="post" autocomplete="off" action="" onsubmit="return serviceController.editSaveService(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)"  enctype="multipart/form-data">
                         
                         @endif
                            <div class="row clearfix">
                               
								<div class="col-sm-6">
									    <label>Category<span class="required">*</span></label>
									<div class="form-group">
								<select class="form-control" name="categories_id">
								 <option value="">Select Category</option>
								<?php if(!empty($categories) ){						 	
									foreach($categories as $category){

									?>
									<option value="<?php echo $category->id; ?>"  @if($category->id == old('categories_id'))
									selected="selected"	@else {{ (isset($edit_data) && $edit_data->categories_id == $category->id)? "selected":"" }}
									@endif><?php echo $category->name; ?></option>
					  
									<?php	   } } ?>
								</select>
									</div>
								</div>
								 <div class="col-sm-6">
									  <label>Service Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="name" value="{{ old('name',(isset($edit_data)) ? $edit_data->name:"")}}" placeholder="Enter product Name">
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
								<div class="form-group mt-3">
									<label>Banner Image</label>
                                    @if(isset($edit_data) && $edit_data->image !='')									 
									<?php $vicons= unserialize($edit_data->image);  ?>
									<div >
									<img src="<?php echo asset('/'.$vicons['image']['src']); ?>" style="max-width:100px;" height="100" width="100">	
									<a href="/admin/service/del_icon/{{$edit_data->id}}" class="btn btn-inverse btn-circle m-b-5 deleteIcon"><i class="fa fa-trash" aria-hidden="true"></i></a>
									<input type="hidden" class="" name="image" value="{{ $edit_data->image }}" >
									</div>
									@else											 
									<input type="file" dir="auto" name="image" accept=".jpeg,.jpg,.png,.svg,.webp">
									@endif
							
							
									 
								</div>
								</div>
                                
                               								
                                
                            </div>
							
						 
						 
							<div class="row clearfix">
							 <div class="col-md-12">
							<div class="card-border">
							 
							<div class="header">
							
							<h2>Section One</h2>
							</div>
							<div class="row clearfix">
							<div class="col-sm-6">
                                    <label>Heading One</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="heading_one" value="{{ old('heading_one',(isset($edit_data)) ? $edit_data->heading_one:"")}}" placeholder="Enter Heading One">
                                    </div>
                                </div>
                                <div class="col-sm-6">
								<label>Photo one</label>
								<div class="form-group">
									
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
							
							
								 
								</div>
								</div>
								
							</div>
							
							<div class="row clearfix">
                                <div class="col-sm-12">
                                    <label>Description One</label>
								    <div class="form-group ">
									    <textarea rows="4"  class="form-control no-resize" name="description_one">{{ old('description_one',(isset($edit_data)) ? $edit_data->description_one:"")}}</textarea>
								    </div>
							    </div>
							</div>
							</div>
							</div>
							</div>
							
							<div class="row clearfix">
							 <div class="col-md-12">
							<div class="card-border">
							 
							<div class="header">
							
							<h2>Section Two</h2>
							</div>
							<div class="row clearfix">
                                <div class="col-sm-6">
									<label>Photo Two</label>
								<div class="form-group">
								
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
                                    <label>Description Two</label>
								    <div class="form-group ">
									    <textarea rows="4"  class="form-control no-resize" name="description_two">{{ old('description_two',(isset($edit_data)) ? $edit_data->description_two:"")}}</textarea>
								    </div>
							    </div>
							</div>
							</div>
							</div>
							</div>
							
							<div class="row clearfix">
							 <div class="col-md-12">
							<div class="card-border">
							 
							<div class="header">
							
							<h2>Section Three</h2>
							</div>
							<div class="row clearfix">
							<div class="col-sm-6">
                                    <label>Heading Three</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="heading_three" value="{{ old('heading_three',(isset($edit_data)) ? $edit_data->heading_three:"")}}" placeholder="Enter Heading Three">
                                    </div>
                                </div>
                                <div class="col-sm-6">
								<label>Photo Three</label>
								<div class="form-group">
									
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
							
							
									 
								</div>
								</div>
								
							</div>
							<div class="row clearfix">
                                <div class="col-sm-12">
                                    <label>Description Three</label>
								    <div class="form-group ">
									    <textarea rows="4"  class="form-control no-resize" name="description_three">{{ old('description_three',(isset($edit_data)) ? $edit_data->description_three:"")}}</textarea>
								    </div>
							    </div>
							</div>
							</div>
							</div>
							</div>
							
							<div class="row clearfix">
							 <div class="col-md-12">
							<div class="card-border">
							 
							<div class="header">
							
							<h2>Section Four</h2>
							</div>
							
							<div class="row clearfix">
							<div class="col-sm-6">
                                    <label>Heading Four</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="heading_four" value="{{ old('heading_four',(isset($edit_data)) ? $edit_data->heading_four:"")}}" placeholder="Enter Heading four">
                                    </div>
                                </div>
                                <div class="col-sm-6">
								<label>Photo Four</label>
								<div class="form-group">
									
                                    @if(isset($edit_data) && $edit_data->image_four !='')									 
									<?php $vicons= unserialize($edit_data->image_four);  ?>
									<div >
									<img src="<?php echo asset('/'.$vicons['image_four']['src']); ?>" style="max-width:100px;" height="100" width="100">	
									<a href="/admin/product/del_icon/{{$edit_data->id}}" class="btn btn-inverse btn-circle m-b-5 deleteIcon"><i class="fa fa-trash" aria-hidden="true"></i></a>
									<input type="hidden" class="" name="image_four" value="{{ $edit_data->image }}" >
									</div>
									@else											 
									<input type="file" dir="auto" name="image_four" accept=".jpeg,.jpg,.png,.svg,.webp">
									@endif
							
							
									 
								</div>
								</div>
								</div>
								
							 
							<div class="row clearfix">
                                <div class="col-sm-12">
                                    <label>Description Four</label>
								    <div class="form-group ">
									    <textarea rows="4"  class="form-control no-resize" name="description_four">{{ old('description_four',(isset($edit_data)) ? $edit_data->description_four:"")}}</textarea>
								    </div>
							    </div>
							</div>
							
							
							</div>
							</div>
							</div>
							
							
							
							
							<div class="row clearfix">
								<div class="col-sm-6">
								 @php
    $ratings = [1,2,3,4, 4.5,4.6, 4.75, 4.8, 4.9, 5];
@endphp

<select name="rating" class="form-control">
    <option value="">Select Rating</option>

    @foreach($ratings as $rating)
        <option value="{{ $rating }}"
            {{ old('rating', isset($edit_data) ? $edit_data->rating : '') == $rating ? 'selected' : '' }}>
            {{ $rating }}
        </option>
    @endforeach
</select>
								</div>
								<div class="col-sm-6">
									<input class="form-control" type="number" name="total_rating" value="{{ old('total_rating',(isset($edit_data)) ? $edit_data->total_rating:"")}}" placeholder="Enter Total Rating"> </div>
							</div>	
							
                            


							<div class="row clearfix">
							 <div class="col-md-12">
							<div class="card-border">
							 
							<div class="header">
							
							<h2>FAQ</h2>
							</div>
							<div class="row clearfix">
							<div class="col-sm-6">
                                    <label>Question 1</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="faqq1" value="{{ old('faqq1',(isset($edit_data)) ? $edit_data->faqq1:"")}}" placeholder="Enter Question 1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
								<label>Answer 1</label>
								<div class="form-group">
									  <textarea rows="4"  class="form-control no-resize" name="faqa1">{{ old('faqa1',(isset($edit_data)) ? $edit_data->faqa1:"")}}</textarea>
							
								 
								</div>
								</div>
								
							</div>
							
						 
						 
						 	<div class="row clearfix">
							<div class="col-sm-6">
                                    <label>Question 2</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="faqq2" value="{{ old('faqq2',(isset($edit_data)) ? $edit_data->faqq2:"")}}" placeholder="Enter Question 2">
                                    </div>
                                </div>
                                <div class="col-sm-6">
								<label>Answer 2</label>
								<div class="form-group">
									  <textarea rows="4"  class="form-control no-resize" name="faqa2">{{ old('faqa2',(isset($edit_data)) ? $edit_data->faqa2:"")}}</textarea>
							
								 
								</div>
								</div>
								
							</div>
							
							
							
							
							
							
							
							
							
							
							
								<div class="row clearfix">
							<div class="col-sm-6">
                                    <label>Question 3</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="faqq3" value="{{ old('faqq3',(isset($edit_data)) ? $edit_data->faqq3:"")}}" placeholder="Enter Question 3">
                                    </div>
                                </div>
                                <div class="col-sm-6">
								<label>Answer 3</label>
								<div class="form-group">
									  <textarea rows="4"  class="form-control no-resize" name="faqa3">{{ old('faqa3',(isset($edit_data)) ? $edit_data->faqa3:"")}}</textarea>
							
								 
								</div>
								</div>
								
							</div>
								<div class="row clearfix">
							<div class="col-sm-6">
                                    <label>Question 4</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="faqq4" value="{{ old('faqq4',(isset($edit_data)) ? $edit_data->faqq4:"")}}" placeholder="Enter Question 4">
                                    </div>
                                </div>
                                <div class="col-sm-6">
								<label>Answer 4</label>
								<div class="form-group">
									  <textarea rows="4"  class="form-control no-resize" name="faqa4">{{ old('faqa4',(isset($edit_data)) ? $edit_data->faqa4:"")}}</textarea>
							
								 
								</div>
								</div>
								
							</div>
							
								<div class="row clearfix">
							<div class="col-sm-6">
                                    <label>Question 5</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="faqq5" value="{{ old('faqq5',(isset($edit_data)) ? $edit_data->faqq5:"")}}" placeholder="Enter Question 5">
                                    </div>
                                </div>
                                <div class="col-sm-6">
								<label>Answer 5</label>
								<div class="form-group">
									  <textarea rows="4"  class="form-control no-resize" name="faqa5">{{ old('faqa5',(isset($edit_data)) ? $edit_data->faqa5:"")}}</textarea>
							
								 
								</div>
								</div>
								
							</div>
							
							
							





							</div>
							</div>
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
                            <table class="table table-bordered table-hover table-striped" cellspacing="0" id="datatable-all-service">
                                <thead>
                                    <tr>
                                        <th>Service Name</th>
                                        <th>Category</th> 	                                        
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                
                                
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