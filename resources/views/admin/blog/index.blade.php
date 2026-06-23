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
                            <li class="breadcrumb-item"><a href="{{url('admin/blogs')}}">BLog</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                <button type="button" class="btn btn-primary"><a href="{{url('admin/blogs/add')}}"> <i class="fa fa-plus" aria-hidden="true"></i> Add Blog</a></button>
                                 
                            
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
                         <form class="blog_form" method="post" onsubmit="return blogController.saveBlog(this)" autocomplete="off" enctype="multipart/form-data" > 
                         
                         @elseif(Request::segment(3)=='edit')
                         
                         <form id="form" method="post" autocomplete="off" action="" onsubmit="return blogController.editSaveBlog(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)"  enctype="multipart/form-data">
                         
                         @endif
                            <div class="row clearfix">
                               
								<div class="col-sm-6">
             
									    <label>Category<span class="required">*</span></label>
									<div class="form-group">
								<select class="form-control" name="category">
								 <option value="">Select Category</option>
								<?php if(!empty($categories) ){						 	
									foreach($categories as $category){

									?>
									<option value="<?php echo $category->id; ?>"  @if($category->id == old('category'))
									selected="selected"	@else {{ (isset($edit_data) && $edit_data->category == $category->id)? "selected":"" }}
									@endif><?php echo $category->name; ?></option>
					  
									<?php	   } } ?>
								</select>
									</div>
								</div>
								 <div class="col-sm-6">
									  <label>Blog Title</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name ="title" value="{{ old('title',(isset($edit_data)) ? $edit_data->title:"")}}" placeholder="Enter title">
                        </div>
                    </div>
								 






								<div class="col-sm-6">
                                    <label>Meta title</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="meta_title" value="{{ old('meta_title',(isset($edit_data)) ? $edit_data->meta_title:"")}}" placeholder="Enter meta title">
                                    </div>
                                </div>
								
								 <div class="col-sm-6">
                                    <label>Meta Keywords</label>
                                    <div class="form-group">                                      
                                        <textarea rows="4" class="form-control no-resize" name="meta_keywords">{{ old('meta_keywords', $edit_data->meta_keywords ?? '') }}</textarea>

                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Meta Description</label>
                                    <div class="form-group">
                                       
                                    <textarea rows="4" class="form-control no-resize" name="meta_description">{{ old('meta_description', $edit_data->meta_description ?? '') }}</textarea>

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
                            <table class="table table-bordered table-hover table-striped" cellspacing="0" id="datatable-all-BlogList">
                                <thead>
                                    <tr>                                       
                                        <th>Slug</th> 	                                        
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