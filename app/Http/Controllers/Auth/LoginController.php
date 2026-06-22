<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Hash;
use Validator;
use App\User;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //    $this->middleware('guest')->except('logout');
       // $this->middleware('auth')->only('logout');
    }
	
	public function login(){
	 //   echo  "login";die;
		return view('admin.login');	
	}		
	/**
     * Handle an authentication attempt
     *
     * @return Response
     */
	public function authenticate(Request $request)
	{	 
		if(!empty($request->input('email'))&& !empty($request->input('password')) ){				 
			$user = User::where('email',$request->input('email'))->select('email','password','name','id')->first();
		 	if(!empty($user)){
				if (Hash::check(trim($request->input('password')), $user->password)) {
					 
					$request->session()->put('admins.email', $request->input('email'));
					$request->session()->put('admins.password', $request->input('password'));
					$request->session()->put('admins.remember', '1');
					$request->session()->put('admins.name', $user->name); 
					$request->session()->put('admins.id', $user->id); 			 			
					$users = $request->session()->get('admins');
					 
					if (Auth::attempt(['email' => $users['email'], 'password' => $users['password']], $users['remember'])) {
	 
						$user = $request->session()->get('admins'); 					 
						if(Auth()->guard('admins')->loginUsingId($request->session()->get('admins.id'))){					 
							$user = auth()->guard('admins')->user(); 					
							return redirect()->intended('/admin/dashboard');					 
						}
					} 					 
					return $request->session()->all();
				}else{				    
					return redirect('/admin/login')->withErrors(['password'=>'Incorrect Password'])->withInput();
				}
			}else{				 			
				return redirect('/admin/login')->withErrors(['email'=>'Email ID is incorrect'])->withInput();				 
			}
		}else{
			return redirect('/admin/login')->withErrors(['email'=>'Email required','password'=>'Password required'])->withInput();			 
		}		 
	}
	
	public function adminLogout(){		 
		Auth::guard('admins')->logout();
		Auth::logout();
		return redirect('/admin/login');
		
	}
	
}
