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
                                                        
                            <li class="breadcrumb-item"><a href="{{url('admin/users')}}">Users</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                <button type="button" class="btn btn-primary"><a href="{{url('admin/usersAdd/add')}}"> <i class="fa fa-plus" aria-hidden="true"></i> Add User</a></button>
                                 
                               
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
                         <form class="speciality_form" method="post" onsubmit="return usersController.saveUsers(this)" autocomplete="off" > 
                         
                         @elseif(Request::segment(3)=='edit')
                         
                         <form id="form" method="post" autocomplete="off" action="" onsubmit="return usersController.editSaveUsers(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">
                         
                         @endif
                              <div class="row clearfix">                    
                                <div class="col-sm-6">
								<label>Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="name" value="{{ old('name',(isset($edit_data)) ? $edit_data->name:"")}}" placeholder="Enter Name">
                                    </div>
                                </div>
                                
                     
							
							 
                                <div class="col-sm-6">
								<label>Email</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="email" value="{{ old('email',(isset($edit_data)) ? $edit_data->email:"")}}" placeholder="Enter Email">
                                    </div>
                                </div>
                                
                        
						 
                                <div class="col-sm-6">
								<label>Password</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="password" value="{{ old('password')}}" placeholder="Enter password">
                                    </div>
                                </div>
                                
                   
							
							<div class="col-sm-6">
								<label>Role</label>
								<div class="form-group">
								<select class="form-control show-tick" name="role">
								<option value="">- Role -</option>
								<option value="admin" @if ('admin'== old('role'))
								selected="selected"	
								@else
								{{ (isset($edit_data) && $edit_data->role == 'admin' ) ? "selected":"" }} @endif>Admin</option>
								<option value="manager" @if ('manager'== old('role'))
								selected="selected"	
								@else
								{{ (isset($edit_data) && $edit_data->role == 'manager' ) ? "selected":"" }} @endif>Manager</option>
								</select>
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
                            <table class="table table-bordered table-hover table-striped" cellspacing="0" id="datatable-all-users">
                                <thead>
                                    <tr>
                                        <th>Name</th>
										  <th>Mobile</th>
										  <th>Email</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                       <th>Name</th>
										  <th>Mobile</th>
										  <th>Email</th>
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