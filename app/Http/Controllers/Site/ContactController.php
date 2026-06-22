<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use Auth;
use Hash;
 
use Validator;
use DB;
use Session;
use App\Inquiry; 
use App\Inquiryfollow;
 
use Carbon\Carbon; 
use Mail;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        
	   
    }
 
	
	 public function saveDataEnquiry(Request $request){
		
		
		 
		if($request->ajax()){
		 
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'mobile' 	=> 'required|numeric',	
				'service'=>'required',	
				'message' 	=> 'required',				
		 		
			]); 
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			 
		
		$inquiry = New Inquiry;		 
		$inquiry->name= $request->input('name');
		$inquiry->email= $request->input('email');
		$inquiry->mobile= trim($request->input('mobile'));			 	 
		$inquiry->service= $request->input('service');
		$inquiry->message= $request->input('message');
	 	
	 
		if($inquiry->save())
		{
		    
               
			return response()->json(['status'=>1,],200);
		}else{
			return response()->json(['status'=>0,],200);
			
			
		}
			  
		}
		
	}
  
	 
 
	
 
  
 
	
 
  
   
}
