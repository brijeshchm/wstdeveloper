<!doctype html>
<html lang="en">

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">
<title>@yield('title')</title>
 
<meta name="csrf-token" content="<?php echo csrf_token(); ?>">
<link rel="canonical" href="{{ URL::current() }}"/>	
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">
<link rel="icon" href="{{asset('site/images/favicon.ico')}}" type="image/x-icon">

<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/vendor/sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('admin/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">

<!-- MAIN Project CSS file -->
<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/chatapp.css')}}">
  
    <link href="{{asset('admin/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/select2/dist/css/select2-bootstrap.css')}}" rel="stylesheet">
</head>

<body data-theme="light" class="font-nunito">
   
<div id="wrapper" class="theme-cyan">

    <!-- Page Loader -->
   <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{asset('admin/assets/images/logo-icon.svg')}}" width="48" height="48" alt="Iconic"></div>
            <p>Please wait...</p>
        </div>
    </div>-->

    <!-- Top navbar div start -->
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-brand">
                <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
                <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-bars"></i></button>
                <a href="{{url('admin/dashboard')}}"></a>                
            </div>
            
            <div class="navbar-right">
                             

                
            </div>
        </div>
    </nav>

    <!-- main left menu -->
    <div id="left-sidebar" class="sidebar">
        <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="{{asset('admin/assets/images/user.png')}}" class="rounded-circle user-photo" alt="User Profile Picture">
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Amin</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="{{asset('admindoctor-profile')}}"><i class="icon-user"></i>My Profile</a></li>
                        
                        <li><a href="{{url('admin/logout')}}"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>                
                <hr>
              
            </div>
            
                
            <!-- Tab panes -->
            <div class="tab-content padding-0">
                <div class="tab-pane active" id="menu">
                    <nav id="left-sidebar-nav" class="sidebar-nav">
                        <ul class="metismenu li_animation_delay">
                            <li class="<?php  if(Request::segment(2) =='dashboard'){ echo "active"; } ?>"><a href="{{url('admin/dashboard')}}" ><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                              
                            </li>
                             <li class="<?php  if(Request::segment(2) =='users'){ echo "active"; } ?>"><a href="{{url('admin/users')}}" ><i class="fa fa-medkit"></i><span>Users</span></a>
                              
                            </li>
                            <!--<li class="<?php  if(Request::segment(2) =='doctor'|| Request::segment(2) =='doctorAdd' || Request::segment(2) =='doctorAll' || Request::segment(2) =='doctorSchedule' || Request::segment(2) =='doctorProfile'){ echo "active"; } ?>"><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-user-md"></i><span>Doctors</span></a>
                                <ul>
                                
                                    <li class="<?php  if(Request::segment(2) =='doctorAll'){ echo "active"; } ?>"><a href="{{url('admin/doctorAll')}}">All Doctors</a></li>
                                    <li class="<?php  if(Request::segment(2) =='doctorAdd'){ echo "active"; } ?>" ><a href="{{url('admin/doctorAdd')}}">Add Doctor</a></li>
                                
                                    <li class="<?php  if(Request::segment(2) =='doctorSchedule'){ echo "active"; } ?>"><a href="{{url('admin/doctorSchedule')}}">Doctor Schedule</a></li>
                                </ul>
                            </li>-->
                            
                            
                            <!--<li class="<?php  if(Request::segment(2) =='patientInvoice'|| Request::segment(2) =='patientAll' || Request::segment(2) =='patientAdd' || Request::segment(2) =='doctorProfile'){ echo "active"; } ?>"><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-user"></i><span>Student</span></a>
                                <ul>
                                    <li class="<?php  if(Request::segment(2) =='patientAll'){ echo "active"; } ?>"><a href="{{url('admin/patientAll')}}">All Student</a></li>
                                </ul>
                            </li>-->
                           
                            
                            <li class="<?php  if(Request::segment(2) =='category' || Request::segment(2) =='product' ){ echo "active"; } ?>"><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-tag"></i><span>Services</span></a>
                                                     
                                <ul> 
									<li class="<?php if(Request::segment(2) =='category' ){ echo "active"; } ?>"><a href="{{url('admin/category')}}">Category</a></li>
                                    <li class="<?php  if(Request::segment(2) =='service'){ echo "active"; } ?>"><a href="{{url('admin/service')}}">Services</a></li>
									    
                                    
                                </ul>
                            </li>
							<li class="<?php  if(Request::segment(2) =='sliders'){ echo "active"; } ?>"><a href="{{url('admin/sliders')}}" ><i class="fa fa-medkit"></i><span>Sliders</span></a></li>
							<li class="<?php  if(Request::segment(2) =='blogs'){ echo "active"; } ?>"><a href="{{url('admin/blogs')}}" ><i class="fa fa-medkit"></i><span>Blogs</span></a></li>
						                        
                        </ul>
                    </nav>
                </div>
                <div class="tab-pane" id="Chat">
                    <form>
                        <div class="input-group m-b-20">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-magnifier"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                    </form>
                    <ul class="right_chat list-unstyled li_animation_delay">
                        
                        
                        <li>
                            <a href="javascript:void(0);" class="media">
                                <img class="media-object" src="{{asset('admin/assets/images/xs/avatar7.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name d-flex justify-content-between">Dr. Folisise Chosielie <i class="fa fa-heart font-12"></i></span>
                                    <span class="message">info@websolutiontechnology.com</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="app-contact.html" class="btn btn-block btn-primary">View all Doctors</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="setting">
                    <h6>Choose Skin</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple"><div class="purple"></div></li>
                        <li data-theme="blue"><div class="blue"></div></li>
                        <li data-theme="cyan" class="active"><div class="cyan"></div></li>
                        <li data-theme="green"><div class="green"></div></li>
                        <li data-theme="orange"><div class="orange"></div></li>
                        <li data-theme="blush"><div class="blush"></div></li>
                        <li data-theme="red"><div class="red"></div></li>
                    </ul>

                    <ul class="list-unstyled font_setting mt-3">
                        <li>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="font" value="font-nunito" checked="">
                                <span class="custom-control-label">Nunito Google Font</span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="font" value="font-ubuntu">
                                <span class="custom-control-label">Ubuntu Font</span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="font" value="font-raleway">
                                <span class="custom-control-label">Raleway Google Font</span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="font" value="font-IBMplex">
                                <span class="custom-control-label">IBM Plex Google Font</span>
                            </label>
                        </li>
                    </ul>

                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-center mb-2">
                            <label class="toggle-switch theme-switch">
                                <input type="checkbox">
                                <span class="toggle-switch-slider"></span>
                            </label>
                            <span class="ml-3">Enable Dark Mode!</span>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <label class="toggle-switch theme-rtl">
                                <input type="checkbox">
                                <span class="toggle-switch-slider"></span>
                            </label>
                            <span class="ml-3">Enable RTL Mode!</span>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <label class="toggle-switch theme-high-contrast">
                                <input type="checkbox">
                                <span class="toggle-switch-slider"></span>
                            </label>
                            <span class="ml-3">Enable High Contrast Mode!</span>
                        </li>
                    </ul>                    

                    <hr>
                    <h6>General Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Allowed Notifications</span>
                            </label>                      
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Offline</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Location Permission</span>
                            </label>
                        </li>
                    </ul>

                    <a href="#" target="_blank" class="btn btn-block btn-primary">Buy this item</a>
                    <a href="" target="_blank" class="btn btn-block btn-secondary">View portfolio</a>
                </div>
                <div class="tab-pane" id="question">
                    <form>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-magnifier"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                    </form>
                    <ul class="list-unstyled question">
                        <li class="menu-heading">HOW-TO</li>
                        <li><a href="javascript:void(0);">How to Create Campaign</a></li>
                        <li><a href="javascript:void(0);">Boost Your Sales</a></li>
                        <li><a href="javascript:void(0);">Website Analytics</a></li>
                        <li class="menu-heading">ACCOUNT</li>
                        <li><a href="javascript:void(0);">Cearet New Account</a></li>
                        <li><a href="javascript:void(0);">Change Password?</a></li>
                        <li><a href="javascript:void(0);">Privacy &amp; Policy</a></li>
                        <li class="menu-heading">BILLING</li>
                        <li><a href="javascript:void(0);">Payment info</a></li>
                        <li><a href="javascript:void(0);">Auto-Renewal</a></li>                        
                        <li class="menu-button mt-3">
                            <a href="{{url('admin/dashboard')}}" class="btn btn-primary btn-block">Documentation</a>
                        </li>
                    </ul>
                </div>    
            </div>          
        </div>
    </div>

    <!-- rightbar icon div -->
   <div id="messagemodel" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
   
    <h5 class="modal-title">Massege</h5>
     <button type="button" class="close" data-dismiss="modal">&times;</button>
    
    </div>
    <div class="modal-body" style="padding-top:5px">
    </div>
    
    </div>
    
    </div>
    </div>
 
  @yield('content') 
 
 
 </div>
 <!-- Javascript -->
<script src="{{asset('admin/assets/bundles/libscripts.bundle.js')}}"></script>    
<script src="{{asset('admin/assets/bundles/vendorscripts.bundle.js')}}"></script>


<script src="{{asset('admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<!-- page vendor js file -->
<!--<script src="{{asset('admin/assets/bundles/apexcharts.bundle.js')}}"></script>
<script src="{{asset('admin/assets/bundles/easypiechart.bundle.js')}}"></script>-->
<!-- page js file -->
<script src="{{asset('admin/assets/bundles/mainscripts.bundle.js')}}"></script>
<!--<script src="{{asset('admin/js/admin/index.js')}}"></script> -->
 <script src="{{asset('admin/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('admin/js/script.js')}}"></script>


<script src="{{asset('admin/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('admin/js/pages/tables/jquery-datatable.js')}}"></script>
<!-- page js file -->
<!--<script src="{{asset('admin/assets/bundles/mainscripts.bundle.js')}}"></script>-->

</body>
</html>