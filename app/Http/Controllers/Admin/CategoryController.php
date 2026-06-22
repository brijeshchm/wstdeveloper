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
use App\Categories;
use App\Helpers;
 
class CategoryController extends Controller
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
		$data['title'] ="All category";
        $data['header'] ="All category";
        return view('admin.category.index',['data'=>$data]);
    } 
	 
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryAdd(Request $request)
    {	 
	 	$data['title'] ="Add category";
        $data['header'] ="Add category";
        return view('admin.category.index',['data'=>$data]);
    }
    
    
    	 
   /**
     * Show the application edit.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {	  
		$edit_data= Categories::findOrFail(base64_decode($id)); 
		$data['title'] ="Edit category";
        $data['header'] ="Edit category";    
        return view('admin.category.index',['edit_data'=>$edit_data,'data'=>$data]);
    } 
    
    
	 /**
	 add save Course Title with slug
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function categorySave(Request $request)
    {	  
	//echo "<pre>";print_r($_POST);print_r($_FILES);die;
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
				//'name' => 'required|unique:categoryAll,name|min:3|max:25',
					'name' => 'required|min:3|max:200',
					'subTital' => 'required|min:50|max:200',
					
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
		 	
				$category = New Categories;
				$category->name = ucwords(trim($request->input('name')));
				$category->slug =  strtolower(str_replace(".","",(str_replace(" ",'-',$category->name))));	
				$category->subTital = ucwords(trim($request->input('subTital')));		
				$category->status = 0;	
				
				if ($request->hasFile('image')) {
				$alt = $request->input('name');
				$icons = [];
				$filePath = $this->getFolderStructure();
			//	$file = Input::file('product_image');
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
				$category->image = serialize($icons);	
				}
				
				//echo "<pre>";print_r($_POST);print_r($_FILES);die;
				
			if($category->save()){
				$status=1;							 
				$msg="category submitted successfully!";		
				
			}else{
				$status=0;							 
				$msg="category could not be submitted, Please try again!";	
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
    public function categoryEditSave(Request $request,$id)
    {	  
      //  echo "<pre>";print_r($_POST);die;
 
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
				
			//	'name' 	=> 'required|max:255|unique:categoryAll,name,'.$id.',id',	
				'name' 	=> 'required',
				'subTital' => 'required|min:50|max:2000',	
			 
			]);
			
		 
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			 
				
				$category = Categories::findOrFail($id);
				$category->name = ucfirst(trim($request->input('name')));	
				$category->slug =  strtolower(str_replace(".","",(str_replace(" ",'-',$category->name))));	
				$category->subTital = ucwords(trim($request->input('subTital')));		
				$category->meta_title = ucwords(trim($request->input('meta_title')));		
				$category->meta_keywords = ucwords(trim($request->input('meta_keywords')));		
				$category->meta_description = ucwords(trim($request->input('meta_description')));		
				  		
                
                
                $category->about_heading = $request->input('about_heading');
                $category->paragraph1 = $request->input('paragraph1');
                $category->about = $request->input('about');
                $category->paragraph2 = $request->input('paragraph2');
                $category->paragraph3 = $request->input('paragraph3');
                $category->paragraph4 = $request->input('paragraph4');
                $category->paragraph5 = $request->input('paragraph5');
				$category->rating = $request->input('rating');	
				$category->total_rating = $request->input('total_rating');	
			
                $category->faqq1 = $request->input('faqq1');
                $category->faqa1 = $request->input('faqa1');
                $category->faqq2 = $request->input('faqq2');
                $category->faqa2 = $request->input('faqa2');
                $category->faqq3 = $request->input('faqq3');
                $category->faqa3 = $request->input('faqa3');
                $category->faqq4 = $request->input('faqq4');
                $category->faqa4 = $request->input('faqa4');
                $category->faqq5 = $request->input('faqq5');
                $category->faqa5 = $request->input('faqa5');

				if ($request->hasFile('image')) {
				$icons = [];
				$filePath =  $this->getFolderStructure();
			 
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
				$category->image = serialize($icons);		
				}else{
				$category->image = $category->image;	
				}	
				
				
			if($category->save()){
				$status=1;							 
				$msg="category updated successfully!";		
				
			}else{
				$status=0;							 
				$msg="category could not be updated, Please try again!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 



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
		$partial_str = 'uploads/category/'.date('Y').'/'.date('m').'/'.$week;
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

	// GET  Course pagination
	public function getcategoryPagination(Request $request)
	{ //echo "pagination";die;
		   
		if($request->ajax()){			 
		$categorys = 	Categories::orderBy('id','desc');		 
		if($request->input('search.value')!==''){
				$categorys = $categorys->where(function($query) use($request){
					$query->orWhere('name','LIKE','%'.$request->input('search.value').'%');					     		   
						   
				});
			}
			$categorys = $categorys->paginate($request->input('length'));
			
			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $categorys->total();
			$returnLeads['recordsFiltered'] = $categorys->total();
			$returnLeads['recordCollection'] = [];
 
			foreach($categorys as $category){				 
				$action="";
				$seperate="";	
				$status="";		
				$action .='<a href="/admin/categoryEdit/edit/'.base64_encode($category->id).'" title="category Edit" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>';
			 
				$action .='  || <a href="javascript:CategoryController.delete('.$category->id.')" title="Delete $category" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';	
				
				  	
				if($category->status=='1'){
					$status .='<a href="javascript:CategoryController.status('.$category->id.',0)" title="category status" class="btn btn-success" >Active</a>';	
					}else{
					$status .='<a href="javascript:CategoryController.status('.$category->id.',1)" title="category status" class="btn btn-danger" >Inactive</a>';	
					}
					$data[] = [		 		 		 
						$category->name,	
					 	
						$status,		
						$action,					  
						 
					];
					$returnLeads['recordCollection'][] = $category->id;				 
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
		 
		$category = Categories::findOrFail($id);	
		if($category->delete()){
		$status=1;							 
		$msg="category Deleted Successfully!";	
		}else{
		$status=0;							 
		$msg="category could not be Deleted!";	
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
		 
		$category = Categories::findOrFail($id);	 
		$category->status=$val;
		 //echo "<pre>";print_r($category);die;
		if($category->save()){
			$status=1;							 
			$msg="category status updated successfully !";					
			}else{
			$status=0;							 
			$msg="category status could not be successfully, Please try again !";	
			}		
			return response()->json(['status'=>$status,'msg'=>$msg],200); 
		 }
    }
	
	
	public function deleteImage($id)
    {
       	 
		$delet_data = Categories::findOrFail($id); 
		
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
		$del = Categories::where('id',$id)->update($edit_data);			 		
		return redirect('admin/categoryEdit/edit/'.base64_encode($id))->with("success","Categories Icons deleted successfully.");
			
    }
  
 
 
 
 
 
}
