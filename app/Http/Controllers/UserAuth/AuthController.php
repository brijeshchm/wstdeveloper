<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Hash;
use Validator;
use DB;
use App\Patient;
use Auth;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
	  use AuthenticatesUsers;   

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';
	
    /**
     * Where to redirect users after logout.
     *
     * @var string
     */
	//protected $redirectAfterLogout = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		//s$this->middleware('guest')->except('logout');
        //$this->middleware('auth')->only('logout');       
		//$this->middleware($this->guestMiddleware(), ['except' => ['logout','clientLoginPost']]);
    }
	
     
	/**
	 * Return Client Login View
	 *
	 * @return Login View
	 */
	public function UserLogin(){
		
		return view('site.login');
		 
	}	
	/**
	 * Return Client Login View
	 *
	 * @return Login View
	 */
	public function profile(){
		
		return view('site.user-profile');
		 
	}
	/**
	 * Return patient registrer
	 *
	 * @return Login View
	 */	
	public function saveRegister(Request $request)
	{		 
		if($request->ajax()){ 
			$validator = Validator::make($request->all(),[					 
				'first_name' => 'required|max:50',
				'last_name' => 'max:50',
				'mobile' => 'required|numeric',
				'email' => 'required|email|max:50|unique:patients',
				'password' => 'required|min:6|confirmed',					
			]);

			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
		 
			$business_slug = str_replace(' ','-',$request->input('first_name'));
			$business_slug = strtoupper(substr($business_slug,0,2)); 			
			$patient = New Patient;				 					 
			$patient->first_name = trim($request->input('first_name'));					 
			$patient->last_name = trim($request->input('last_name'));			 
			$patient->mobile = $request->input('mobile');	
			$patient->email = $request->input('email');		 				 
			$patient->password = bcrypt($request->input('password'));		 
			$patient->role = "user";		 
			$patient->status = 1;				  
			if ($patient->save()){
				$patient= Patient::findOrFail($patient->id); 
				$patient->slug = $business_slug;
				$patient->user_name = $patient->id.''.strtoupper(substr($business_slug,0,2));
				$patient->save();
				$status=1;							 
				$msg="Successfully Registration Patient!";		
				return response()->json(['status'=>$status,'msg'=>$msg],200); 
			} else {
				$status=0;							 
				$msg="Patient could not be submitted, Please try again!";	
				return response()->json(['status'=>$status,'msg'=>$msg],200); 
			}
		}		
	}
	
	/**
	 * patient logout
	 *
	 * @return Login View
	 */
	public function logout(){
		Auth::guard('patients')->logout();
		Auth::logout();
		return redirect('/login');
		
	}
	
	 
	
	 
	public function authenticate(Request $request)
	{		  
		if($request->has('email')&& $request->has('password')){	 
		 
			$validator = Validator::make($request->all(),[			 
				'email' => 'required',
				'password' => 'required',				 				
			]);	 
			
			if($validator->fails()){				
				$errorsBag = $validator->getMessageBag()->toArray();
				$status= 1;
				return response()->json(['status'=>$status,'errors'=>$errorsBag],400);
			}
		 
			$patient = Patient::where('email',$request->input('email'))->select('email','password','user_name','role','id','remember_token','remember')->first();
			$remember=1;				  
			if (!empty($patient)){
				if (Hash::check(trim($request->input('password')), $patient->password)) {
					 
					$request->session()->put('patient.email', $request->input('email'));
					$request->session()->put('patient.password',$request->input('password'));
					$request->session()->put('patient.remember', $patient->remember_token);
					$request->session()->put('patient.user_name', $patient->user_name); 
					$request->session()->put('patient.role', $patient->role); 
					$request->session()->put('patient.id', $patient->id); 	
					$patients = $request->session()->get('patient');
					$user = $request->session()->get('patient'); 
					 
					if (Auth()->guard('patients')->loginUsingId($request->session()->get('patient.id')))
					{					 
						$user = auth()->guard('patients')->user();				 
						//return redirect('/profile');						 
						return response()->json(['status'=>1,'msg'=>'successfully login Using Id'],200); 
					}else{
						$request->session()->get('patient.id');
						$errorsBag = array("email"=>["Incorrect login Using Id."]);				 
						return response()->json(['status'=>1,'errors'=>$errorsBag],400);					  
					}
					
				}else{			 
					$errorsBag = array("password"=>["Incorrect Password."]);				 
					return response()->json(['status'=>1,'errors'=>$errorsBag],400);		 
				}	 
			}else{
				$errorsBag = array("email"=>["Incorrect email id."]);					 
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}		
		}	
	}

}
