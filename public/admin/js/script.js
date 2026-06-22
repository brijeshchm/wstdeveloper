// ************
// X-CSRF-TOKEN
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
// X-CSRF-TOKEN
// ************ 

// **************
// SPINNER OBJECT
/*
	var mainSpinner = (function(){
		var opts = {
		lines: 13 // The number of lines to draw
		, length: 28 // The length of each line
		, width: 14 // The line thickness
		, radius: 42 // The radius of the inner circle
		, scale: 1 // Scales overall size of the spinner
		, corners: 1 // Corner roundness (0..1)
		, color: '#000' // #rgb or #rrggbb or array of colors
		, opacity: 0.25 // Opacity of the lines
		, rotate: 0 // The rotation offset
		, direction: 1 // 1: clockwise, -1: counterclockwise
		, speed: 1 // Rounds per second
		, trail: 60 // Afterglow percentage
		, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
		, zIndex: 2e9 // The z-index (defaults to 2000000000)
		, className: 'spinner' // The CSS class to assign to the spinner
		, top: '50%' // Top position relative to parent
		, left: '50%' // Left position relative to parent
		, shadow: false // Whether to render a shadow
		, hwaccel: false // Whether to use hardware acceleration
		, position: 'absolute' // Element positioning
		};
		var spinnerBkgd = document.getElementById('spinnerBkgd');
		var target = document.getElementById('spinnerCntr');
		var spinner = new Spinner(opts);
		return {
			start:function(){
				spinner.spin(target);
				spinnerBkgd.style.display = 'block';
			},
			stop:function(){
				spinner.stop();
				spinnerBkgd.style.display = 'none';
			}
		}
	})();
	
	*/
// SPINNER OBJECT
// **************


$(function () {
 


$(document).ready(function () {

  








  dataTableAllUsers = $('#datatable-all-users')
.dataTable({
	"fixedHeader": true,
	"processing":true,
	"serverSide":true,
	"paging":true,
	"ordering":false,
	"lengthMenu": [
            [10,25,50,100,250,500],
            ['10','25','50','100','250','500']
        ],
		 
	"ajax":{
		url:"/admin/users/get-users",
		data:function(d){		 
			
			d.page = (d.start/d.length)+1;	
		//	d.search['name']=$('*[name="search[category]"]').val();
		//	d.search['course_type']=$('*[name="search[course_type]"]').val();	
			d.columns = null;
			d.order = null;
		},
		dataSrc:function(json){
			recordCollection = json.recordCollection;
			return json.data;
		}
	}
}).api();

 
 
// Service

  dataTableAllService = $('#datatable-all-service')
.dataTable({
	"fixedHeader": true,
	"processing":true,
	"serverSide":true,
	"paging":true,
	"ordering":false,
	"lengthMenu": [
            [10,25,50,100,250,500],
            ['10','25','50','100','250','500']
        ],
		  
	"ajax":{
		url:"/admin/service/get-service",
		data:function(d){		 
			
			d.page = (d.start/d.length)+1;	
		//	d.search['name']=$('*[name="search[category]"]').val();
		//	d.search['course_type']=$('*[name="search[course_type]"]').val();	
			d.columns = null;
			d.order = null;
		},
		dataSrc:function(json){
			recordCollection = json.recordCollection;
			return json.data;
		}
	}
}).api();

 

//About Us


  dataTableAllAboutsUs = $('#datatable-all-AboutsUs')
.dataTable({
	"fixedHeader": true,
	"processing":true,
	"serverSide":true,
	"paging":true,
	"ordering":false,
	"lengthMenu": [
            [10,25,50,100,250,500],
            ['10','25','50','100','250','500']
        ],
		 
	"ajax":{
		url:"/admin/aboutsUs/get-aboutsUs",
		data:function(d){		 
			
			d.page = (d.start/d.length)+1;	
		//	d.search['name']=$('*[name="search[category]"]').val();
		//	d.search['course_type']=$('*[name="search[course_type]"]').val();	
			d.columns = null;
			d.order = null;
		},
		dataSrc:function(json){
			recordCollection = json.recordCollection;
			return json.data;
		}
	}
}).api();



// Blog List

  dataTableAllBlogList = $('#datatable-all-BlogList')
.dataTable({
	"fixedHeader": true,
	"processing":true,
	"serverSide":true,
	"paging":true,
	"ordering":false,
	"lengthMenu": [
            [10,25,50,100,250,500],
            ['10','25','50','100','250','500']
        ],
		 
	"ajax":{
		url:"/admin/blogs/get-blogs",
		data:function(d){		 
			
			d.page = (d.start/d.length)+1;	
		//	d.search['name']=$('*[name="search[category]"]').val();
		//	d.search['course_type']=$('*[name="search[course_type]"]').val();	
			d.columns = null;
			d.order = null;
		},
		dataSrc:function(json){
			recordCollection = json.recordCollection;
			return json.data;
		}
	}
}).api();





// ContactUs

  dataTableAllContactUs = $('#datatable-all-ContactUs')
.dataTable({
	"fixedHeader": true,
	"processing":true,
	"serverSide":true,
	"paging":true,
	"ordering":false,
	"lengthMenu": [
            [10,25,50,100,250,500],
            ['10','25','50','100','250','500']
        ],
	 
	"ajax":{
		url:"/admin/contactUs/get-contactUs",
		data:function(d){		 
			
			d.page = (d.start/d.length)+1;	
		//	d.search['name']=$('*[name="search[category]"]').val();
		//	d.search['course_type']=$('*[name="search[course_type]"]').val();	
			d.columns = null;
			d.order = null;
		},
		dataSrc:function(json){
			recordCollection = json.recordCollection;
			return json.data;
		}
	}
}).api();


// category
 
  dataTableAllCategory = $('#datatable-all-category')
.dataTable({
	"fixedHeader": true,
	"processing":true,
	"serverSide":true,
	"paging":true,
	"ordering":false,
	"lengthMenu": [
            [10,25,50,100,250,500],
            ['10','25','50','100','250','500']
        ],
		 
	"ajax":{
		url:"/admin/category/get-category",
		data:function(d){		 
			
			d.page = (d.start/d.length)+1;	
		//	d.search['name']=$('*[name="search[category]"]').val();
		//	d.search['course_type']=$('*[name="search[course_type]"]').val();	
			d.columns = null;
			d.order = null;
		},
		dataSrc:function(json){
			recordCollection = json.recordCollection;
			return json.data;
		}
	}
}).api();


// Faq

  dataTableAllFaq = $('#datatable-all-Faq')
.dataTable({
	"fixedHeader": true,
	"processing":true,
	"serverSide":true,
	"paging":true,
	"ordering":false,
	"lengthMenu": [
            [10,25,50,100,250,500],
            ['10','25','50','100','250','500']
        ],
		  
	"ajax":{
		url:"/admin/faq/get-faq",
		data:function(d){		 
			
			d.page = (d.start/d.length)+1;	
		//	d.search['name']=$('*[name="search[category]"]').val();
		//	d.search['course_type']=$('*[name="search[course_type]"]').val();	
			d.columns = null;
			d.order = null;
		},
		dataSrc:function(json){
			recordCollection = json.recordCollection;
			return json.data;
		}
	}
}).api();


//homePage

  dataTableAllHomePage = $('#datatable-all-homePage')
.dataTable({
	"fixedHeader": true,
	"processing":true,
	"serverSide":true,
	"paging":true,
	"ordering":false,
	"lengthMenu": [
            [10,25,50,100,250,500],
            ['10','25','50','100','250','500']
        ],
		 
	"ajax":{
		url:"/admin/homePage/get-homePage",
		data:function(d){		 
			
			d.page = (d.start/d.length)+1;	
		//	d.search['name']=$('*[name="search[category]"]').val();
		//	d.search['course_type']=$('*[name="search[course_type]"]').val();	
			d.columns = null;
			d.order = null;
		},
		dataSrc:function(json){
			recordCollection = json.recordCollection;
			return json.data;
		}
	}
}).api();



// sliders

  dataTableAllSliders = $('#datatable-all-sliders')
.dataTable({
	"fixedHeader": true,
	"processing":true,
	"serverSide":true,
	"paging":true,
	"ordering":false,
	"lengthMenu": [
            [10,25,50,100,250,500],
            ['10','25','50','100','250','500']
        ],
		  
	"ajax":{
		url:"/admin/sliders/get-sliders",
		data:function(d){		 
			
			d.page = (d.start/d.length)+1;	
		//	d.search['name']=$('*[name="search[category]"]').val();
		//	d.search['course_type']=$('*[name="search[course_type]"]').val();	
			d.columns = null;
			d.order = null;
		},
		dataSrc:function(json){
			recordCollection = json.recordCollection;
			return json.data;
		}
	}
}).api();


// logo

  dataTableAlllogo = $('#datatable-all-Logo')
.dataTable({
	"fixedHeader": true,
	"processing":true,
	"serverSide":true,
	"paging":true,
	"ordering":false,
	"lengthMenu": [
            [10,25,50,100,250,500],
            ['10','25','50','100','250','500']
        ],
		  
	"ajax":{
		url:"/admin/logo/get-logo",
		data:function(d){		 
			
			d.page = (d.start/d.length)+1;	
		//	d.search['name']=$('*[name="search[category]"]').val();
		//	d.search['course_type']=$('*[name="search[course_type]"]').val();	
			d.columns = null;
			d.order = null;
		},
		dataSrc:function(json){
			recordCollection = json.recordCollection;
			return json.data;
		}
	}
}).api();


// gallery

  dataTableAllgallery = $('#datatable-all-Gallery')
.dataTable({
	"fixedHeader": true,
	"processing":true,
	"serverSide":true,
	"paging":true,
	"ordering":false,
	"lengthMenu": [
            [10,25,50,100,250,500],
            ['10','25','50','100','250','500']
        ],
		  
	"ajax":{
		url:"/admin/gallery/get-gallery",
		data:function(d){		 
			
			d.page = (d.start/d.length)+1;	
		//	d.search['name']=$('*[name="search[category]"]').val();
		//	d.search['course_type']=$('*[name="search[course_type]"]').val();	
			d.columns = null;
			d.order = null;
		},
		dataSrc:function(json){
			recordCollection = json.recordCollection;
			return json.data;
		}
	}
}).api();


// Testimonials

  dataTableAllTestimonials = $('#datatable-all-Testimonials')
.dataTable({
	"fixedHeader": true,
	"processing":true,
	"serverSide":true,
	"paging":true,
	"ordering":false,
	"lengthMenu": [
            [10,25,50,100,250,500],
            ['10','25','50','100','250','500']
        ],
		  
	"ajax":{
		url:"/admin/testimonials/get-testimonials",
		data:function(d){		 
			
			d.page = (d.start/d.length)+1;	
		//	d.search['name']=$('*[name="search[category]"]').val();
		//	d.search['course_type']=$('*[name="search[course_type]"]').val();	
			d.columns = null;
			d.order = null;
		},
		dataSrc:function(json){
			recordCollection = json.recordCollection;
			return json.data;
		}
	}
}).api();








    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    
    
    
    
    
    
});
    
    
});
  
  
   
  
  var serviceController = (function(){
		return {
			checked_Ids:[],				  
			serviceSave:function(THIS){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
				$.ajax({
					url:"/admin/serviceSave",
					type:"POST",					   
					dataType:"json",
					data:form,
					cache: false,
					contentType: false, 
                    processData: false,             
					success:function(data){	
					   // ;			
						if(data.status){	
						 
						$('#messagemodel .modal-title').text("doctor");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							 
							//  window.location.href ="/admin/service";
						}else{
							$('#messagemodel .modal-title').text("doctor");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					   // ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
						
                            var errors = response.errors;						 
                            $('.service_form').find('.form-group').removeClass('has-error');
                            $('.service_form').find('.help-block').remove();
                            for (var key in errors) {
                            if(errors.hasOwnProperty(key)){	
                            
                            var el = $('.service_form').find('*[name="'+key+'"]');
                            $('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
                            el.closest('.form-group').addClass('has-error');
                            }
                            }
						
							//showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

			editSaveService:function(THIS,id){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
			 
				$.ajax({
					url:"/admin/serviceEditSave/"+id,
					type:"POST",					   
					dataType:"json",	
					data:form,
					 cache: false,
					contentType: false, 
                    processData: false,                      
					success:function(data){
					    ;			
						if(data.status){	
					 					
						$('#messagemodel .modal-title').text("FAQs");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							// window.location.href ="/admin/service";
						}else{
							$('#messagemodel .modal-title').text("Course Content");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});		 
							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					    ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

		 	 
			 
			delete:function(id){
		 
			 	if( confirm("Are you sure you want to delete?") ) {	
				  
				$.ajax({
					url:"/admin/service/delete/"+id,
					type:"GET",
				 
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("Service Delete");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
					 
                        	dataTableAllService.ajax.reload(function(){
								$('#datatable-trainerrequired').find('[data-toggle="popover"]').popover({html:true,container:'body'});
							},false);
					}else{
							$('#messagemodel .modal-title').text("doctor Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
			},
			status:function(id,val){		 
			 if(val==true){
				if(confirm("Are you sure you want to change the status to Active?")){		
				 // 
				$.ajax({
					url:"/admin/service/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("Status Update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
					 
							dataTableAllService.ajax.reload(function(){
								$('#datatable-all-service').find('[data-toggle="popover"]').popover({html:true,container:'body'});
							},false);
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				
				}else{
					if(confirm("Are you sure you want to change the status to Inactive?")){		
				 // 
				$.ajax({
					url:"/admin/service/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
					 
							dataTableAllService.ajax.reload(function(){
								$('#datatable-all-service').find('[data-toggle="popover"]').popover({html:true,container:'body'});
							},false);
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				}
			}
			 
			 
			
		 
			
			
	};
	})(); 


 
 
  
 //Abouts Us

var aboutsController = (function(){
		return {
			checked_Ids:[],				  
			saveAbouts:function(THIS){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
				$.ajax({
					url:"/admin/aboutsUsSave",
					type:"POST",					   
					dataType:"json",
					data:form,
					cache: false,
					contentType: false, 
                    processData: false,             
					success:function(data){	
					   // ;			
						if(data.status){	
						 
						$('#messagemodel .modal-title').text("doctor");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							 
							 window.location.href ="/admin/aboutsUs";
						}else{
							$('#messagemodel .modal-title').text("doctor");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					   // ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
						
                            var errors = response.errors;						 
                            $('.speciality_form').find('.form-group').removeClass('has-error');
                            $('.speciality_form').find('.help-block').remove();
                            for (var key in errors) {
                            if(errors.hasOwnProperty(key)){	
                            
                            var el = $('.speciality_form').find('*[name="'+key+'"]');
                            $('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
                            el.closest('.form-group').addClass('has-error');
                            }
                            }
						
							//showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

			editSaveAbouts:function(THIS,id){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
			 
				$.ajax({
					url:"/admin/aboutsUsEditSave/"+id,
					type:"POST",					   
					dataType:"json",	
					data:form,
					 cache: false,
					contentType: false, 
                    processData: false,                      
					success:function(data){
					    ;			
						if(data.status){	
					 					
						$('#messagemodel .modal-title').text("FAQs");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							window.location.href ="/admin/aboutsUs";
						}else{
							$('#messagemodel .modal-title').text("Course Content");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});		 
							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					    ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

		 	 
			 
			delete:function(id){
		 
			 	if( confirm("Are you sure you want to delete?") ) {	
				  
				$.ajax({
					url:"/admin/aboutsUs/delete/"+id,
					type:"GET",
				 
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("doctor Delete");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllAboutsUs.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("doctor Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
			},
			status:function(id,val){		 
			 if(val==true){
				if(confirm("Are you sure you want to change the status to Active?")){		
				 // 
				$.ajax({
					url:"/admin/aboutsUs/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllAboutsUs.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				
				}else{
					if(confirm("Are you sure you want to change the status to Inactive?")){		
				 // 
				$.ajax({
					url:"/admin/aboutsUs/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllAboutsUs.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				}
			}
			
	};
	})(); 
	
	//Blog
 
var blogController = (function(){
		return {
			checked_Ids:[],				  
			saveBlog:function(THIS){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
				$.ajax({
					url:"/admin/blogsSave",
					type:"POST",					   
					dataType:"json",
					data:form,
					cache: false,
					contentType: false, 
                    processData: false,             
					success:function(data){	
					   // ;			
						if(data.status){	
						 
						$('#messagemodel .modal-title').text("doctor");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							 
							//  window.location.href ="/admin/blogList";
						}else{
							$('#messagemodel .modal-title').text("doctor");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					   // ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
						
                            var errors = response.errors;						 
                            $('.blog_form').find('.form-group').removeClass('has-error');
                            $('.blog_form').find('.help-block').remove();
                            for (var key in errors) {
                            if(errors.hasOwnProperty(key)){	
                            
                            var el = $('.blog_form').find('*[name="'+key+'"]');
                            $('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
                            el.closest('.form-group').addClass('has-error');
                            }
                            }
						
							//showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

			editSaveBlog:function(THIS,id){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
			 alert(form);
				$.ajax({
					url:"/admin/blogListEditSave/"+id,
					type:"POST",					   
					dataType:"json",	
					data:form,
					 cache: false,
					contentType: false, 
                    processData: false,                      
					success:function(data){
					    ;			
						if(data.status){	
					 					
						$('#messagemodel .modal-title').text("FAQs");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							window.location.href ="/admin/blogList";
						}else{
							$('#messagemodel .modal-title').text("Course Content");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});		 
							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					    ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

		 	 
			 
			delete:function(id){
		 
			 	if( confirm("Are you sure you want to delete?") ) {	
				  
				$.ajax({
					url:"/admin/blogList/delete/"+id,
					type:"GET",
				 
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("doctor Delete");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllBlogList.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("doctor Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
			},
			status:function(id,val){		 
			 if(val==true){
				if(confirm("Are you sure you want to change the status to Active?")){		
				 // 
				$.ajax({
					url:"/admin/blogList/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllBlogList.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				
				}else{
					if(confirm("Are you sure you want to change the status to Inactive?")){		
				 // 
				$.ajax({
					url:"/admin/blogList/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllBlogList.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				}
			}
			
	};
	})(); 
	

	
	//Contact / contactUs

var contactController = (function(){
		return {
			checked_Ids:[],				  
			saveContact:function(THIS){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
				$.ajax({
					url:"/admin/contactUsSave",
					type:"POST",					   
					dataType:"json",
					data:form,
					cache: false,
					contentType: false, 
                    processData: false,             
					success:function(data){	
					   // ;			
						if(data.status){	
						 
						$('#messagemodel .modal-title').text("doctor");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							 
							 window.location.href ="/admin/contactUs";
						}else{
							$('#messagemodel .modal-title').text("doctor");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					   // ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
						
                            var errors = response.errors;						 
                            $('.speciality_form').find('.form-group').removeClass('has-error');
                            $('.speciality_form').find('.help-block').remove();
                            for (var key in errors) {
                            if(errors.hasOwnProperty(key)){	
                            
                            var el = $('.speciality_form').find('*[name="'+key+'"]');
                            $('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
                            el.closest('.form-group').addClass('has-error');
                            }
                            }
						
							//showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

			editSaveContact:function(THIS,id){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
			 
				$.ajax({
					url:"/admin/contactUsEditSave/"+id,
					type:"POST",					   
					dataType:"json",	
					data:form,
					 cache: false,
					contentType: false, 
                    processData: false,                      
					success:function(data){
					    ;			
						if(data.status){	
					 					
						$('#messagemodel .modal-title').text("FAQs");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							window.location.href ="/admin/contactUs";
						}else{
							$('#messagemodel .modal-title').text("Course Content");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});		 
							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					    ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

		 	 
			 
			delete:function(id){
		 
			 	if( confirm("Are you sure you want to delete?") ) {	
				  
				$.ajax({
					url:"/admin/contactUs/delete/"+id,
					type:"GET",
				 
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("doctor Delete");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllContactUs.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("doctor Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
			},
			status:function(id,val){		 
			 if(val==true){
				if(confirm("Are you sure you want to change the status to Active?")){		
				 // 
				$.ajax({
					url:"/admin/contactUs/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllContactUs.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				
				}else{
					if(confirm("Are you sure you want to change the status to Inactive?")){		
				 // 
				$.ajax({
					url:"/admin/contactUs/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllContactUs.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				}
			}
			
	};
	})(); 
	
	//category / category

var CategoryController = (function(){
		return {
			checked_Ids:[],				  
			saveCategory:function(THIS){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
				$.ajax({
					url:"/admin/categorySave",
					type:"POST",					   
					dataType:"json",
					data:form,
					cache: false,
					contentType: false, 
                    processData: false,             
					success:function(data){	
					   // ;			
						if(data.status){	
						 
						$('#messagemodel .modal-title').text("doctor");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							window.location.href ="/admin/category"; 
							
						}else{
							$('#messagemodel .modal-title').text("doctor");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					   // ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
						
                            var errors = response.errors;						 
                            $('.speciality_form').find('.form-group').removeClass('has-error');
                            $('.speciality_form').find('.help-block').remove();
                            for (var key in errors) {
                            if(errors.hasOwnProperty(key)){	
                            
                            var el = $('.speciality_form').find('*[name="'+key+'"]');
                            $('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
                            el.closest('.form-group').addClass('has-error');
                            }
                            }
						
							//showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

			editSaveCategory:function(THIS,id){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
			 
				$.ajax({
					url:"/admin/categoryEditSave/"+id,
					type:"POST",					   
					dataType:"json",	
					data:form,
					 cache: false,
					contentType: false, 
                    processData: false,                      
					success:function(data){
					    ;			
						if(data.status){	
					 					
						$('#messagemodel .modal-title').text("FAQs");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							// window.location.href ="/admin/category";
						}else{
							$('#messagemodel .modal-title').text("Course Content");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});		 
							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					    ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

		 	 
			 
			delete:function(id){
		 
			 	if( confirm("Are you sure you want to delete?") ) {	
				  
				$.ajax({
					url:"/admin/category/delete/"+id,
					type:"GET",
				 
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("doctor Delete");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllCategory.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("doctor Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
			},
			status:function(id,val){		 
			 if(val==true){
				if(confirm("Are you sure you want to change the status to Active?")){		
				 // 
				$.ajax({
					url:"/admin/category/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllCategory.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				
				}else{
					if(confirm("Are you sure you want to change the status to Inactive?")){		
				 // 
				$.ajax({
					url:"/admin/category/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllCategory.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				}
			}
			
	};
	})(); 
	
	//Faqs / faq

var faqqController = (function(){
		return {
			checked_Ids:[],				  
			saveFaqq:function(THIS){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
				$.ajax({
					url:"/admin/faqSave",
					type:"POST",					   
					dataType:"json",
					data:form,
					cache: false,
					contentType: false, 
                    processData: false,             
					success:function(data){	
					   // ;			
						if(data.status){	
						 
						$('#messagemodel .modal-title').text("doctor");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							 
							 window.location.href ="/admin/faq";
						}else{
							$('#messagemodel .modal-title').text("doctor");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					   // ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
						
                            var errors = response.errors;						 
                            $('.speciality_form').find('.form-group').removeClass('has-error');
                            $('.speciality_form').find('.help-block').remove();
                            for (var key in errors) {
                            if(errors.hasOwnProperty(key)){	
                            
                            var el = $('.speciality_form').find('*[name="'+key+'"]');
                            $('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
                            el.closest('.form-group').addClass('has-error');
                            }
                            }
						
							//showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

			editSaveFaqq:function(THIS,id){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
			 
				$.ajax({
					url:"/admin/faqEditSave/"+id,
					type:"POST",					   
					dataType:"json",	
					data:form,
					 cache: false,
					contentType: false, 
                    processData: false,                      
					success:function(data){
					    ;			
						if(data.status){	
					 					
						$('#messagemodel .modal-title').text("FAQs");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							window.location.href ="/admin/faq";
						}else{
							$('#messagemodel .modal-title').text("Course Content");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});		 
							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					    ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

		 	 
			 
			delete:function(id){
		 
			 	if( confirm("Are you sure you want to delete?") ) {	
				  
				$.ajax({
					url:"/admin/faq/delete/"+id,
					type:"GET",
				 
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("doctor Delete");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllFaq.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("doctor Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
			},
			status:function(id,val){		 
			 if(val==true){
				if(confirm("Are you sure you want to change the status to Active?")){		
				 // 
				$.ajax({
					url:"/admin/faq/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllFaq.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				
				}else{
					if(confirm("Are you sure you want to change the status to Inactive?")){		
				 // 
				$.ajax({
					url:"/admin/faq/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllFaq.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				}
			}
			
	};
	})(); 
	
	
	
	//Home Page	
var homePageController = (function(){
		return {
			checked_Ids:[],				
			editSavehome:function(THIS,id){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
			 
				$.ajax({
					url:"/admin/homePageEditSave/"+id,
					type:"POST",					   
					dataType:"json",	
					data:form,
					 cache: false,
					contentType: false, 
                    processData: false,                      
					success:function(data){
					    ;			
						if(data.status){	
					 					
						$('#messagemodel .modal-title').text("FAQs");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							window.location.href ="/admin/homePage";
						}else{
							$('#messagemodel .modal-title').text("Course Content");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});		 
							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					    ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

		 	 
			 
			
			status:function(id,val){		 
			 if(val==true){
				if(confirm("Are you sure you want to change the status to Active?")){		
				 // 
				$.ajax({
					url:"/admin/homePage/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllHomePage.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    			
						 alert('some error');
					}
				});
				}
				
				}else{
					if(confirm("Are you sure you want to change the status to Inactive?")){		
				 // 
				$.ajax({
					url:"/admin/homePage/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 		
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllHomePage.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    			
						 alert('some error');
					}
				});
				}
				}
			}
		
	};
	})(); 
	
	
	
	
	
	//sliders

var SliderController = (function(){
		return {
			checked_Ids:[],				  
			saveSlider:function(THIS){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
				$.ajax({
					url:"/admin/slidersSave",
					type:"POST",					   
					dataType:"json",
					data:form,
					cache: false,
					contentType: false, 
                    processData: false,             
					success:function(data){	
					   // ;			
						if(data.status){	
						 
						$('#messagemodel .modal-title').text("doctor");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							 
							 window.location.href ="/admin/sliders";
						}else{
							$('#messagemodel .modal-title').text("doctor");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					   // ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
						
                            var errors = response.errors;						 
                            $('.speciality_form').find('.form-group').removeClass('has-error');
                            $('.speciality_form').find('.help-block').remove();
                            for (var key in errors) {
                            if(errors.hasOwnProperty(key)){	
                            
                            var el = $('.speciality_form').find('*[name="'+key+'"]');
                            $('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
                            el.closest('.form-group').addClass('has-error');
                            }
                            }
						
							//showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

			editSaveslider:function(THIS,id){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
			 
				$.ajax({
					url:"/admin/slidersEditSave/"+id,
					type:"POST",					   
					dataType:"json",	
					data:form,
					 cache: false,
					contentType: false, 
                    processData: false,                      
					success:function(data){
					    ;			
						if(data.status){	
					 					
						$('#messagemodel .modal-title').text("FAQs");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							window.location.href ="/admin/sliders";
						}else{
							$('#messagemodel .modal-title').text("Course Content");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});		 
							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					    ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

		 	 
			 
			delete:function(id){
		 
			 	if( confirm("Are you sure you want to delete?") ) {	
				  
				$.ajax({
					url:"/admin/sliders/delete/"+id,
					type:"GET",
				 
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("doctor Delete");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllsliders.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("doctor Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
			},
			status:function(id,val){		 
			 if(val==true){
				if(confirm("Are you sure you want to change the status to Active?")){		
				 // 
				$.ajax({
					url:"/admin/sliders/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllsliders.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				
				}else{
					if(confirm("Are you sure you want to change the status to Inactive?")){		
				 // 
				$.ajax({
					url:"/admin/sliders/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllsliders.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				}
			}
			
	};
	})(); 
	
	//logo / logo

var logoController = (function(){
		return {
			checked_Ids:[],				  
			editSavelogo:function(THIS,id){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
			 
				$.ajax({
					url:"/admin/logoEditSave/"+id,
					type:"POST",					   
					dataType:"json",	
					data:form,
					 cache: false,
					contentType: false, 
                    processData: false,                      
					success:function(data){
					    ;			
						if(data.status){	
					 					
						$('#messagemodel .modal-title').text("FAQs");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							window.location.href ="/admin/logo";
						}else{
							$('#messagemodel .modal-title').text("Course Content");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});		 
							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					    ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

			status:function(id,val){		 
			 if(val==true){
				if(confirm("Are you sure you want to change the status to Active?")){		
				 // 
				$.ajax({
					url:"/admin/logo/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAlllogo.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				
				}else{
					if(confirm("Are you sure you want to change the status to Inactive?")){		
				 // 
				$.ajax({
					url:"/admin/logo/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAlllogo.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				}
			}
			
	};
	})(); 
	
	//gallery / gallery

var galleryController = (function(){
		return {
			checked_Ids:[],				  
			savegallery:function(THIS){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
				$.ajax({
					url:"/admin/gallerySave",
					type:"POST",					   
					dataType:"json",
					data:form,
					cache: false,
					contentType: false, 
                    processData: false,             
					success:function(data){	
					   // ;			
						if(data.status){	
						 
						$('#messagemodel .modal-title').text("doctor");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							 
							 window.location.href ="/admin/gallery";
						}else{
							$('#messagemodel .modal-title').text("doctor");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					   // ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
						
                            var errors = response.errors;						 
                            $('.speciality_form').find('.form-group').removeClass('has-error');
                            $('.speciality_form').find('.help-block').remove();
                            for (var key in errors) {
                            if(errors.hasOwnProperty(key)){	
                            
                            var el = $('.speciality_form').find('*[name="'+key+'"]');
                            $('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
                            el.closest('.form-group').addClass('has-error');
                            }
                            }
						
							//showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

			editSavegallery:function(THIS,id){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
			 
				$.ajax({
					url:"/admin/galleryEditSave/"+id,
					type:"POST",					   
					dataType:"json",	
					data:form,
					 cache: false,
					contentType: false, 
                    processData: false,                      
					success:function(data){
					    ;			
						if(data.status){	
					 					
						$('#messagemodel .modal-title').text("FAQs");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							//window.location.href ="/admin/galleryEdit/edit/"+btoa(id);
								window.location.href ="/admin/gallery";
							
						}else{
							$('#messagemodel .modal-title').text("Course Content");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});		 
							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					    ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

		 	 
			 
			delete:function(id){
		 
			 	if( confirm("Are you sure you want to delete?") ) {	
				  
				$.ajax({
					url:"/admin/gallery/delete/"+id,
					type:"GET",
				 
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("doctor Delete");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllgalleryory.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("doctor Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
			},
			status:function(id,val){		 
			 if(val==true){
				if(confirm("Are you sure you want to change the status to Active?")){		
				 // 
				$.ajax({
					url:"/admin/gallery/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllgalleryory.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				
				}else{
					if(confirm("Are you sure you want to change the status to Inactive?")){		
				 // 
				$.ajax({
					url:"/admin/gallery/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllgalleryory.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				}
			}
			
	};
	})(); 
	
	
	//Testimonial / testimonials

var testimonialController = (function(){
		return {
			checked_Ids:[],				  
			saveTestimonial:function(THIS){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
				$.ajax({
					url:"/admin/testimonialsSave",
					type:"POST",					   
					dataType:"json",
					data:form,
					cache: false,
					contentType: false, 
                    processData: false,             
					success:function(data){	
					   // ;			
						if(data.status){	
						 
						$('#messagemodel .modal-title').text("doctor");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							 
							 window.location.href ="/admin/testimonials";
						}else{
							$('#messagemodel .modal-title').text("doctor");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					   // ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
						
                            var errors = response.errors;						 
                            $('.speciality_form').find('.form-group').removeClass('has-error');
                            $('.speciality_form').find('.help-block').remove();
                            for (var key in errors) {
                            if(errors.hasOwnProperty(key)){	
                            
                            var el = $('.speciality_form').find('*[name="'+key+'"]');
                            $('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
                            el.closest('.form-group').addClass('has-error');
                            }
                            }
						
							//showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

			editSaveTestimonial:function(THIS,id){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
			 
				$.ajax({
					url:"/admin/testimonialsEditSave/"+id,
					type:"POST",					   
					dataType:"json",	
					data:form,
					 cache: false,
					contentType: false, 
                    processData: false,                      
					success:function(data){
					    ;			
						if(data.status){	
					 					
						$('#messagemodel .modal-title').text("FAQs");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							window.location.href ="/admin/testimonials";
						}else{
							$('#messagemodel .modal-title').text("Course Content");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});		 
							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					    ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

		 	 
			 
			delete:function(id){
		 
			 	if( confirm("Are you sure you want to delete?") ) {	
				  
				$.ajax({
					url:"/admin/testimonials/delete/"+id,
					type:"GET",
				 
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("doctor Delete");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllTestimonials.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("doctor Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
			},
			status:function(id,val){		 
			 if(val==true){
				if(confirm("Are you sure you want to change the status to Active?")){		
				 // 
				$.ajax({
					url:"/admin/testimonials/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllTestimonials.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				
				}else{
					if(confirm("Are you sure you want to change the status to Inactive?")){		
				 // 
				$.ajax({
					url:"/admin/testimonials/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllTestimonials.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				}
			}
			
	};
	})(); 
	
	
	//users

var usersController = (function(){
		return {
			checked_Ids:[],				  
			saveUsers:function(THIS){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
				$.ajax({
                 
					url:"/admin/saveUsers",
					type:"POST",					   
					dataType:"json",
					data:form,
					cache: false,
					contentType: false, 
                    processData: false,             
					success:function(data){	
					   // ;			
						if(data.status){	
						 
						$('#messagemodel .modal-title').text("user");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							 
							 window.location.href ="/admin/users";
						}else{
							$('#messagemodel .modal-title').text("doctor");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					   // ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
						
                            var errors = response.errors;						 
                            $('.user_form').find('.form-group').removeClass('has-error');
                            $('.user_form').find('.help-block').remove();
                            for (var key in errors) {
                            if(errors.hasOwnProperty(key)){	
                            
                            var el = $('.user_form').find('*[name="'+key+'"]');
                            $('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
                            el.closest('.form-group').addClass('has-error');
                            }
                            }
						
							//showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

			editSaveUsers:function(THIS,id){	
			  var $this = $(THIS);
			var form = new FormData(THIS);	
			 
				$.ajax({
					url:"/admin/usersEditSave/"+id,
					type:"POST",					   
					dataType:"json",	
					data:form,
					 cache: false,
					contentType: false, 
                    processData: false,                      
					success:function(data){
					    ;			
						if(data.status){	
					 					
						$('#messagemodel .modal-title').text("FAQs");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+data.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
							removeValidationErrors($this);
							window.location.href ="/admin/users";
						}else{
							$('#messagemodel .modal-title').text("Course Content");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+data.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});		 
							
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					    ;			
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},

		 	 
			 
			delete:function(id){
		 
			 	if( confirm("Are you sure you want to delete?") ) {	
				  
				$.ajax({
					url:"/admin/users/delete/"+id,
					type:"GET",
				 
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("doctor Delete");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllUsers.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("doctor Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
			},
			status:function(id,val){		 
			 if(val==true){
				if(confirm("Are you sure you want to change the status to Active?")){		
				 // 
				$.ajax({
					url:"/admin/users/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllUsers.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				
				}else{
					if(confirm("Are you sure you want to change the status to Inactive?")){		
				 // 
				$.ajax({
					url:"/admin/users/status/"+id+"/"+val,
					type:"GET",					
					success:function(response){	
					 ;			
					if(response.status){
						$('#messagemodel .modal-title').text("status successfully update");	
						$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
						$('#messagemodel').modal({keyboard:false,backdrop:'static'});
						$('#messagemodel').css({'width':'100%'});
						dataTableAllUsers.ajax.reload( null, false );   
					}else{
							$('#messagemodel .modal-title').text("Status successfully update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");		
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
					}						
					},
					error:function(response){
					    ;			
						 alert('some error');
					}
				});
				}
				}
			}
			
	};
	})(); 
	

  
  

  
		  
  	
   
  	
  
  
  var permissionController = (function(){
		return {
			submit:function(THIS){
				
				var $this = $(THIS),
					data  = $this.serialize();
				$.ajax({
					url:"/genie/permission",
					type:"POST",
					data:data,
					success:function(response){
						if(response.status){
							;
							$('#messagemodel').modal();
							$('#messagemodel .modal-title').text("User Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
							dataTablePermission.ajax.reload(null,false);
							window.location="/genie/permission";	
						}else{
							;
							$('#messagemodel .modal-title').text("User Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");	
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
						
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						;
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				});
				return false;
			},

			editSaveSubmit:function(THIS,id){
				
				var $this = $(THIS),
					data  = $this.serialize();
				$.ajax({
					url:"/genie/permission/saveEdit/"+id,
					type:"POST",
					data:data,
					success:function(response){
 
						if(response.status){
							;
							$('#messagemodel').modal();
							$('#messagemodel .modal-title').text("Permission Update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
							
							window.location="/genie/permission";	
						}else{
							;
							$('#messagemodel').modal();
							$('#messagemodel .modal-title').text("Permission Update");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");	
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});
						
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						;
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				});
				return false;
			},
			delete:function(id){
				if(confirm("Are You Sure Want to Deleted!")){
					
					$.ajax({
						url:"/genie/permission/delete/"+id,
						type:"GET",
						success:function(response){
 
							if(response.status){
								; 
								dataTablePermission.ajax.reload(null,false);
								$('#messagemodel').modal();
								$('#messagemodel .modal-title').text("Permission Delete");	
								$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
								$('#messagemodel').modal({keyboard:false,backdrop:'static'});
								$('#messagemodel').css({'width':'100%'});
								
							}else{
								;
							$('#messagemodel').modal();
							$('#messagemodel .modal-title').text("Permission Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");	
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});						
								 
							}
						},
						error:function(response){
							;
							 
						}
					});
				}
				return false;
			}
		};
	})();
 
var rolePermissionController = (function(){
		return {
			submit:function(THIS){
				
				var $this = $(THIS),
					data  = $this.serialize();
					
				$.ajax({
					url:"/genie/role-permission",
					type:"POST",
					data:data,
					success:function(response){
						if(response.status){
							;
								$('#messagemodel').modal();
							$('#messagemodel .modal-title').text("Permission Delete");	
								$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
								$('#messagemodel').modal({keyboard:false,backdrop:'static'});
								$('#messagemodel').css({'width':'100%'});
							dataTableRolePermission.ajax.reload(null,false);
						}else{
							;
							$('#messagemodel').modal();
							$('#messagemodel .modal-title').text("Permission Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");	
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});								
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						;
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				});
				return false;
			},
			editRoleSaveSubmit:function(THIS,id){
				
				var $this = $(THIS),
					data  = $this.serialize();
					
				$.ajax({
					url:"/genie/role-permission/update/"+id,
					type:"POST",
					data:data,
					success:function(response){
						if(response.status){
							;
								$('#messagemodel').modal();
							$('#messagemodel .modal-title').text("Permission Delete");	
								$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
								$('#messagemodel').modal({keyboard:false,backdrop:'static'});
								$('#messagemodel').css({'width':'100%'}); 
							window.location="/genie/role-permission";
						}else{
							;
							$('#messagemodel').modal();
							$('#messagemodel .modal-title').text("Permission Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");	
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});								
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
						;
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){
							showValidationErrors($this,response.errors);						 
						}else{
							alert('Something went wrong');
						}
						 
					}
				});
				return false;
			},
			
			delete:function(id){
				if(confirm("Are you sure ??")){ 
					
					$.ajax({
						url:"/genie/role-permission/delete/"+id,
						type:"GET",
						success:function(response){
							if(response.status){
								;
								$('#messagemodel').modal();
								$('#messagemodel .modal-title').text("Permission Delete");	
								$('#messagemodel .modal-body').html("<div class='alert alert-success'>"+response.msg+"</div>");			
								$('#messagemodel').modal({keyboard:false,backdrop:'static'});
								$('#messagemodel').css({'width':'100%'});
								dataTableRolePermission.ajax.reload(null,false);
							}else{
								;
								$('#messagemodel').modal();
								$('#messagemodel .modal-title').text("Permission Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");	
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});							
								dataTableRolePermission.ajax.reload(null,false); 
							}
						},
						error:function(response){
							;
							$('#messagemodel').modal();
							$('#messagemodel .modal-title').text("Permission Delete");	
							$('#messagemodel .modal-body').html("<div class='alert alert-danger'>"+response.msg+"</div>");	
							$('#messagemodel').modal({keyboard:false,backdrop:'static'});
							$('#messagemodel').css({'width':'100%'});	
						}
					});
				}
				return false;
			}
		};
	})();

  
  
	function removeValidationErrors($this){
		$this.find('.form-group').removeClass('has-error');
		$this.find('.help-block').remove();
	}
		 
		function showValidationErrors($this,errors){
 
		$this.find('.clearfix').find('.form-group').removeClass('has-error');
		$this.find('.help-block').remove();
		for (var key in errors) {
		if(errors.hasOwnProperty(key)){
		var el = $this.find('*[name="'+key+'"]');
		$('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
		el.closest('.form-group').addClass('has-error');
		
		}
		}
		}
	 
 	  $('.select2_select').select2();
	  	 
		 
 function isNumberKey(e){
     var a=e.keyCode||e.charCode;return!!(a>=48)&&!!(a<=57) }






