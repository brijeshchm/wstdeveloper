<?php

use Illuminate\Http\Request;
 

/**
 * CONTAINS HELPER FUNCTIONS
 */
 
   
// SENDING SMS AND IT'S CONFIGURATION
// **********************************
function sendSMS($sendto, $message,$tempid=null){
	$username = 't1cromacampussms';
	$password = '42308595';
	$sender = 'CCAMPS';
	$sendto = $sendto;
		$tempid = $tempid;
	//$templateId = '1707161786775524106';
	$message = str_replace(' ', '%20', $message);
//	$url = 'http://nimbusit.co.in/api/swsendSingle.asp';
	$url = 'http://nimbusit.co.in/api/swsend.asp';
//	$data = "username=$username&password=$password&sender=$sender&sendto=$sendto&message=$message&entityID=1701160344973814570";
 
		$data = "username=$username&password=$password&sender=$sender&sendto=$sendto&entityID=1701160344973814570&templateID=$tempid&message=$message";
//http://nimbusit.co.in/api/swsendSingle.asp?username=t1cromacampussms&password=42308595&sender=CCAMPS&sendto=9205323836&entityID=1701160344973814570&templateID=1707161786775524106&message=%201234%20is%20Lead%20Portal%20Verification%20Code%20for%20Brijesh%20CROMA%20CAMPUS

//http://nimbusit.co.in/api/swsendSingle.asp?username=t1cromacampussms&password=42308595&sender=CCAMPS&sendto=9205323836&entityID=1701160344973814570&templateID=1707161786775524106&message=v
//http://nimbusit.co.in/api/swsendSingle.asp?username=xxxx&password=xxxx&sender=senderId&sendto=919xxxx&entityID=170134xxxxxxxxx&templateID=158777xxxxxxxxxxx&message=hello  

	$objURL = curl_init($url);
	curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($objURL, CURLOPT_POST, 1);
	curl_setopt($objURL, CURLOPT_POSTFIELDS, $data);
	$retval = trim(curl_exec($objURL));
	curl_close($objURL);
	return $retval;
}

function getPhone(){
 
	 
	$phone= '91-971 152 6942';
	 return $phone;
}

function getWhatsApp(){
	
 
	 $phone= '918287060032';
	 // $phone= '919818014543';
	 return $phone;
}
/*
 function getCounsellorName($id){
 $phonePayemp = json_decode(file_get_contents('https://employment.cromacampus.com/api/getcounsellor-name/'.$id));
	 return $phonePayemp;
}
*/


 function offerTimes(){

$offerTime = OfferTime::where('id',1)->first();

return $offerTime->datetime;
}

// SENDING SMS AND IT'S CONFIGURATION
// **********************************
function sendSMSss($sendto, $message,$tempid=null){
	$username = 't1cromacampussms';
	$password = '42308595';
	$sender = 'CCAMPS';
	$sendto = $sendto;
	$message = str_replace(' ', '%20', $message);
	$url = 'http://nimbusit.co.in/api/swsendSingle.asp';
//	$url = 'http://nimbusit.co.in/api/swsend.asp';
//	$data = "username=$username&password=$password&sender=$sender&sendto=$sendto&message=$message";
	$data = "username=$username&password=$password&sender=$sender&sendto=$sendto&entityID=1701160344973814570&templateID=$tempid&message=$message";
	$objURL = curl_init($url);
	curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($objURL, CURLOPT_POST, 1);
	curl_setopt($objURL, CURLOPT_POSTFIELDS, $data);
	$retval = trim(curl_exec($objURL));
	curl_close($objURL);
	return $retval;
}


function bucketLeadCounsellor($val,$lead_course_id,$type_lead,$inquiry){
	
			$absentassigncourse = BucketCourseAssignment::where('counsellors',$val)->get();	
			
		//	echo "<pre>";print_r($absentassigncourse);die;
			if($absentassigncourse->count()>0){
			if($type_lead=='Domestic'){				
			$catCourse = CatCourse::findOrFail($lead_course_id);	
			$bucketIndex = $catCourse->bucket;

			$max = $mCount = 15;
			$i=0;
			$totalClients = count($absentassigncourse);
			$absentbuckets = [];
			$newbucket = [];
			$newbucketmerger = [];
			foreach($absentassigncourse as $counsellor){
			$absentcounsellors= BucketCourseAssignment::where('counsellors',$counsellor->counsellors)->get();
			foreach($absentcounsellors as $absentcounsellor){
			if($mCount == 0){
			$j = $i;
			$absentbuckets[++$j] = $absentbuckets[$i++];
			$absentbuckets[$j]['bucket_assign_dom_course'] = [];
			$mCount = $max-(count($absentbuckets[$j],1)-1);
			}
			if(in_array($lead_course_id,unserialize($absentcounsellor->bucket_assign_dom_course))){
			$absentbuckets[$i]['bucket_assign_dom_course'][] = $absentcounsellor->tocounsellor;
			}   
		
			--$mCount;
			}
			
			}
			$j=0;
			
			 if(count($absentbuckets)>0){
				foreach($absentbuckets as $bucket){
				foreach($bucket as $position=>$counsellors){
				foreach($counsellors as $assign){			 
				array_push($newbucket, $assign);
				}
				}
				}
			 } 
			
		 
			$bucketCount = count($newbucket);
				if(!empty($bucketCount)){
			foreach($newbucket as $key=>$valc){
			    
			    $user= 	Courseassignment::where('counsellors',$valc)->first();			
			if($user->leadassign+1<=$user->leadcount){
			 
		 	$lead =  new LeadInquiry;			
			$lead->name = $inquiry->name;
			$lead->email = $inquiry->email;		
			$lead->code = $inquiry->code;			
			$lead->mobile =$inquiry->mobile;			
			$lead->type =1;			
			$lead->source = $inquiry->source_id;
			$lead->source_name = $inquiry->source;
			$lead->course = $inquiry->course_id;
			$lead->course_name = $inquiry->course;
			$lead->status = 1;
			$lead->status_name = "New Lead";			 
			$lead->created_by = $valc;
			$lead->croma_id = $inquiry->id;
			$inquiry= Inquiry::findOrFail($inquiry->id);
			$inquiry->assigned_to=	$valc;
			$inquiry->save(); 
			if($lead->save()){
			$followUp = new LeadInquiryfollow;
			$followUp->status = LeadStatus::where('name','LIKE','New Lead')->first()->id;							
			$followUp->followby = $lead->created_by;
			if(!empty($inquiry->comment)){
			$followUp->remark = $inquiry->comment; 
			}else{
			    $followUp->remark="";
			}
			$followUp->expected_date_time = date('Y-m-d H:i:s');
			$followUp->lead_id = $lead->id;				 
			$followUp->save(); 
			$usercunsl= Courseassignment::where('counsellors',$valc)->first();	
			$usercunsl->leadassign = $usercunsl->leadassign+1;
			$usercunsl->save();
			}			
		//	$kw = CatCourse::find($lead_course_id);
		//	$kw->bucket = $i+1;
		//	$kw->save();
			

		
			
			
			 
			}else{
			   $inquiry= Inquiry::findOrFail($inquiry->id);
					$inquiry->reason="Bucket Full";
					$inquiry->save(); 
			    
			}
            }
                }else{
                
                $inquiry= Inquiry::findOrFail($inquiry->id);
                $inquiry->reason="Counsellor-NF";
                $inquiry->save();
                }
		 
			 }else{
				 
				 
			$catCourse = CatCourse::findOrFail($lead_course_id);	
			$bucketIndex = $catCourse->bucketinter;				

			$max = $mCount = 15;
			$i=0;
			$totalClients = count($absentassigncourse);
			$absentbuckets = [];
			$newbucket = [];
			$newbucketmerger = [];
			foreach($absentassigncourse as $counsellor){
		 	$absentcounsellors= BucketCourseAssignment::where('counsellors',$counsellor->counsellors)->get();
			foreach($absentcounsellors as $absentcounsellor){
			if($mCount == 0){
			$j = $i;
			$absentbuckets[++$j] = $absentbuckets[$i++];
			$buckets[$j]['bucket_assign_int_course'] = [];
			$mCount = $max-(count($absentbuckets[$j],1)-1);
			}
			if(in_array($lead_course_id,unserialize($absentcounsellor->bucket_assign_int_course))){
			$absentbuckets[$i]['bucket_assign_int_course'][] = $absentcounsellor->tocounsellor;
			}

			--$mCount;
			}
			}
			$j=0;
			if(count($absentbuckets)>0){
			foreach($absentbuckets as $bucket){
				foreach($bucket as $position=>$counsellors){
						foreach($counsellors as $assign){			 
						array_push($newbucket, $assign);
						}
				}
				}
			 } 
			
		 
			$bucketCount = count($newbucket);
			if(!empty($bucketCount)){
			foreach($newbucket as $key=>$valc){
			 	
		 $user= 	Courseassignment::where('counsellors',$valc)->first();			
			if($user->leadassign+1<=$user->leadcount){
 
		 	$lead =  new LeadInquiry;			
			$lead->name = $inquiry->name;
			$lead->email = $inquiry->email;		
			$lead->code = $inquiry->code;			
			$lead->mobile =$inquiry->mobile;			
			$lead->type =1;			
			$lead->source = $inquiry->source_id;
			$lead->source_name = $inquiry->source;
			$lead->course = $inquiry->course_id;
			$lead->course_name = $inquiry->course;
			$lead->status = 1;
			$lead->status_name = "New Lead";			 
			$lead->created_by = $valc;
			$lead->croma_id = $inquiry->id;
			$inquiry= Inquiry::findOrFail($inquiry->id);
			$inquiry->assigned_to=	$valc;	
			$inquiry->save();
			
			$usercunsl= Courseassignment::where('counsellors',$valc)->first();	
			$usercunsl->leadassign = $usercunsl->leadassign+1;
			$usercunsl->save();
			if($lead->save()){
			$followUp = new LeadInquiryfollow;
			$followUp->status = LeadStatus::where('name','LIKE','New Lead')->first()->id;							
			$followUp->followby = $lead->created_by;
			if(!empty($inquiry->comment)){
			$followUp->remark = $inquiry->comment; 
			}else{
			    $followUp->remark="";
			}
			$followUp->expected_date_time = date('Y-m-d H:i:s');
			$followUp->lead_id = $lead->id;				 
			$followUp->save(); 

			}  
			  
			
		 
		 
			}else{
			    
			    $inquiry= Inquiry::findOrFail($inquiry->id);
		    	$inquiry->reason="Bucket Full";
		    	$inquiry->save();
			}
        }  
        
			 }else{
			    $inquiry= Inquiry::findOrFail($inquiry->id);
				$inquiry->reason="Counsellor-NF";
				$inquiry->save();
			 }
			 } 
		 }
}

function absentleadassignCounsellor($lead_course_id,$type_lead,$inquiry){
 
		$absentassigncourse = Courseassignment::where('status',0)->get();	
			if($absentassigncourse->count()>0){
				
			if($type_lead=='Domestic'){				
			$catCourse = CatCourse::findOrFail($lead_course_id);	
			$bucketIndex = $catCourse->bucket;
			$max = $mCount = 15;
			$i=0;
			$assignbuckets = [];	
			$newconsellor = [];	
			$newbucket = [];  
			
			foreach($absentassigncourse as $counsellor){
			    
			if($mCount == 0){			
			$j = $i;
			$assignbuckets[++$j] = $assignbuckets[$i++];
			$assignbuckets[$j]['assign_dom_course'] = [];
			$mCount = $max-(count($assignbuckets[$j],1)-1);
			}
			if(in_array($lead_course_id,unserialize($counsellor->assign_dom_course))){
			$assignbuckets[$i]['assign_dom_course'][] = $counsellor->counsellors;
			}   

			--$mCount;
			 

			}
			
	 
			foreach($assignbuckets as $bucket){
			foreach($bucket as $position=>$counsellors){
			foreach($counsellors as $assign){			 
			array_push($newconsellor, $assign);
			}
			}
			}

			$bucketCount = count($newconsellor);
				$maxn = $mCountn = 15;
				$in=0;
			foreach($newconsellor as $key=>$val){
			$absentcounsellors= AbsentCourseassignment::where('counsellors',$val)->get();
			foreach($absentcounsellors as $absentcounsellor){
			 if($mCount == 0){			
			$jn = $in;
			$absentbuckets[++$jn] = $absentbuckets[$in++];
			$absentbuckets[$jn]['absent_assign_dom_course'] = [];
			$mCountn = $maxn-(count($absentbuckets[$jn],1)-1);
			 }
			if(in_array($lead_course_id,unserialize($absentcounsellor->absent_assign_dom_course))){
			$absentbuckets[$in]['absent_assign_dom_course'][] = $absentcounsellor->tocounsellor;
			}   
		
			--$mCountn;
			}

			}
		 
			 
			
			 if(count($absentbuckets)>0){
				foreach($absentbuckets as $bucket){
				foreach($bucket as $position=>$counsellors){
				foreach($counsellors as $assign){			 
				array_push($newbucket, $assign);
				}
				}
				}
				
				
			 }else{			 
				 
			$maxnot = $mCountnot = 15;
			$ino=0;
				   $notabsentassigncourse= 	Courseassignment::where('status',0)->get();						  
					foreach($notabsentassigncourse as $notcounsellor){					 				 
					 if($mCountnot == 0){		
					$jno = $ino;
					$notabsentbuckets[++$jno] = $notabsentbuckets[$ino++];
					$notabsentbuckets[$jno]['assign_dom_course'] = [];
					$mCountnot = $maxnot-(count($notabsentbuckets[$jno],1)-1);
					 }
					if(in_array($lead_course_id,unserialize($notcounsellor->assign_dom_course))){
					$notabsentbuckets[$ino]['assign_dom_course'][] = $notcounsellor->counsellors;
					}  
				
					--$mCountnot;	 

					}
					foreach($notabsentbuckets as $notbucket){
					foreach($notbucket as $position=>$notcounsellors){
					foreach($notcounsellors as $notassign){			 
					array_push($newbucket, $notassign);
					}
					}
					}
				 
			 }
			
			
		 
			 
			$bucketCount = count($newbucket);
			if(!empty($bucketCount)){
			foreach($newbucket as $key=>$val){			    
			$user= 	Courseassignment::where('counsellors',$val)->first();			
			if($user->leadassign+1<=$user->leadcount){
			    
			 
			 
		 	$lead =  new LeadInquiry;			
			$lead->name = $inquiry->name;
			$lead->email = $inquiry->email;		
			$lead->code = $inquiry->code;			
			$lead->mobile =$inquiry->mobile;			
			$lead->type =1;			
			$lead->source = $inquiry->source_id;
			$lead->source_name = $inquiry->source;
			$lead->course = $inquiry->course_id;
			$lead->course_name = $inquiry->course;
			$lead->status = 1;
			$lead->status_name = "New Lead";			 
			$lead->created_by = $val;
			$lead->croma_id = $inquiry->id; 
			 
			$inquiry= Inquiry::findOrFail($inquiry->id);
			$inquiry->assigned_to=	$val;
			$inquiry->save(); 
			if($lead->save()){
			$followUp = new LeadInquiryfollow;
			$followUp->status = LeadStatus::where('name','LIKE','New Lead')->first()->id;							
			$followUp->followby = $lead->created_by;
			if(!empty($inquiry->comment)){
			$followUp->remark = $inquiry->comment; 
			}else{
			    $followUp->remark="";
			}
			$followUp->expected_date_time = date('Y-m-d H:i:s');
			$followUp->lead_id = $lead->id;				 
			$followUp->save(); 
			$usercunsl= Courseassignment::where('counsellors',$val)->first();	
			$usercunsl->leadassign = $usercunsl->leadassign+1;
			$usercunsl->save();
			}			
						
			 
			}else{
				
				bucketLeadCounsellor($val,$lead_course_id,$type_lead,$inquiry);
			}
            }
			
			}else{
			      
		     $inquiry= Inquiry::findOrFail($inquiry->id);
             $inquiry->reason="Counsellor-NF";
             $inquiry->save();
			}
			 
		 
			 }else{
				 
				 //inernational
				 				
			$catCourse = CatCourse::findOrFail($lead_course_id);	
			$bucketIndex = $catCourse->bucket;
			$max = $mCount = 15;
			$i=0;
			$assignbuckets = [];	
			$newconsellor = [];		
			$newbucket = [];		
			foreach($absentassigncourse as $counsellor){
			if($mCount == 0){					
				$j = $i;
				$assignbuckets[++$j] = $assignbuckets[$i++];
				$assignbuckets[$j]['assign_int_course'] = [];
				$mCount = $max-(count($assignbuckets[$j],1)-1);
			}
			if(in_array($lead_course_id,unserialize($counsellor->assign_int_course))){
			$assignbuckets[$i]['assign_int_course'][] = $counsellor->counsellors;
			}   

			--$mCount;
			 

			}
			
			
			foreach($assignbuckets as $bucket){
			foreach($bucket as $position=>$counsellors){
			foreach($counsellors as $assign){			 
			array_push($newconsellor, $assign);
			}
			}
			}
			$maxn = $mCountn = 15;
			$in=0;
			$bucketCount = count($newconsellor);
			foreach($newconsellor as $key=>$val){
			$absentcounsellors= AbsentCourseassignment::where('counsellors',$val)->get();
			foreach($absentcounsellors as $absentcounsellor){
			 if($mCountn == 0){	
			$jn = $in;
			$absentbuckets[++$jn] = $absentbuckets[$in++];
			$absentbuckets[$jn]['absent_assign_int_course'] = [];
			$mCountn = $maxn-(count($absentbuckets[$jn],1)-1);
			 }
			if(in_array($lead_course_id,unserialize($absentcounsellor->absent_assign_int_course))){
			$absentbuckets[$in]['absent_assign_int_course'][] = $absentcounsellor->tocounsellor;
			}   
		
			--$mCountn;
			}

			}

			 
			
			 if(count($absentbuckets)>0){
				foreach($absentbuckets as $bucket){
				foreach($bucket as $position=>$counsellors){
				foreach($counsellors as $assign){			 
				array_push($newbucket, $assign);
				}
				}
				}
			 }else{			 
					$maxnot = $mCountnot = 15;
					$inot=0;
					$notabsentassigncourse= 	Courseassignment::where('status',0)->get();						  
					foreach($notabsentassigncourse as $notcounsellor){					 				 
					if($mCountnot == 0){	
					$jnot = $inot;
					$notabsentbuckets[++$jnot] = $notabsentbuckets[$inot++];
					$notabsentbuckets[$jnot]['assign_int_course'] = [];
					$mCountnot = $maxnot-(count($notabsentbuckets[$jnot],1)-1);
					}
					if(in_array($lead_course_id,unserialize($notcounsellor->assign_int_course))){
					$notabsentbuckets[$inot]['assign_int_course'][] = $notcounsellor->counsellors;
					}  
				
					--$mCountnot;	 

					}
					foreach($notabsentbuckets as $notbucket){
					foreach($notbucket as $position=>$notcounsellors){
					foreach($notcounsellors as $notassign){			 
					array_push($newbucket, $notassign);
					}
					}
					}
				 
			 }
			
			 
			$bucketCount = count($newbucket);
			if(!empty($bucketCount)){
			foreach($newbucket as $key=>$val){			    
			    $user= 	Courseassignment::where('counsellors',$val)->first();			
			if($user->leadassign+1<=$user->leadcount){
			    
			if($bucketCount<=$bucketIndex || $bucketIndex==0){
			$bucketIndex = 0;
			}
			 
			 
		 	$lead =  new LeadInquiry;			
			$lead->name = $inquiry->name;
			$lead->email = $inquiry->email;		
			$lead->code = $inquiry->code;			
			$lead->mobile =$inquiry->mobile;			
			$lead->type =1;			
			$lead->source = $inquiry->source_id;
			$lead->source_name = $inquiry->source;
			$lead->course = $inquiry->course_id;
			$lead->course_name = $inquiry->course;
			$lead->status = 1;
			$lead->status_name = "New Lead";			 
			$lead->created_by = $val;
			$lead->croma_id = $inquiry->id;
			 
			 
			$inquiry= Inquiry::findOrFail($inquiry->id);
			$inquiry->assigned_to=	$val;
			$inquiry->save(); 
			if($lead->save()){
			$followUp = new LeadInquiryfollow;
			$followUp->status = LeadStatus::where('name','LIKE','New Lead')->first()->id;							
			$followUp->followby = $lead->created_by;
			if(!empty($inquiry->comment)){
			$followUp->remark = $inquiry->comment; 
			}else{
			    $followUp->remark="";
			}
			$followUp->expected_date_time = date('Y-m-d H:i:s');
			$followUp->lead_id = $lead->id;				 
			$followUp->save(); 
			$usercunsl= Courseassignment::where('counsellors',$val)->first();	
			$usercunsl->leadassign = $usercunsl->leadassign+1;
			$usercunsl->save();
			}			
			 
			 
					
			 
			}else{
				
				bucketLeadCounsellor($val,$lead_course_id,$type_lead,$inquiry);
			}
            }

			 }else{
					$inquiry= Inquiry::findOrFail($inquiry->id);
					$inquiry->reason="Counsellor-NF";
					$inquiry->save(); 
			 }
   	


		
			 } 
		 }
		 
	
}



function leadassignCounsellor($lead_course_id,$type_lead,$inquiry){
	
	 if(is_numeric($lead_course_id) && !empty($lead_course_id)){
				
      
				
			$assigncourse = Courseassignment::where('status',1)->get();	
		 if($assigncourse->count()>0){
			if($type_lead=='Domestic'){				
			$catCourse = CatCourse::findOrFail($lead_course_id);	
			$bucketIndex = $catCourse->bucket;

			$max = $mCount = 15;
			$i=0;
			$totalClients = count($assigncourse);
			$buckets = [];
			$newbucket = [];
			$newbucketmerger = [];
			foreach($assigncourse as $counsellor){
			
			if($mCount == 0){
			$j = $i;
			$buckets[++$j] = $buckets[$i++];
			$buckets[$j]['assign_dom_course'] = [];
			$mCount = $max-(count($buckets[$j],1)-1);
			}
			if(in_array($lead_course_id,unserialize($counsellor->assign_dup_dom_course))){
			$buckets[$i]['assign_dup_dom_course'][] = $counsellor->counsellors;
			}  
			if(in_array($lead_course_id,unserialize($counsellor->assign_dom_course))){
			$buckets[$i]['assign_dom_course'][] = $counsellor->counsellors;
			}
			--$mCount;
		 
			
			}
			$j=0;
			
			 
			foreach($buckets as $bucket){
				foreach($bucket as $position=>$counsellors){
						foreach($counsellors as $assign){			 
						array_push($newbucket, $assign);
						}
				}
			}
			
			$i = 0;
			$bucketCount = count($newbucket);
			if(!empty($bucketCount)){
			foreach($newbucket as $key=>$val){
			    
			    $user= 	Courseassignment::where('counsellors',$val)->where('status',1)->first();			
			if($user->leadassign+1<=$user->leadcount){
			    
			if($bucketCount<=$bucketIndex || $bucketIndex==0){
			$bucketIndex = 0;
			}
			if($bucketIndex==$i){
			
			$mobile= ltrim($inquiry->mobile, '0');	
	    	$mobile= trim($mobile);	
			$newmobile=  preg_replace('/\s+/', '', $mobile);
			 $leadcheck = LeadInquiry::where('mobile',$inquiry->mobile)->where('course',$inquiry->course_id)->orderBy('id','desc')->get();	
			 if(!empty($leadcheck) && count($leadcheck)>0){				 
				 foreach($leadcheck as $checkv){					  
					  if($checkv->status !=4 && $checkv->deleted_at ==''){				  
					  $var =1;	 			  
					  }else{
						  $var =0;
					  }
					  if($var==1){				  
						  $check=1;											  
						     break;
					  }else{						  
						   $check=0;	
						   
					  }
					  
				 }
				 
			
			 }else{
			     
			      $check=0;	
			 }
			
			
		 
		     
		 	$lead =  new LeadInquiry;			
			$lead->name = $inquiry->name;
			$lead->email = $inquiry->email;		
			$lead->code = $inquiry->code;			
			$lead->mobile =$inquiry->mobile;			
			$lead->type =1;			
			$lead->source = $inquiry->source_id;
			$lead->source_name = $inquiry->source;
			$lead->course = $inquiry->course_id;
			$lead->course_name = $inquiry->course;
			$lead->status = 1;
			$lead->status_name = "New Lead";			 
			$lead->created_by = $val;
			$lead->croma_id = $inquiry->id;
			$lead->status=1;	
			 
			$inquiry= Inquiry::findOrFail($inquiry->id);
			$inquiry->assigned_to=	$val;
			$inquiry->save(); 
			if($lead->save()){
			$followUp = new LeadInquiryfollow;
			$followUp->status = LeadStatus::where('name','LIKE','New Lead')->first()->id;							
			$followUp->followby = $lead->created_by;
			if(!empty($inquiry->comment)){
			$followUp->remark = $inquiry->comment; 
			}else{
			    $followUp->remark="";
			}
			$followUp->expected_date_time = date('Y-m-d H:i:s');
			$followUp->lead_id = $lead->id;				 
			$followUp->save(); 
			$usercunsl= Courseassignment::where('counsellors',$val)->first();	
			$usercunsl->leadassign = $usercunsl->leadassign+1;
			$usercunsl->save();
			}			
			$kw = CatCourse::find($lead_course_id);
			$kw->bucket = $i+1;
			$kw->save();
			 

			}
			
			
			$i++;
			}else{
		   bucketLeadCounsellor($val,$lead_course_id,$type_lead,$inquiry);
		   
		    $inquiry= Inquiry::findOrFail($inquiry->id);
			$inquiry->reason="Bucket Full";
			$inquiry->save();
			    
			}
            }
            }else{
              absentleadassignCounsellor($lead_course_id,$type_lead,$inquiry);
            $inquiry= Inquiry::findOrFail($inquiry->id);
            $inquiry->reason="Counsellor-NF";
            $inquiry->save(); 
            
            }
		 
			 }else{
				 
				 
			$catCourse = CatCourse::findOrFail($lead_course_id);	
			$bucketIndex = $catCourse->bucketinter;				

			$max = $mCount = 15;
			$i=0;
			$totalClients = count($assigncourse);
			$buckets = [];
			$newbucket = [];
			$newbucketmerger = [];
			foreach($assigncourse as $counsellor){
		 	
			if($mCount == 0){
			$j = $i;
			$buckets[++$j] = $buckets[$i++];
			//$buckets[$j]['assign_dom_course'] = [];
			$mCount = $max-(count($buckets[$j],1)-1);
			}
			if(in_array($lead_course_id,unserialize($counsellor->assign_int_course))){
			$buckets[$i]['assign_int_course'][] = $counsellor->counsellors;
			}  
			if(in_array($lead_course_id,unserialize($counsellor->assign_dup_int_course))){
			$buckets[$i]['assign_dup_int_course'][] = $counsellor->counsellors;
			}

			--$mCount;
			 
			}
			$j=0;
			foreach($buckets as $bucket){
				foreach($bucket as $position=>$counsellors){
						foreach($counsellors as $assign){			 
						array_push($newbucket, $assign);
						}
				}
			}
			
			$i = 0;
			$bucketCount = count($newbucket);
			if($bucketCount){
			foreach($newbucket as $key=>$val){
			$user= 	Courseassignment::where('counsellors',$val)->where('status',1)->first();			
			if($user->leadassign+1<=$user->leadcount){
			    
			if($bucketCount<=$bucketIndex || $bucketIndex==0){
			$bucketIndex = 0;
			}
			if($bucketIndex==$i){
			$mobile= ltrim($inquiry->mobile, '0');	
	    	$mobile= trim($mobile);	
			$newmobile=  preg_replace('/\s+/', '', $mobile);
			 $leadcheck = LeadInquiry::where('mobile',$inquiry->mobile)->where('course',$inquiry->course_id)->orderBy('id','desc')->get();	
			 if(!empty($leadcheck) && count($leadcheck)>0){				 
				 foreach($leadcheck as $checkv){					  
					  if($checkv->status !=4 && $checkv->deleted_at ==''){				  
					  $var =1;	 			  
					  }else{
						  $var =0;
					  }
					  if($var==1){				  
						  $check=1;											  
						     break;
					  }else{						  
						   $check=0;	
						   
					  }
				 }
				  
			 }else{
			     
			      $check=0;	
			 }
			
			
		  
 
		 	$lead =  new LeadInquiry;			
			$lead->name = $inquiry->name;
			$lead->email = $inquiry->email;		
			$lead->code = $inquiry->code;			
			$lead->mobile =$inquiry->mobile;			
			$lead->type =1;			
			$lead->source = $inquiry->source_id;
			$lead->source_name = $inquiry->source;
			$lead->course = $inquiry->course_id;
			$lead->course_name = $inquiry->course;
			$lead->status = 1;
			$lead->status_name = "New Lead";			 
			$lead->created_by = $val;
			$lead->croma_id = $inquiry->id;
			$lead->status=1;	
			$inquiry= Inquiry::findOrFail($inquiry->id);
			$inquiry->assigned_to=	$val;	
			$inquiry->save();
			
			$usercunsl= Courseassignment::where('counsellors',$val)->first();	
			$usercunsl->leadassign = $usercunsl->leadassign+1;
			$usercunsl->save();
			if($lead->save()){
			$followUp = new LeadInquiryfollow;
			$followUp->status = LeadStatus::where('name','LIKE','New Lead')->first()->id;							
			$followUp->followby = $lead->created_by;
			if(!empty($inquiry->comment)){
			$followUp->remark = $inquiry->comment; 
			}else{
			    $followUp->remark="";
			}
			$followUp->expected_date_time = date('Y-m-d H:i:s');
			$followUp->lead_id = $lead->id;				 
			$followUp->save(); 

			}  
			 
			
			$kw = CatCourse::find($lead_course_id);
			$kw->bucketinter = $i+1;
			$kw->save();
			 
			}
			$i++;
			}else{
			    
			    bucketLeadCounsellor($val,$lead_course_id,$type_lead,$inquiry);
			    $inquiry= Inquiry::findOrFail($inquiry->id);
		    	$inquiry->reason="Bucket Full";
		    	$inquiry->save(); 
			    
			    
			}
			
			
        }

			 }else{
			      absentleadassignCounsellor($lead_course_id,$type_lead,$inquiry);
                    $inquiry= Inquiry::findOrFail($inquiry->id);
                    $inquiry->reason="Counsellor-NF";
                    $inquiry->save();  
			 }
				 
				 
			 }
			 
			 
		 }
		 
		   
		 
		 
			 }
	
	
}



function countryCode($code=NULL){
	 $country= App\Country::whereIn('sortname',[$code,'IN','US'])->get();
	 return $country;
}



function currentGeodata(){
    //0a6f45f1c0b609 new 1-10
	//a557e96bd50bb0 old 10-20
	//39d08f73a2c31b chancy 20-30

  $geodata = json_decode(file_get_contents('http://ipinfo.io/'.$_SERVER['REMOTE_ADDR'].'?token=a557e96bd50bb0'));
  return $geodata;
	 //$country= App\Country::whereIn('sortname',[$geodata->country,'IN','US'])->get();
	//return $country;
}

function autoselectcountry(){
	// $geodata = json_decode(file_get_contents("http://ipinfo.io/".$_SERVER['REMOTE_ADDR']));
	 	$geodata = json_decode(file_get_contents('http://ip-api.io/json/'.$_SERVER['REMOTE_ADDR']));
	 return $geodata->sortname;
}


 // SLUG GENERATOR FOR CLIENTS
// **************************
function generate_slug($slug=null){
	if(is_null($slug)){
		return null;
	}
	$slug = explode(" ",$slug);
	$slug = array_map('trim',$slug);
	//$slug = array_map('remove_splchars',$slug);
	$slug = array_map('strtolower',$slug);
	$slug = implode("-",$slug);
	return $slug;
}
 
// FOLDER STRUCTURE GENERATOR
// **************************
function getImageFolderStructure(){
	
	 
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/images/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}
 
 
 
 
// FOLDER STRUCTURE GENERATOR
// **************************
function getResumeFolderStructure(){	 
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/Resume/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}
 
 
 
// FOLDER STRUCTURE GENERATOR
// **************************
function getclientFolderStructure(){
	
	 
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/client/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}
 
 
// FOLDER STRUCTURE GENERATOR
// **************************
function getToolCoveredFolderStructure(){	 
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/Covered/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}

// FOLDER STRUCTURE GENERATOR
// **************************
function getSocialFolderStructure(){	 
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/Social/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}
 
 
// FOLDER STRUCTURE GENERATOR CONTENT FOLDER
// **************************
function getContentFolderStructure(){	 
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/Content/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}
 
 
 
// FOLDER STRUCTURE GENERATOR
// **************************
function getCategoryFolderStructure(){	 
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/Category/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}
 
// FOLDER STRUCTURE GENERATOR
// **************************
function getCourseFolderStructure(){
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/Course/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}

// FOLDER STRUCTURE GENERATOR
// **************************
function getPaymodeFolderStructure(){	 
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/paymode/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}
 

// FOLDER STRUCTURE GENERATOR
// **************************
function getCourseMasterFolderStructure(){
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/CourseMaster/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}
 
// FOLDER STRUCTURE GENERATOR
// **************************
function getBlogFolderStructure(){
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/Blog/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}
// FOLDER STRUCTURE GENERATOR
// **************************
function getCertificateFolderStructure(){
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/Certificate/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}


 // FOLDER STRUCTURE GENERATOR
// **************************
function getReviewsFolderStructure(){
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/Reviews/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}

 // FOLDER STRUCTURE GENERATOR
// **************************
function getTestimonialFolderStructure(){
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/Testimonial/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}
 
 // FOLDER STRUCTURE GENERATOR
// **************************
function getPlacementFolderStructure(){
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/Placement/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}
 
// FOLDER STRUCTURE GENERATOR
// **************************
function getVideoFolderStructure(){
	try{
		$partial_str = '';
		$day = date('j');
		$week = '';
		if($day<11){
			$week = 'week_1';
		}
		else if($day>=11&&$day<21){
			$week = 'week_2';
		}
		else if($day>=21){
			$week = 'week_3';
		}
		$partial_str = 'uploads/video/'.date('Y').'/'.date('m').'/'.$week;
		$structure = public_path($partial_str);
		if(file_exists($structure)){
			return $partial_str;
		}else{
			if(mkdir($structure, 0755, true)){
				return $partial_str;
			}else{
				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
			}
		}
	}catch(Exception $e){
		return $e->getMessage();
	}
}
 
 

 