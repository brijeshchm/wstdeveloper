	$.ajaxSetup({	headers: {	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')	}	});
	
	var contactController = (function(){
		return {
			checked_Ids:[],				  
			dataSaveForm:function(THIS){	
			  var $this = $(THIS);			
 		 
			var form = new FormData(THIS);	
				$.ajax({
					url:"/dataSaveForm",
					type:"POST",				 	
					dataType:"json",
					data:form,						 
					cache: false,
					contentType: false, 
					processData: false, 					
					success:function(data){	
					 		 
						if(data.status){	
										 						 
							$(".resetData").click();
							$("#successMessage").modal('show');
							$('.imgclass').html('<img src="../site/img/Thanks.png" style="width: 80%;text-align: center;margin: auto;display: block;">');
							$('.successhtml').html("<p class='text-center' style='font-weight: 600;'>Your Submission has been received. <br>  Our experts will reach out to you in the next 24 hours.</p>");
							$('#successMessage').modal({backdrop:"static",keyboard:false});
						 
							$this.find('.form-inline').removeClass('has-error');
							$this.find('.help-block').remove();
							//location.reload();
							
							
							 
						}else{						 				
						 				
							$("#successMessage").modal();
							$('.imgclass').html('<img src="../site/img/error-msg.png" style="width: 80%;text-align: center;margin: auto;display: block;">');			
							$('.failedhtml').html("<p class='text-center'>Some Errot Please Tray again.</p>");	
							$('#successMessage').modal({backdrop:"static",keyboard:false});	
						}
					},
					error:function(jqXHR, textStatus, errorThrown){
					    		
						var response = JSON.parse(jqXHR.responseText);
						if(response.status){ 
						
                            var errors = response.errors;						 
                            $('.register_form').find('.form-group').removeClass('has-error');
                            $('.register_form').find('.help-block').remove();
                            for (var key in errors) {
                            if(errors.hasOwnProperty(key)){	
                            
                            var el = $('.register_form').find('*[name="'+key+'"]');
                            $('<span class="help-block"><strong>'+errors[key][0]+'</strong></span>').insertAfter(el);
                            el.closest('.form-group').addClass('has-error');
                            }
                            }
						
							 					 
						}else{
							alert('Something went wrong');
						}
						 
					}
				}); 
				 return false;	
			},
			 
			
		 
			
			
	};
	})(); 

 
	function isNumericKeyCheck(e){
		var keyCode = e.keyCode || e.charCode;
		if(keyCode>=48&&keyCode<=57)
		return true;
		else
		return false;
		}
		
	
	$(".close").click(function(){	 
	$("#successMessage").modal('hide');
	 		 
	});
