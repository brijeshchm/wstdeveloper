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
use App\HomePage;
use App\Helpers;
 
class HomePageController extends Controller
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
		$data['title'] ="All homePage";
        $data['header'] ="All homePage";
        return view('admin.homePage.index',['data'=>$data]);
    } 
	 
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    
    	 
   /**
     * Show the application edit.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {	  
		$edit_data= HomePage::findOrFail(base64_decode($id)); 
		$data['title'] ="Edit homePage";
        $data['header'] ="Edit homePage";    
        return view('admin.homePage.index',['edit_data'=>$edit_data,'data'=>$data]);
    } 
    
    
	
    public function homePageEditSave(Request $request,$id)
    {	  
        //echo "<pre>";print_r($_POST);die;
 
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
				
			//	'name' 	=> 'required|max:255|unique:aboutsUs,name,'.$id.',id',	
				'name' 	=> 'required',	
			 
			]);
			
		 
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			 
				
				$homePages = HomePage::findOrFail($id);
				$homePages->name = ucfirst(trim($request->input('name')));
				$homePages->subTital = $request->input('subTital');
				$homePages->description = $request->input('description');	
				  			
			if($homePages->save()){
				$status=1;							 
				$msg="homePages updated successfully!";		
				
			}else{
				$status=0;							 
				$msg="homePages could not be updated, Please try again!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 

	// GET  Course pagination
	public function getHomePagePagination(Request $request)
	{ //echo "pagination";die;
		   
		if($request->ajax()){			 
		$homePages = 	HomePage::orderBy('id','desc');		 
		if($request->input('search.value')!==''){
				$homePages = $homePages->where(function($query) use($request){
					$query->orWhere('name','LIKE','%'.$request->input('search.value').'%');					     		   
						  
				});
			}
			$homePages = $homePages->paginate($request->input('length'));
			
			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $homePages->total();
			$returnLeads['recordsFiltered'] = $homePages->total();
			$returnLeads['recordCollection'] = [];
 
			foreach($homePages as $homePage){				 
				$action="";
				$seperate="";	
				$status="";		
				$action .='<a href="/admin/homePageEdit/edit/'.base64_encode($homePage->id).'" title="homePage Edit" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>';
			 
				
				
				  	
				if($homePage->status=='1'){
					$status .='<a href="javascript:homePageController.status('.$homePage->id.',0)" title="homePage status" class="btn btn-success" >Active</a>';	
					}else{
					$status .='<a href="javascript:homePageController.status('.$homePage->id.',1)" title="homePage status" class="btn btn-danger" >Inactive</a>';	
					}
					$data[] = [		 		 		 
						$homePage->name,
						$homePage->subTital,
						$homePage->description,
						$status,		
						$action,					  
						 
					];
					$returnLeads['recordCollection'][] = $homePage->id;				 
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
		 
		$homePages = homePage::findOrFail($id);	 
		$homePages->status=$val;
		 //echo "<pre>";print_r($homeAdds);die;
		if($homePages->save()){
			$status=1;							 
			$msg="homePages status updated successfully !";					
			}else{
			$status=0;							 
			$msg="homePages status could not be successfully, Please try again !";	
			}		
			return response()->json(['status'=>$status,'msg'=>$msg],200); 
		 }
    }
  
 
 
 
 
 
}
