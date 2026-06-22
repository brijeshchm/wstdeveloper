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
use App\Slider;
use App\Helpers;
 
class SlidersController extends Controller
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
		$data['title'] ="All sliders";
        $data['header'] ="All sliders";
        return view('admin.sliders.index',['data'=>$data]);
    } 
	 
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function slidersAdd(Request $request)
    {	 
	 	$data['title'] ="Add sliders";
        $data['header'] ="Add sliders";
        return view('admin.sliders.index',['data'=>$data]);
    }
    
    
    	 
   /**
     * Show the application edit.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {	  
		$edit_data= Slider::findOrFail(base64_decode($id)); 
		$data['title'] ="Edit sliders";
        $data['header'] ="Edit sliders";    
        return view('admin.sliders.index',['edit_data'=>$edit_data,'data'=>$data]);
    } 
    
    
	 /**
	 add save Course Title with slug
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function slidersSave(Request $request)
    {	
 
	// echo "<pre>";print_r($_POST);print_r($_FILES);die;
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
				//'name' => 'required|unique:sliders,name|min:3|max:25',
					'name' => 'required|min:3|max:255',
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			
				$slider = New Slider;
				$slider->name = ucwords(trim($request->input('name')));	
				$slider->status = 0;	
				
				if ($request->hasFile('image')) {
				$alt = $request->input('name');
				$icons = [];
				$filePath = $this->getsliderFolderStructure();
			//	$file = Input::file('course_image');
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
				$slider->image = serialize($icons);	
				} 
				
				//echo "<pre>";print_r($slider);die;
			if($slider->save()){
				$status=1;							 
				$msg="slider submitted successfully!";		
				
			}else{
				$status=0;							 
				$msg="slider could not be submitted, Please try again!";	
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
    public function slidersEditSave(Request $request,$id)
    {	  
      //  echo "<pre>";print_r($_POST);die;
 
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
				
			//	'name' 	=> 'required|max:255|unique:sliders,name,'.$id.',id',	
				'name' 	=> 'required',	
			 
			]);
			
		 
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			 
				
				$slider = Slider::findOrFail($id);
				$slider->name = ucfirst(trim($request->input('name')));		
				  			
							
					
				if ($request->hasFile('image')) {
				$icons = [];
				$filePath =  $this->getsliderFolderStructure();
			 
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
				$slider->image = serialize($icons);		
				}else{
				$slider->image = $slider->image;	
				}	
							
							
			if($slider->save()){
				$status=1;							 
				$msg="slider updated successfully!";		
				
			}else{
				$status=0;							 
				$msg="slider could not be updated, Please try again!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    }  

	// GET  Course pagination
	public function getslidersPagination(Request $request)
	{ //echo "pagination";die;
		   
		if($request->ajax()){			 
		$sliders = 	slider::orderBy('id','desc');		 
		if($request->input('search.value')!==''){
				$sliders = $sliders->where(function($query) use($request){
					$query->orWhere('name','LIKE','%'.$request->input('search.value').'%');					     		   
						   
				});
			}
			$sliders = $sliders->paginate($request->input('length'));
			
			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $sliders->total();
			$returnLeads['recordsFiltered'] = $sliders->total();
			$returnLeads['recordCollection'] = [];
 
			foreach($sliders as $slider){				 
				$action="";
				$seperate="";	
				$status="";		
				$action .='<a href="/admin/slidersEdit/edit/'.base64_encode($slider->id).'" title="slider Edit" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>';
			 
				$action .=' || <a href="javascript:SliderController.delete('.$slider->id.')" title="Delete slider" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>'; 
				
				  	
				if($slider->status=='1'){
					$status .='<a href="javascript:SliderController.status('.$slider->id.',0)" title="slider status" class="btn btn-success" >Active</a>';	
					}else{
					$status .='<a href="javascript:SliderController.status('.$slider->id.',1)" title="slider status" class="btn btn-danger" >Inactive</a>';	
					}
					$data[] = [		 		 		 
						$slider->name,	
						$status,		
						$action,					  
						 
					];
					$returnLeads['recordCollection'][] = $slider->id;				 
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
		 
		$slider = Slider::findOrFail($id);	
		if($slider->delete()){
		$status=1;							 
		$msg="slider Deleted Successfully!";	
		}else{
		$status=0;							 
		$msg="slider could not be Deleted!";	
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
		 
		$slider = Slider::findOrFail($id);	 
		$slider->status=$val;
		 //echo "<pre>";print_r($slider);die;
		if($slider->save()){
			$status=1;							 
			$msg="slider status updated successfully !";					
			}else{
			$status=0;							 
			$msg="slider status could not be successfully, Please try again !";	
			}		
			return response()->json(['status'=>$status,'msg'=>$msg],200); 
		 }
    }
	
	
	
 
// FOLDER STRUCTURE GENERATOR
// **************************

    function getsliderFolderStructure(){
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
    		$partial_str = 'uploads/slider/'.date('Y').'/'.date('m').'/'.$week;
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
       	 
		$delet_data = Slider::findOrFail($id); 
		
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
		$del = slider::where('id',$id)->update($edit_data);			 		
		return redirect('admin/slidersEdit/edit/'.base64_encode($id))->with("success","slider Icons deleted successfully.");
			
    }
  
 
 
 
 
 
}
