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
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {  $this->middleware('auth');
        //$this->middleware('guest')->except('logout');
       //$this->middleware('auth')->only('logout');
	    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {	 
			 
		//echo "dashboard";die;
        return view('admin.dashboard');
    } 
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function doctor(Request $request)
    {	 
	 
        return view('admin.doctor');
    }
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function doctorAll(Request $request)
    {	 
	 
        return view('admin.doctor-all');
    }
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function doctorAdd(Request $request)
    {	 
	 
        return view('admin.doctor-add');
    }
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function doctorProfile(Request $request)
    {	 
	 
        return view('admin.doctor-profile');
    }
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function doctorEvents(Request $request)
    {	 
	 
        return view('admin.doctor-events');
    }
    
    
     public function appointment(Request $request)
    {	 
		return view('admin.appointment');
    }
		
	public function appointmentAdd(Request $request)
    {	 
        return view('admin.appointmentAdd');
    }	
	
	public function appointmentEdit(Request $request)
    {	 
        return view('admin.appointmentEdit');
    }	
	
	public function appointmentCal(Request $request)
    {	 
        return view('admin.appointmentCal');
    }	
    
    	
	
	public function services(Request $request)
    {	 
        return view('admin.services');
    }
	public function servicesAdd(Request $request)
    {	 
        return view('admin.servicesAdd');
    }	
	
	public function servicesEdit(Request $request)
    {	 
        return view('admin.servicesEdit');
    }		
	
	public function education(Request $request)
    {	 
        return view('admin.education');
    }
	public function educationAdd(Request $request)
    {	 
        return view('admin.educationAdd');
    }	
	
	public function educationEdit(Request $request)
    {	 
        return view('admin.educationEdit');
    }		
	
	public function medicalHistory(Request $request)
    {	 
        return view('admin.medicalHistory');
    }
	public function medicalHistoryAdd(Request $request)
    {	 
        return view('admin.medicalHistoryAdd');
    }	
	
	public function medicalHistoryEdit(Request $request)
    {	 
        return view('admin.medicalHistoryEdit');
    }		
	
	public function causes(Request $request)
    {	 
        return view('admin.causes');
    }
	public function causesAdd(Request $request)
    {	 
        return view('admin.causesAdd');
    }	
	public function causesEdit(Request $request)
    {	 
        return view('admin.causesEdit');
    }
    
    public function insuranceNetworks(Request $request)
    {	 
        return view('admin.insuranceNetworks');
    }
	public function insuranceNetworksAdd(Request $request)
    {	 
        return view('admin.insuranceNetworksAdd');
    }	
	public function insuranceNetworksEdit(Request $request)
    {	 
        return view('admin.insuranceNetworksEdit');
    }	

	public function languages(Request $request)
    {	 
        return view('admin.languages');
    }
	public function languagesAdd(Request $request)
    {	 
        return view('admin.languagesAdd');
    }	
	public function languagesEdit(Request $request)
    {	 
        return view('admin.languagesEdit');
    }	
	 
	
	 
 
}
