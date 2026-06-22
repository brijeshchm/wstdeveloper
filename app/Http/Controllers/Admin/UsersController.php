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
use Cookie;
use PDF;
use Mail;
 
use App\User;
class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
	    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	 
			 $data['title'] ="All User";
        $data['header'] ="All users";
        return view('admin.users.index',['data'=>$data]);
 
       
    } 
	
	  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function usersAdd(Request $request)
    {	 
	 	$data['title'] ="Add User";
        $data['header'] ="Add users";
        return view('admin.users.index',['data'=>$data]);
    }
    
    
    	 
   /**
     * Show the application edit.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {	  
		$edit_data= User::findOrFail(base64_decode($id)); 
		$data['title'] ="Edit users";
        $data['header'] ="Edit users";    
        return view('admin.users.index',['edit_data'=>$edit_data,'data'=>$data]);
    } 
    
    
	 /**
	 add save Course Title with slug
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveUsers(Request $request)
    {	  
	 //echo "<pre>";print_r($_POST);die;
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
				//'name' => 'required|unique:departmentAll,name|min:3|max:25',
					'name' => 'required|min:3|max:25',				 
				'email' => 'required|email|max:100|unique:users',
				'role' => 'required',
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
		 
				
				$users = New User;
				$users->name = ucwords(trim($request->input('name')));				 
				$users->email = trim($request->input('email'));
				$users->password = trim(bcrypt($request->input('password')));
				$users->role = $request->input('role');			
				$users->status = 0;	
				 
			if($users->save()){
				$status=1;							 
				$msg="Users submitted successfully!";		
				
			}else{
				$status=0;							 
				$msg="Users could not be submitted, Please try again!";	
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
    public function usersEditSave(Request $request,$id)
    {	  
      //  echo "<pre>";print_r($_POST);die;
 
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
				
			 
				'name' 	=> 'required',				 
				'email'=>'required|unique:users,email,'.$id,		 
				'role' => 'required',	
			 
			]);
			
		 
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			 
				
				$users = User::findOrFail($id);
				$users->name = ucfirst(trim($request->input('name')));		
				$users->email = trim($request->input('email'));		
				$users->role = $request->input('role');		
				if(!empty($request->input('password'))){
				$users->password = bcrypt($request->input('password'));
				}			
			if($users->save()){
				$status=1;							 
				$msg="users updated successfully!";		
				
			}else{
				$status=0;							 
				$msg="users could not be updated, Please try again!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 

	// GET  Course pagination
	public function getUsersPagination(Request $request)
	{  
		   
		if($request->ajax()){			 
		$users = 	User::orderBy('id','desc');		 
		if($request->input('search.value')!==''){
				$users = $users->where(function($query) use($request){
					$query->orWhere('name','LIKE','%'.$request->input('search.value').'%');
					//->orWhere('email','LIKE','%'.$request->input('search.value').'%');						
						   
				});
			}
			$users = $users->paginate($request->input('length'));
			
			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $users->total();
			$returnLeads['recordsFiltered'] = $users->total();
			$returnLeads['recordCollection'] = [];
 
			foreach($users as $user){				 
				$action="";
				$seperate="";	
				$status="";		
				$action .='<a href="/admin/usersEdit/edit/'.base64_encode($user->id).'" title="user Edit" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>';
			 
		/*		$action .='<a href="javascript:usersController.delete('.$user->id.')" title="Delete user" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';	 */
				
				  	
				if($user->status=='1'){
					$status .='<a href="javascript:usersController.status('.$user->id.',0)" title="user status" class="btn btn-success" >Active</a>';	
					}else{
					$status .='<a href="javascript:usersController.status('.$user->id.',1)" title="user status" class="btn btn-danger" >Inactive</a>';	
					}
					$data[] = [		 		 		 
						$user->name,	
                        $user->mobile,
                        $user->email,
						$status,		
						$action,					  
						 
					];
					$returnLeads['recordCollection'][] = $user->id;				 
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
		 
		$users = user::findOrFail($id);	
		if($users->delete()){
		$status=1;							 
		$msg="users Deleted Successfully!";	
		}else{
		$status=0;							 
		$msg="users could not be Deleted!";	
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
		 
		$users =User::findOrFail($id);	 
		$users->status=$val;
		 //echo "<pre>";print_r($users);die;
		if($users->save()){
			$status=1;							 
			$msg="users status updated successfully !";					
			}else{
			$status=0;							 
			$msg="users status could not be successfully, Please try again !";	
			}		
			return response()->json(['status'=>$status,'msg'=>$msg],200); 
		 }
    }
  
 
    
     
	
	 
 
}
