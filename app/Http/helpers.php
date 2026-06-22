<?php
/**
 * CONTAINS HELPER FUNCTIONS
 */
   
// SLUG GENERATOR FOR CLIENTS
// **************************
function generate_slug($slug=null){
	if(is_null($slug)){
		return null;
	}
	$slug = explode(" ",$slug);
	$slug = array_map('trim',$slug);
	$slug = array_map('remove_splchars',$slug);
	$slug = array_map('strtolower',$slug);
	$slug = implode("-",$slug);
	return $slug;
}

// INVERSE SLUG GENERATOR FOR CLIENTS
// **********************************
function inverse_generate_slug($slug=null){
	if(is_null($slug)){
		return null;
	}
	$slug = preg_replace('/--/','-&-',$slug);
	$slug = preg_replace('/-/',' ',$slug);
	return $slug;
}


function get_time($time) {
 /*  $deffTime =  time()-$time;
    $duration = $deffTime / 1000;
    $hours = floor($duration / 3600);
    $minutes = floor(($duration / 60) % 60);
    $seconds = $duration % 60;
    echo $hours;
    if ($hours != 0)
        echo "$hours:$minutes:$seconds";
    else
        echo "$minutes:$seconds";
        */
        $start_date = date('Y-m-d H:i:s');
     
        $diff = abs(strtotime($start_date) - $time);
        
        $totalyear = floor($diff / (365*60*60*24));
        $totalmonths = floor(($diff - $totalyear * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $totalyear * 365*60*60*24 - $totalmonths*30*60*60*24)/ (60*60*24));
        
       /// echo $totalyear.' Years '.$totalmonths.' Month '.$days.' Days';
        
        
        
    $create_time = $time;
    $current_time = time();
    $dtCurrent = DateTime::createFromFormat('U', $current_time);
    $dtCreate = DateTime::createFromFormat('U', $create_time);
    $diff = $dtCurrent->diff($dtCreate);
   // $interval = $diff->format("%y years %m months %d days %h hours %i minutes %s seconds");
    
    if($days <1 && $totalmonths==0){
         $interval = $diff->format("%h hrs %i minutes");
        $interval = preg_replace('/(^0| 0) (hrs|minutes)/', '', $interval);
        
    }else if($days>0 && $totalmonths==0){
        $interval = $diff->format("%d days %h hrs");
        $interval = preg_replace('/(^0| 0) (days|hrs)/', '', $interval);
    }else if($totalmonths>0 && $days>1 && $totalyear =='0' ){
        
         $interval = $diff->format("%m months %d days");
         $interval = preg_replace('/(^0| 0) (months|days)/', '', $interval);
         
       }else if($totalmonths >=12 && $totalyear>0){
         $interval = $diff->format("%y years %m months");
         $interval = preg_replace('/(^0| 0) (years|months)/', '', $interval);
       }else{
           echo "m";
          $interval = $diff->format("%h hours %i minutes");
        $interval = preg_replace('/(^0| 0) (hours|minutes)/', '', $interval);
    }
   // $interval = preg_replace('/(^0| 0) (years|months|days|hours|minutes|seconds)/', '', $interval);
    
    echo $interval;
        
        
        
}
// SPECIAL CHARACTERS REMOVER
// **************************
function remove_splchars($str){
	return preg_replace("/[^a-zA-Z0-9-.]/", "", $str);
}

// FOLDER STRUCTURE GENERATOR
// **************************
function getFolderStructure(){
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

// SUBSTRING GETTER
// ****************
function getAddress($arr,$len){
	$response = [];
	$response['fullstr'] = $response['substr'] = '';
	$response['isfullstr'] = $response['issubstr'] = 0;
	$response['ispositiveresponse'] = 0;
	$str = '';
	if(count($arr)>0){
		$str = implode(", ",$arr);
		$response['ispositiveresponse'] = 1;
		if(strlen($str)>$len){
			$response['fullstr'] = $str;
			$response['isfullstr'] = 1;
			$response['substr'] = substr($str,0,($len-1))."...";
			$response['issubstr'] = 1;
		}else{
			$response['fullstr'] = $str;
			$response['isfullstr'] = 1;
		}
	}
	// returning response object not an array
	return json_decode(json_encode($response), FALSE);
}

// STAR CODED STRING GETTER
// ************************
function getStarCodedStr($str,$type=NULL){
	if(empty($str))
		return NULL;
	if($type=='number'){
		$strArr = str_split($str,1);
		$strLen = count($strArr);
		$strToReturn = [];
		for($i=0;$i<$strLen;++$i){
			if($i<2){
				$strToReturn[] = $strArr[$i];
			}
			else if($i>=2 && $i<=($strLen-3)){
				$strToReturn[] = '*';
			}
			else if($i>($strLen-3)){
				$strToReturn[] = $strArr[$i];
			}
		}
		$strToReturn = implode($strToReturn);
	}
	else if($type=='email'){
		$strExpl = explode('@',$str);
		$strArr = str_split($strExpl[0],1);
		$strLen = count($strArr);
		$strToReturn = [];
		for($i=0;$i<$strLen;++$i){
			if($i<1){
				$strToReturn[] = $strArr[$i];
			}
			else if($i>=1 && $i<=($strLen-2)){
				$strToReturn[] = '*';
			}
			else if($i>($strLen-2)){
				$strToReturn[] = $strArr[$i];
			}
		}
		$strToReturn = implode($strToReturn);
		if(preg_match("/@/", $str)){
			$strToReturn .= "@".$strExpl[1];	
		}
	}
	return $strToReturn;
}

// RETURN STATE/UNION TERROTERIES LIST
// ***********************************
function getStates(){
	return ['-- Select State --','Andhra Pradesh','Arunachal Pradesh','Assam','Andaman and Nicobar Islands','Bihar','Chandigarh','Chhattisgarh','Dadra and Nagar Haveli','Daman and Diu','Delhi','Goa','Gujarat','Haryana','Himachal Pradesh','Jammu & Kashmir','Jharkhand','Karnataka','Kerala','Lakshadweep','Madhya Pradesh','Maharashtra','Manipur','Meghalaya','Mizoram','Nagaland','Orissa','Pondicherry','Punjab','Rajasthan','Sikkim','Tamil Nadu','Telangana','Tripura','Uttar Pradesh','Uttarakhand','West Bengal'];
}

// RETURN CLIENTS TYPE
// *******************
/* function getClientsType(){
	return [
		'general'=>'General',
		'lead_based'=>'Lead Based',
		'yearly_subscription'=>'Yearly Subscription',
		'free_subscription'=>'Free Subscription (2 Month)',
		'count_based_subscription'=>'Count Based Subscription'
	];
} */


function getClientsType(){
	return [
		''=>'Select Package Name',
		'Gold'=>'Gold',
		'Diamond'=>'Diamond',
		'Platinum'=>'Platinum'
		 
	];
}

function getClientsList(){	 
	$getClientsList = App\model\client\Client::where('paid_status',1)->select('id','business_name')->orderby('business_name', 'asc')->get();
	return  $getClientsList;
}



function getUserList(){	 
	$getUserList = App\User::select('id','first_name','last_name')->orderby('first_name','asc')->get();
	return  $getUserList;
}

function getClientsConversionList(){	 
	$getClientsConversionList = App\model\client\Client::where('conversion_status',1)->select('id','business_name')->orderby('business_name', 'asc')->get();
	return  $getClientsConversionList;
}


 

function leadFilterstatus(){	 
	$leadFilterstatus = App\Status::where('lead_filter',1)->orderby('name', 'asc')->get();
	return  $leadFilterstatus;
}

function leadFollowStatus(){	 
	$leadFollowStatus = App\Status::where('lead_follow_up',1)->orderby('name', 'asc')->get();
	return  $leadFollowStatus;
}

function clientFollowStatus(){	 
	$clientFollowStatus = App\Status::where('client_follow_up',1)->orderby('name', 'asc')->get();
	return  $clientFollowStatus;
}

// RETURN PROPER WEBSITE URL
// *************************
function buildWebsiteURL($link=null){
	if(null==$link)
		return null;
	
    if (!preg_match("~^(?:f|ht)tps?://~i", $link)) {
        $link = "http://".$link;
    }
	return $link;
}

/**
 * Limit the number of characters in a string.
 *
 * @param  string  $value
 * @param  int     $limit
 * @param  string  $end
 * @return string
 */
function str_limit_custom($value, $limit = 100, $end = '...', $more = 'More', $target = 'myModal')
{
	if (mb_strlen($value) <= $limit) return $value;
	return rtrim(mb_substr($value, 0, $limit, 'UTF-8')).$end." <a href='#' data-toggle='modal' data-target='#".$target."'>".$more."</a>";
}






 function leadassignWithoutZoneCounsellor($leads)
    {	
	 
	 
		if($leads){
			
			 // echo "<pre>";print_r($_POST);echo"end";die;
			 
				
				$lead = App\Lead::findOrFail($leads->id);	
				
				if($lead){
			 
				$city = App\Citieslists::findOrFail($lead->city_id);
			
			 
				if($city){
			
				 
				 	$keyword = App\Keyword::findOrFail($lead->kw_id);	
		 
				if($keyword){
				  
				$bucketIndex = $keyword->bucket;		
				$clientsList = DB::table('clients');
				//$clientsList = $clientsList->join('assigned_zones','clients.id','=','assigned_zones.client_id');
				//$clientsList = $clientsList->join('assignedd_areas','assignedd_areas.assigned_zone_id','=','assigned_zones.id');
						
                $clientsList = $clientsList->join('assigned_kwds','clients.id','=','assigned_kwds.client_id');
                $clientsList = $clientsList->join('keyword','assigned_kwds.kw_id','=','keyword.id');
                $clientsList = $clientsList->join('keyword_sell_count','keyword_sell_count.slug','=','assigned_kwds.sold_on_position');
                $clientsList = $clientsList->select('clients.*','assigned_kwds.*','assigned_kwds.city_id as assgn_city_id','keyword.keyword','keyword.category','keyword.bucket');
                $clientsList = $clientsList->where('keyword.id','=',$lead->kw_id);
                $clientsList = $clientsList->where('assigned_kwds.city_id','=',$lead->city_id);
                
                //$clientsList = $clientsList->where('assigned_zones.zone_id','=',$request->input('area_zone'))
                //	$clientsList = $clientsList->where('assigned_zones.zone_id','=',$lead->zone_id);
                //	$clientsList = $clientsList->where('assignedd_areas.area_id','=',$lead->area_id);
                
                $clientsList = $clientsList->whereNull('clients.deleted_at');
                $clientsList = $clientsList->where('clients.leads_remaining','>','0');
                //$clientsList = $clientsList->where('clients.balance_amt','>',50);
                //$clientsList = $clientsList->where('clients.expired_on','>',date("Y-m-d H:i:s"));
                /* 
                $clientsList = $clientsList->where(function($query){
                $query->where(function($query){
                $query->where('clients.leads_remaining','>','0')								
                ->orWhere('clients.balance_amt','>','50') 				
                ->orWhere('clients.expired_on','>',date("Y-m-d H:i:s"));					
                }); */
                
                /* ->orWhere(function($query){
                $query->where(function($query){
                $query->where('clients.client_type','free_subscription')
                ->orWhere('clients.client_type','yearly_subscription');
                })
                ->whereDate('clients.yrly_subs_end_date','>',date('Y-m-d'));
                })
                ->orWhere(function($query){
                $query->where('clients.client_type','count_based_subscription')
                ->where('clients.leads_remaining','>','0');
                }); */
					 
				$clientsList = $clientsList->where('active_status','1');
				$clientsList = $clientsList->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'platinum\' THEN 1 WHEN \'diamond\' THEN 2 END)'),'asc');
				//$clientsList = $clientsList->orderby(DB::raw('(CASE `clients`.`client_type` WHEN \'Platinum\' THEN 1 WHEN \'Diamond\' THEN 2 END)'),'asc');
						//->orderby('comment_count','desc')
						//->tosql();
				$clientsList = $clientsList->get();
					//echo "<pre>";print_r($clientsList);die;
					$defaulterClientsList = DB::table('clients');
					//	$defaulterClientsList = $defaulterClientsList->join('assigned_zones','clients.id','=','assigned_zones.client_id');
					//$defaulterClientsList = $defaulterClientsList->join('assignedd_areas','assignedd_areas.assigned_zone_id','=','assigned_zones.id');
						 
						$defaulterClientsList = $defaulterClientsList->join('assigned_kwds','clients.id','=','assigned_kwds.client_id');
						$defaulterClientsList = $defaulterClientsList->join('keyword','assigned_kwds.kw_id','=','keyword.id');
						$defaulterClientsList = $defaulterClientsList->join('keyword_sell_count','keyword_sell_count.slug','=','assigned_kwds.sold_on_position');
						$defaulterClientsList = $defaulterClientsList->select('clients.*','assigned_kwds.*','keyword.keyword','keyword.category','keyword.bucket');
						$defaulterClientsList = $defaulterClientsList->where('keyword.id','=',$lead->kw_id);
							
					//	$defaulterClientsList = $defaulterClientsList->where('assigned_zones.zone_id','=',$lead->zone_id);
								//$defaulterClientsList = $defaulterClientsList->where('assignedd_areas.area_id','=',$lead->area_id);
							
						$defaulterClientsList = $defaulterClientsList->whereNull('clients.deleted_at');
						$defaulterClientsList = $defaulterClientsList->where(function($query){
							$query->where(function($query){
								 
								//$query->whereIn('clients.client_type','lead_based')
								$query->where('clients.leads_remaining','>','0');
									 // ->where('clients.leads_remaining','>','0');
							});
							/* ->orWhere(function($query){
								$query->where(function($query){
									$query->where('clients.client_type','free_subscription')
									->orWhere('clients.client_type','yearly_subscription');
								})
								->whereDate('clients.yrly_subs_end_date','<=',date('Y-m-d'));
							})
							->orWhere(function($query){
								$query->where('clients.client_type','count_based_subscription')
									  ->where('clients.leads_remaining','=','0');
							}); */
							
							
						});
						$defaulterClientsList = $defaulterClientsList->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'platinum\' THEN 1 WHEN \'diamond\' THEN 2 END)'),'asc');
						//$defaulterClientsList = $defaulterClientsList->orderby(DB::raw('(CASE `clients`.`client_type` WHEN \'Platinum\' THEN 1 WHEN \'Diamond\' THEN 2 END)'),'asc');
						//->orderby('comment_count','desc')
						//->tosql();
						$defaulterClientsList = $defaulterClientsList->get();
						//echo "<pre>";print_r($defaulterClientsList);echo "de client";die;
					foreach($defaulterClientsList as $defaulterClient){
						//$this->intimateDefaulterClients($defaulterClient, $lead);
					}
						
					//return $clientsList;
					
					// BUCKET CALCULATION
					// ******************
					$max = $mCount = 5;
					$i=0;
					$totalClients = count($clientsList);
					$buckets = [];
					foreach($clientsList as $client){
						if($mCount == 0){
							$j = $i;
							$buckets[++$j] = $buckets[$i++];
							$buckets[$j]['diamond'] = [];
							$mCount = $max-(count($buckets[$j],1)-5);
						}
						if($client->sold_on_position=='platinum'){
							$buckets[$i]['platinum'][] = $client;
						}
						if($client->sold_on_position=='diamond'){
							$buckets[$i]['diamond'][] = $client;
						}				
						 
						 
						--$mCount;
					}
					$i = 0;
					$bucketCount = count($buckets);
					 
					 
					 if(!empty($clientsList)){
					foreach($buckets as $bucket){
						if($bucketCount<=$bucketIndex || $bucketIndex==0){
							$bucketIndex = 0;
						}
						 
						if($bucketIndex==$i){
							foreach($bucket as $position=>$clientss){
									//echo "<pre>";print_r($clientss);die;
								foreach($clientss as $clientC){								
								
									if($clientC->client_type){
										$clnt = App\model\client\Client::find($clientC->client_id);
									//	echo "<pre>";print_r($clnt);die;
										if($clnt){
											$dontSave = 0;
											switch($clientC->client_type){
												case 'Platinum':
												/*if($clientC->balance_amt-$clientC->cost_per_lead<0){
														$dontSave = 1;
													}else{
														$clnt->balance_amt = $clnt->balance_amt - $clientC->cost_per_lead;
													}*/
													
												if($clientC->leads_remaining-1<0){
														$dontSave = 1;
													}else{
														$clnt->leads_remaining = $clnt->leads_remaining - 1;
													}
													
												/* if($clnt->balance_amt<50){
													$clnt->expired_on = date("Y-m-d H:i:s");
												} */
												break;												
												case 'Diamond':
												/* if($clientC->balance_amt-$clientC->cost_per_lead<0){
														$dontSave = 1;
													}else{
														$clnt->balance_amt = $clnt->balance_amt - $clientC->cost_per_lead;
													} */
													
												if($clientC->leads_remaining-1<0){
														$dontSave = 1;
													}else{
														$clnt->leads_remaining = $clnt->leads_remaining - 1;
													}
													
												/* if($clnt->balance_amt<50){
													$clnt->expired_on = date("Y-m-d H:i:s");
												} */
												break;
												
											 
												 
											}
										 /* switch($client->category){
												case 'Category 1':
													if($client->balance_amt-$client->cat1_price<0){
														$dontSave = 1;
													}else{
														$clnt->balance_amt = $clnt->balance_amt - $client->cat1_price;
													}
												break;
												case 'Category 2':
													if($client->balance_amt-$client->cat2_price<0){
														$dontSave = 1;
													}else{
														$clnt->balance_amt = $clnt->balance_amt - $client->cat2_price;
													}
												break;
												case 'Category 3':
													if($client->balance_amt-$client->cat3_price<0){
														$dontSave = 1;
													}else{
														$clnt->balance_amt = $clnt->balance_amt - $client->cat3_price;
													}
												break;
												case 'Category X':
													if($client->sold_on_position=='premium'){
														$amtToDeduct = $client->premium_price;
													}
													if($client->sold_on_position=='platinum'){
														$amtToDeduct = $client->platinum_price;
													}
													if($client->sold_on_position=='king'){
														$amtToDeduct = $client->king_price;
													}
													if($client->sold_on_position=='royal'){
														$amtToDeduct = $client->royal_price;
													}
													if($client->sold_on_position=='preferred'){
														$amtToDeduct = $client->preferred_price;
													}
													if($client->balance_amt-$amtToDeduct<0){
														$dontSave = 1;
													}else{
														$clnt->balance_amt = $clnt->balance_amt - $amtToDeduct;
													}
												break;
											} */
											if($dontSave){
												//$this->intimateDefaulterClients($client, $lead);
												continue;
											}else{
												 
												$clnt->save();
											}
										}
									}
									/* else if($client->client_type == 'count_based_subscription'){
										$clnt = Client::find($client->id);
										if($clnt){
											//$dontSave = 0;
											if($clnt->leads_remaining==0){
												$this->intimateDefaulterClients($client, $lead);
												continue;
											}
											else{
												$clnt->leads_remaining = $clnt->leads_remaining-1;	
												if($clnt->leads_remaining==0){
													$clnt->expired_on = date("Y-m-d H:i:s");
												}
												$clnt->save();
											}
										}
									} */
									//echo "<pre>";print_r($clientC);print_r($lead);die;
									$assignvalidation = App\AssignedLead::where('client_id',$clientC->client_id)->where('kw_id',$lead->kw_id)->where('lead_id',$lead->id)->get()->count();
									if($assignvalidation==0){
										
									$assignedLead = new App\AssignedLead;
									$assignedLead->kw_id = $lead->kw_id;
									$assignedLead->client_id = $clientC->client_id;
									$assignedLead->lead_id = $lead->id;
									if($assignedLead->save()){
									$lead->push_by=Auth::user()->id;				
									$lead->assign_status=1;				
									$lead->save();	
										
									}
								}
								
								
								
							}
							
						}
						$kw = App\Keyword::find($lead->kw_id);
							$kw->bucket = $i+1;
							$kw->save();
					}
					$i++;
					
					
					
					}
					
					
				 
					
				} 
			 
		}
				}
		}
    }
	
	}

  