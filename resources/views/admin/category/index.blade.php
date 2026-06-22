@extends('admin.layouts.app')
 @section('title')
    {{ !empty($data['title']) ? $data['title'] : 'WebSolutionTechnology - Website Development & Software Solutions' }}
@endsection

@section('keyword')
    {{ !empty($data['title']) ? $data['title'] : 'website development, software development, web design, SEO services, digital marketing, IT solutions' }}
@endsection

@section('description')
    {{ !empty($data['title']) ? $data['title'] : 'WebSolutionTechnology provides website development, software development, digital marketing, SEO, web hosting, and IT solutions for businesses worldwide.' }}
@endsection
@section('content')
	<style>
	 .card-border{
		border: 1px solid;
		padding: 15px;
		margin-bottom: 20px;
	}
	</style>
    <!-- mani page content body part -->
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>{{$data['header']}}</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>                            
                            <li class="breadcrumb-item"><a href="{{url('admin/category')}}">category</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                <button type="button" class="btn btn-primary"><a href="{{url('admin/categoryAdd/add')}}"> <i class="fa fa-plus" aria-hidden="true"></i> Add category</a></button>
                                 
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
                         <form class="speciality_form" method="post" onsubmit="return CategoryController.saveCategory(this)" autocomplete="off" enctype="multipart/form-data"> 
                         
                         @elseif(Request::segment(3)=='edit')
                         
                         <form id="form" method="post" autocomplete="off" action="" onsubmit="return CategoryController.editSaveCategory(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)" enctype="multipart/form-data">
                         
                         @endif
                            <div class="row clearfix">
                                <div class="col-sm-12">
									<label>Enter Category Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="name" value="{{ old('name',(isset($edit_data)) ? $edit_data->name:"")}}" placeholder="Enter category Name">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row clearfix">
                                <div class="col-sm-12">
									<label>Enter Meta Title</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="meta_title" value="{{ old('meta_title',(isset($edit_data)) ? $edit_data->meta_title:"")}}" placeholder="Enter meta title">
                                    </div>
                                </div>
                            </div>
                            
                            
                             <div class="row clearfix">
                                <div class="col-sm-12">
									<label>Enter Meta Keyword</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="meta_keywords" value="{{ old('meta_keywords',(isset($edit_data)) ? $edit_data->meta_keywords:"")}}" placeholder="Enter meta keywords">
                                    </div>
                                </div>
                            </div>
                            
                             <div class="row clearfix">
                                <div class="col-sm-12">
									<label>Enter Meta Description</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="meta_description" value="{{ old('meta_description',(isset($edit_data)) ? $edit_data->meta_description:"")}}" placeholder="Enter meta description">
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
									<input class="form-control" type="text" name="total_rating" value="{{ old('total_rating',(isset($edit_data)) ? $edit_data->total_rating:"")}}" placeholder="Enter Total Rating"> </div>
							</div>	
							
                            
							
							<div class="row clearfix">
							
								<div class="col-sm-12">
									<div class="form-group mt-3">
										<label>Photo</label>
										@if(isset($edit_data) && $edit_data->image !='')									 
										<?php $vicons= unserialize($edit_data->image);  ?>
										<div>
											<img src="<?php echo asset('/'.$vicons['image']['src']); ?>" style="max-width:100px;" height="100" width="100">	
											<a href="/admin/category/del_icon/{{$edit_data->id}}" class="btn btn-inverse btn-circle m-b-5 deleteIcon"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                                    <label>Enter Category  Subtital</label>
								    <div class="form-group ">
									    <textarea rows="4"  class="form-control no-resize" name="subTital">{{ old('subTital',(isset($edit_data)) ? $edit_data->subTital:"")}}</textarea>
								    </div>
							    </div>
							</div>
                            
                            
                            	<div class="row clearfix">
                                
								<div class="col-sm-12">
                                    <label>Heading</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="about_heading" value="{{ old('about_heading',(isset($edit_data)) ? $edit_data->about_heading:"")}}" placeholder="Enter about Heading">
                                    </div>
                                </div>
							</div>
							<div class="row clearfix">
                                <div class="col-sm-12">
                                    <label>About</label>
								    <div class="form-group ">
									    <textarea rows="4"  class="form-control no-resize" name="about">{{ old('about',(isset($edit_data)) ? $edit_data->about:"")}}</textarea>
								    </div>
							    </div>
							</div>
                            	
                            
                            <div class="row clearfix">
                                
								<div class="col-sm-12">
                                    <label>Paragraph 1</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="paragraph1" value="{{ old('paragraph1',(isset($edit_data)) ? $edit_data->paragraph1:"")}}" placeholder="Enter paragraph1">
                                    </div>
                                </div>
							</div>
                            
                            
                            <div class="row clearfix">
                                
								<div class="col-sm-12">
                                    <label>Paragraph 2</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="paragraph2" value="{{ old('paragraph2',(isset($edit_data)) ? $edit_data->paragraph2:"")}}" placeholder="Enter paragraph2">
                                    </div>
                                </div>
							</div>
							
							
							<div class="row clearfix">
                                
								<div class="col-sm-12">
                                    <label>Paragraph 3</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="paragraph3" value="{{ old('paragraph3',(isset($edit_data)) ? $edit_data->paragraph3:"")}}" placeholder="Enter paragraph3">
                                    </div>
                                </div>
							</div>
							
							
							
							<div class="row clearfix">
                                
								<div class="col-sm-12">
                                    <label>Paragraph 4</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="paragraph4" value="{{ old('paragraph4',(isset($edit_data)) ? $edit_data->paragraph4:"")}}" placeholder="Enter paragraph4">
                                    </div>
                                </div>
							</div>
							
							
							
							<div class="row clearfix">
                                
								<div class="col-sm-12">
                                    <label>Paragraph 5</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="paragraph5" value="{{ old('paragraph5',(isset($edit_data)) ? $edit_data->paragraph5:"")}}" placeholder="Enter paragraph5">
                                    </div>
                                </div>
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
                            <table class="table table-bordered table-hover table-striped" cellspacing="0" id="datatable-all-category">
                                <thead>
                                    <tr>
                                        <th>Category Name </th>
                                       
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                       <th>Category Name</th>
                                       
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