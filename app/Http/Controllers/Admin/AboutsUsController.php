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
use App\Abouts;
use App\Helpers;
 
class AboutsUsController extends Controller
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
		$data['title'] ="All aboutsUs";
        $data['header'] ="All aboutsUs";
        return view('admin.aboutsUs.index',['data'=>$data]);
    } 
	 
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutsUsAdd(Request $request)
    {	 
	 	$data['title'] ="Add aboutsUs";
        $data['header'] ="Add aboutsUs";
        return view('admin.aboutsUs.index',['data'=>$data]);
    }
    
    
    	 
   /**
     * Show the application edit.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {	  
		$edit_data= abouts::findOrFail(base64_decode($id)); 
		$data['title'] ="Edit aboutsUs";
        $data['header'] ="Edit aboutsUs";    
        return view('admin.aboutsUs.index',['edit_data'=>$edit_data,'data'=>$data]);
    } 
    
    
	 /**
	 add save Course Title with slug
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutsUsSave(Request $request)
    {	  
	 //echo "<pre>";print_r($_POST);die;
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
				//'name' => 'required|unique:aboutsUs,name|min:3|max:25',
				//	'name' => 'required|min:3|max:50',
					'subTital' => 'required',
					'description' => 'required',
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
				
				$abouts = New abouts;
				$abouts->name = ucwords(trim($request->input('name')));
				$abouts->subTital = $request->input('subTital');
				$abouts->description = $request->input('description');
				if ($request->hasFile('image')) {
				$icons = [];
				$filePath =  $this->getAboutFolderStructure();
			 
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
				$abouts->image = serialize($icons);		
				} 	
				$abouts->status = 0;	
				//echo "<pre>";print_r($abouts);die;
			if($abouts->save()){
				$status=1;							 
				$msg="abouts submitted successfully!";		
				
			}else{
				$status=0;							 
				$msg="abouts could not be submitted, Please try again!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 

  
	
	 
 
	
 /**
	 add save Course Title with slug
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutsUsEditSave(Request $request,$id)
    {	  
		//echo "<pre>";print_r($_POST);die;
 
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
				
			//	'name' 	=> 'required|max:255|unique:aboutsUs,name,'.$id.',id',	
				'about_title' => 'required',
				'description' => 'required',
			 
			]);
			
		 
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			 
				
				$abouts = Abouts::findOrFail($id);
				$abouts->about_title = ucfirst(trim($request->input('about_title')));	
                $abouts->meta_title = ucfirst(trim($request->input('meta_title')));	
                $abouts->meta_keyword = $request->input('meta_keyword');	
                $abouts->meta_description = $request->input('meta_description');	
				$abouts->description =  $request->input('description');	
				if ($request->hasFile('image')) {
				$icons = [];
				
				$filePath =  $this->getAboutFolderStructure();
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
				$abouts->image = serialize($icons);		
				}else{
				$abouts->image = $abouts->image;	
				}		
			if($abouts->save()){
				$status=1;							 
				$msg="Abouts updated successfully!";		
				
			}else{
				$status=0;							 
				$msg="Abouts could not be updated, Please try again!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 

	// GET  Course pagination
	public function getaboutsUsPagination(Request $request)
	{ //echo "pagination";die;
		   
		if($request->ajax()){			 
		$abouts = 	Abouts::orderBy('id','desc');		 
		if($request->input('search.value')!==''){
				$abouts = $abouts->where(function($query) use($request){
					$query->orWhere('about_title','LIKE','%'.$request->input('search.value').'%')
					->orWhere('meta_title','LIKE','%'.$request->input('search.value').'%');
				});
			}
			$abouts = $abouts->paginate($request->input('length'));
			
			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $abouts->total();
			$returnLeads['recordsFiltered'] = $abouts->total();
			$returnLeads['recordCollection'] = [];
 
			foreach($abouts as $about){				 
				$action="";
				$seperate="";	
				$status="";		
				$action .='<a href="/admin/aboutsUsEdit/edit/'.base64_encode($about->id).'" title="abouts Edit" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>';
			 
			//	$action .='<a href="javascript:aboutsController.delete('.$abouts->id.')" title="Delete $abouts" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';	
				
				  	
				if($about->status=='1'){
					$status .='<a href="javascript:aboutsController.status('.$about->id.',0)" title="abouts status" class="btn btn-success" >Active</a>';	
					}else{
					$status .='<a href="javascript:aboutsController.status('.$about->id.',1)" title="abouts status" class="btn btn-danger" >Inactive</a>';	
					}
					$data[] = [		 		 		 
						$about->about_title,
						$about->meta_title,
						$about->description,
						$status,		
						$action,					  
						 
					];
					$returnLeads['recordCollection'][] = $about->id;				 
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
		 
		$abouts = abouts::findOrFail($id);	
		if($abouts->delete()){
		$status=1;							 
		$msg="abouts Deleted Successfully!";	
		}else{
		$status=0;							 
		$msg="abouts could not be Deleted!";	
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
		 
		$abouts = abouts::findOrFail($id);	 
		$abouts->status=$val;
		 //echo "<pre>";print_r($abouts);die;
		if($abouts->save()){
			$status=1;							 
			$msg="abouts status updated successfully !";					
			}else{
			$status=0;							 
			$msg="abouts status could not be successfully, Please try again !";	
			}		
			return response()->json(['status'=>$status,'msg'=>$msg],200); 
		 }
    }
  
 
 			
 
// FOLDER STRUCTURE GENERATOR
// **************************

    function getAboutFolderStructure(){
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
    		$partial_str = 'uploads/about/'.date('Y').'/'.date('m').'/'.$week;
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
       	 
		$delet_data = abouts::findOrFail($id); 
		
		//echo "<pre>";print_r($delet_data);die;
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
		$del = abouts::where('id',$id)->update($edit_data);			 		
		return redirect('admin/aboutsUsEdit/edit/'.base64_encode($id))->with("success","slider Icons deleted successfully.");
			
    }
 
 
 
}
