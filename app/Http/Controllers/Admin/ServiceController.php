<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use Auth;
use Hash;
use Validator;
use DB;
use Session;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Input;
use Image; 
use App\city;
use App\FAQs;
use App\Services;
use App\Categories;
use App\Helpers;
 
class ServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        // $this->middleware('auth');
	   
    }

     

/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	 
		$data['title'] ="All services";
        $data['header'] ="All services";
        return view('admin.services.index',['data'=>$data]);
    } 
	 
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function serviceAdd(Request $request)
    {	 
	 	$data['title'] ="Add services";
        $data['header'] ="Add services";
		$categories = Categories::get();
        return view('admin.services.index',['data'=>$data,'categories'=>$categories]);
    }
    
    
    	 
   /**
     * Show the application edit.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {	  
		$edit_data= Services::findOrFail(base64_decode($id)); 
		$data['title'] ="Edit services";
        $data['header'] ="Edit services";    
		$categories = Categories::get();
        return view('admin.services.index',['edit_data'=>$edit_data,'data'=>$data,'categories'=>$categories]);
    } 
    
    
	 /**
	 add save services Title with slug
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function serviceSave(Request $request)
    {	  
	 
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
					'name' => 'required|unique:services,name|min:3|max:25',				 
					'meta_title' => 'required',
					'meta_keyword' => 'required',
					'meta_description' => 'required',				 
					//'description' => 'required',
					'categories_id' => 'required',
					
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  	
				$services = New Services;
				$services->name = ucwords(trim($request->input('name')));
				$services->categories_id = $request->input('categories_id');
				
				$categoriesName = Categories::where('id',$request->input('categories_id'))->first()->name;
				 
				$services->slug =  strtolower(str_replace(".","",(str_replace(" ",'-',$categoriesName))));	
				$services->service_slug =  strtolower(str_replace(".","",(str_replace(" ",'-',$request->input('name')))));	
				$services->meta_title = $request->input('meta_title');	
			 
				$services->meta_keyword = $request->input('meta_keyword');	
				$services->meta_description = $request->input('meta_description');	
		 
				$services->description = $request->input('description');	
				
				$services->status = 0;	
				
			 
				
				if ($request->hasFile('image')) {
				$alt = $request->input('name');
				$icons = [];
				$filePath = $this->getservicesFolderStructure();
			//	$file = Input::file('services_image');
				$file =  $request->file('image');
				$iconsfilename =str_replace(' ', '_', $file->getClientOriginalName());			 
				$destinationPath = public_path($filePath);
				$nameArr = explode('.',$iconsfilename);
				$ext = array_pop($nameArr);
				$name = implode('_',$nameArr);
				if(file_exists($destinationPath.'/'.$iconsfilename)){
				$iconsfilename = $name."_".time().'.'.$ext;
				}
				$file->move($destinationPath,$iconsfilename);				 
				$icons['image'] = array(
				'name'=>$iconsfilename,
				'alt'=>$alt,						
				'src'=>$filePath."/".$iconsfilename
				);	
				$services->image = serialize($icons);	
				}
				
								
			 
			if($services->save()){
				$status=1;							 
				$msg="Services submitted successfully!";		
				
			}else{
				$status=0;							 
				$msg="Services could not be submitted, Please try again!";	
			}
			return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 

  
	
	 
 
	
 /**
	 add save services Title with slug
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function serviceEditSave(Request $request,$id)
    {	  
 
 
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
				
					'name' 	=> 'required|max:255|unique:services,name,'.$id.',id',	
				 	'meta_title' => 'required',
					'meta_keyword' => 'required',
					'meta_description' => 'required',		 
					'categories_id' => 'required',		 
			 
			]);
			
		 
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			 
				
				$services = services::findOrFail($id);
				$services->name = ucfirst(trim($request->input('name')));
				$services->categories_id = $request->input('categories_id');
				//echo $request->input('categories_id');die;
				$categoriesName = Categories::where('id',$request->input('categories_id'))->first()->name;				 
				$services->slug =  strtolower(str_replace(".","",(str_replace(" ",'-',$categoriesName))));		
				$services->service_slug =  strtolower(str_replace(".","",(str_replace(" ",'-',$request->input('name')))));	
				$services->meta_title = $request->input('meta_title');	
			 
				$services->meta_keyword = $request->input('meta_keyword');	
				$services->meta_description = $request->input('meta_description');	
			 
				$services->description = $request->input('description');	
				$services->heading_one = $request->input('heading_one');	
				$services->description_one = $request->input('description_one');	
				$services->heading_two = $request->input('heading_two');	
				$services->description_two = $request->input('description_two');	
				$services->heading_three = $request->input('heading_three');	
				$services->description_three = $request->input('description_three');	
				
				
				$services->heading_four = $request->input('heading_four');	
				$services->description_four = $request->input('description_four');	
				
				$services->rating = $request->input('rating');	
				$services->total_rating = $request->input('total_rating');	
				$services->faqq1 = $request->input('faqq1');
                $services->faqa1 = $request->input('faqa1');
                $services->faqq2 = $request->input('faqq2');
                $services->faqa2 = $request->input('faqa2');
                $services->faqq3 = $request->input('faqq3');
                $services->faqa3 = $request->input('faqa3');
                $services->faqq4 = $request->input('faqq4');
                $services->faqa4 = $request->input('faqa4');
                $services->faqq5 = $request->input('faqq5');
                $services->faqa5 = $request->input('faqa5');



				if ($request->hasFile('image')) {
				$icons = [];
				$filePath =  $this->getservicesFolderStructure();
			 
				$file =  $request->file('image');
				$iconsfilename =str_replace(' ', '_', $file->getClientOriginalName());			 
				$destinationPath = public_path($filePath);
				$nameArr = explode('.',$iconsfilename);
				$ext = array_pop($nameArr);
				$name = implode('_',$nameArr);
				if(file_exists($destinationPath.'/'.$iconsfilename)){
				$iconsfilename = $name."_".time().'.'.$ext;
				}
				$file->move($destinationPath,$iconsfilename);				 
				$icons['image'] = array(
				'name'=>$iconsfilename,
				'alt'=>$request->input('name'),						
				'src'=>$filePath."/".$iconsfilename
				);	
				$services->image = serialize($icons);		
				}else{
				$services->image = $services->image;	
				}	
				
				if ($request->hasFile('image_one')) {
				$icons = [];
				$filePath =  $this->getservicesFolderStructure();
			 
				$file =  $request->file('image_one');
				$iconsfilename =str_replace(' ', '_', $file->getClientOriginalName());			 
				$destinationPath = public_path($filePath);
				$nameArr = explode('.',$iconsfilename);
				$ext = array_pop($nameArr);
				$name = implode('_',$nameArr);
				if(file_exists($destinationPath.'/'.$iconsfilename)){
				$iconsfilename = $name."_".time().'.'.$ext;
				}
				$file->move($destinationPath,$iconsfilename);				 
				$icons['image_one'] = array(
				'name'=>$iconsfilename,
				'alt'=>$request->input('name'),						
				'src'=>$filePath."/".$iconsfilename
				);	
				$services->image_one = serialize($icons);		
				}else{
				$services->image_one = $services->image_one;	
				}	
				
				if ($request->hasFile('image_two')) {
				$icons = [];
				$filePath =  $this->getservicesFolderStructure();
			 
				$file =  $request->file('image_two');
				$iconsfilename =str_replace(' ', '_', $file->getClientOriginalName());			 
				$destinationPath = public_path($filePath);
				$nameArr = explode('.',$iconsfilename);
				$ext = array_pop($nameArr);
				$name = implode('_',$nameArr);
				if(file_exists($destinationPath.'/'.$iconsfilename)){
				$iconsfilename = $name."_".time().'.'.$ext;
				}
				$file->move($destinationPath,$iconsfilename);				 
				$icons['image_two'] = array(
				'name'=>$iconsfilename,
				'alt'=>$request->input('name'),						
				'src'=>$filePath."/".$iconsfilename
				);	
				$services->image_two = serialize($icons);		
				}else{
				$services->image_two = $services->image_two;	
				}	
				
				if ($request->hasFile('image_three')) {
				$icons = [];
				$filePath =  $this->getservicesFolderStructure();
			 
				$file =  $request->file('image_three');
				$iconsfilename =str_replace(' ', '_', $file->getClientOriginalName());			 
				$destinationPath = public_path($filePath);
				$nameArr = explode('.',$iconsfilename);
				$ext = array_pop($nameArr);
				$name = implode('_',$nameArr);
				if(file_exists($destinationPath.'/'.$iconsfilename)){
				$iconsfilename = $name."_".time().'.'.$ext;
				}
				$file->move($destinationPath,$iconsfilename);				 
				$icons['image_three'] = array(
				'name'=>$iconsfilename,
				'alt'=>$request->input('name'),						
				'src'=>$filePath."/".$iconsfilename
				);	
				$services->image_three = serialize($icons);		
				}else{
				$services->image_three = $services->image_three;	
				}	
				
				
				
					if ($request->hasFile('image_four')) {
				$icons = [];
				$filePath =  $this->getservicesFolderStructure();
			 
				$file =  $request->file('image_four');
				$fourfilename =str_replace(' ', '_', $file->getClientOriginalName());			 
				$destinationPath = public_path($filePath);
				$nameArr = explode('.',$fourfilename);
				$ext = array_pop($nameArr);
				$name = implode('_',$nameArr);
				if(file_exists($destinationPath.'/'.$fourfilename)){
				$fourfilename = $name."_".time().'.'.$ext;
				}
				$file->move($destinationPath,$fourfilename);				 
				$four['image_four'] = array(
				'name'=>$fourfilename,
				'alt'=>$request->input('name'),						
				'src'=>$filePath."/".$fourfilename
				);	
				$services->image_four = serialize($four);		
				}else{
				$services->image_four = $services->image_four;	
				}	
				
			if($services->save()){
				$status=1;							 
				$msg="Services updated successfully!";		
				
			}else{
				$status=0;							 
				$msg="Services could not be updated, Please try again!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 

	// GET  services pagination
	public function getServicePagination(Request $request)
	{  
		   
		if($request->ajax()){			 
		$services = 	services::orderBy('id','desc');		 
		if($request->input('search.value')!==''){
				$services = $services->where(function($query) use($request){
					$query->orWhere('name','LIKE','%'.$request->input('search.value').'%');					     		   
						   
				});
			}
			$services = $services->paginate($request->input('length'));
			
			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $services->total();
			$returnLeads['recordsFiltered'] = $services->total();
			$returnLeads['recordCollection'] = [];
 
			foreach($services as $services){				 
				$action="";
				$seperate="";	
				$status="";		
				$action .='<a href="/admin/servicesEdit/edit/'.base64_encode($services->id).'" title="servicess Edit" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>';
			 
				$action .='<a href="javascript:serviceController.delete('.$services->id.')" title="Delete $servicess" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';	
				
				  	
				if($services->status=='1'){
					$status .='<a href="javascript:serviceController.status('.$services->id.',0)" title="Servicess status" class="btn btn-success" >Active</a>';	
					}else{
					$status .='<a href="javascript:serviceController.status('.$services->id.',1)" title="Servicess status" class="btn btn-danger" >Inactive</a>';	
					}
					$categoryName = "";
					if($services->categories_id){
						$categoryName = Categories::where('id',$services->categories_id)->first();
						if($categoryName){
							$categoryName = $categoryName->name;
						} 
					}
					$data[] = [		 		 		 
						$services->name,	
						$categoryName,							 
						$status,		
						$action,					  
						 
					];
					$returnLeads['recordCollection'][] = $services->id;				 
			}			
			$returnLeads['data'] = $data;
			return response()->json($returnLeads);			
			
		}  
		
	}
	
  
	 /**
     * Remove the specified resource from storage del_icon.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
		 
		$services = Services::findOrFail($id);	
		if($services->delete()){
		$status=1;							 
		$msg="Services Deleted Successfully!";	
		}else{
		$status=0;							 
		$msg="Services could not be Deleted!";	
		}
		return response()->json(['status'=>$status,'msg'=>$msg],200); 
    }
  
    
    
    
    /**
     * Remove the specified resource from storage status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(request $request, $id,$val)
    {
       	 if($request->ajax()){	
		 
		$services = Services::findOrFail($id);	 
		$services->status=$val;
 
		if($services->save()){
			$status=1;							 
			$msg="Services status updated successfully !";					
			}else{
			$status=0;							 
			$msg="Services status could not be successfully, Please try again !";	
			}		
			return response()->json(['status'=>$status,'msg'=>$msg],200); 
		 }
    }
  
			
 
// FOLDER STRUCTURE GENERATOR
// **************************

    function getservicesFolderStructure(){
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
    		$partial_str = 'uploads/services/'.date('Y').'/'.date('m').'/'.$week;
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

 
 
 
	 /**
     * Remove the specified resource from storage del_icon.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteImage($id)
    {
       	 
		$delet_data = Services::findOrFail($id); 
		
	 
		if($delet_data->image!='')
		{		
			 
			$image = unserialize($delet_data->image);
			$large = $image['image']['src'];
			if(!empty($image['image']['src'])){
			$thumbnail = $image['image']['src'];
			if (file_exists($thumbnail))
			{
			unlink($thumbnail);
			}  
			}
			if (file_exists($large))
			{
			unlink($large);
			} 
		}
 
		$edit_data = array('image'  =>"",);
		$del = services::where('id',$id)->update($edit_data);			 		
		return redirect('admin/servicesEdit/edit/'.base64_encode($id))->with("success","slider Icons deleted successfully.");
			
    }
 
 
 
 
}
