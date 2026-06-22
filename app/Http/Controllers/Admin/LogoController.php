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
use App\Logo;
use App\Helpers;
 
class LogoController extends Controller
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
		$data['title'] ="All logo";
        $data['header'] ="All logo";
        return view('admin.logo.index',['data'=>$data]);
    } 
	 
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function logoAdd(Request $request)
    {	 
	 	$data['title'] ="Add logo";
        $data['header'] ="Add logo";
        return view('admin.logo.index',['data'=>$data]);
    }
    
    
    	 
   /**
     * Show the application edit.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {	  
		$edit_data= Logo::findOrFail(base64_decode($id)); 
		$data['title'] ="Edit logo";
        $data['header'] ="Edit logo";    
        return view('admin.logo.index',['edit_data'=>$edit_data,'data'=>$data]);
    } 
    
    
	
    public function logoEditSave(Request $request,$id)
    {	  
        //echo "<pre>";print_r($_POST);die;
 
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
				
			//	'name' 	=> 'required|max:255|unique:languages,name,'.$id.',id',	
				'name' 	=> 'required',	
			 
			]);
			
		 
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			 
				
				$language = Logo::findOrFail($id);
				$language->name = ucfirst(trim($request->input('name')));		
				  								
					
				if ($request->hasFile('image')) {
				$icons = [];
				$filePath =  $this->getlogoFolderStructure();
			 
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
				$language->image = serialize($icons);		
				}else{
				$language->image = $language->image;	
				}	
							
							
			if($language->save()){
				$status=1;							 
				$msg="Language updated successfully!";		
				
			}else{
				$status=0;							 
				$msg="Language could not be updated, Please try again!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 

	// GET  Course pagination
	public function getLogoPagination(Request $request)
	{ //echo "pagination";die;
		   
		if($request->ajax()){			 
		$logos = 	Logo::orderBy('id','desc');		 
		if($request->input('search.value')!==''){
				$logos = $logos->where(function($query) use($request){
					$query->orWhere('name','LIKE','%'.$request->input('search.value').'%');					     		   
						  
				});
			}
			$logos = $logos->paginate($request->input('length'));
			
			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $logos->total();
			$returnLeads['recordsFiltered'] = $logos->total();
			$returnLeads['recordCollection'] = [];
 
			foreach($logos as $logo){				 
				$action="";
				$seperate="";	
				$status="";		
				$action .='<a href="/admin/logoEdit/edit/'.base64_encode($logo->id).'" title="logo Edit" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>';
			 
					
				if($logo->status=='1'){
					$status .='<a href="javascript:LogoController.status('.$logo->id.',0)" title="logo status" class="btn btn-success" >Active</a>';	
					}else{
					$status .='<a href="javascript:LogoController.status('.$logo->id.',1)" title="logo status" class="btn btn-danger" >Inactive</a>';	
					}
					$data[] = [		 		 		 
						$logo->name,
						$status,		
						$action,					  
						 
					];
					$returnLeads['recordCollection'][] = $logo->id;				 
			}			
			$returnLeads['data'] = $data;
			return response()->json($returnLeads);			
			
		}  
		
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
		 
		$logo = logo::findOrFail($id);	 
		$logo->status=$val;
		 //echo "<pre>";print_r($homeAdds);die;
		if($logo->save()){
			$status=1;							 
			$msg="logo status updated successfully !";					
			}else{
			$status=0;							 
			$msg="logo status could not be successfully, Please try again !";	
			}		
			return response()->json(['status'=>$status,'msg'=>$msg],200); 
		 }
    }
  
	
	
	
 
// FOLDER STRUCTURE GENERATOR
// **************************

    function getlogoFolderStructure(){
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
    		$partial_str = 'uploads/logo/'.date('Y').'/'.date('m').'/'.$week;
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
       	 
		$delet_data = Logo::findOrFail($id); 
		
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
		$del = Logo::where('id',$id)->update($edit_data);			 		
		return redirect('admin/logoEdit/edit/'.base64_encode($id))->with("success","Logo Icons deleted successfully.");
			
    }
	
 
 
 
 
}
