<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use Auth;
use Hash;
use Validator;
//use DB;

use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon; 
use Cookie;
use PDF;
use Mail;

use App\Contact;
use App\Services;
use App\Categories;
use App\Slider;
use App\Notifications\SendContactForm;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        
	    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	    	
		$categories = Categories::where('status', '1')->get();
		$services = Services::where('status', '1')->where('image','!=','')->get();
		$sliders = Slider::where('status', '1')->where('image','!=','')->get();
        return view('site.index',['sliders'=>$sliders,'services'=>$services,'categories'=>$categories]);
         
    } 
	
	
	
	public function blog(Request $request)
    {	 
	 
        return view('site.blog');
    }
	
	 public function blogDetail(Request $request)
    {	 
	 
        return view('site.blog-detail');
    }	
	 	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs(Request $request)
    {	 
	 
       $categories = Categories::where('status', '1')->get();
        $services = Services::where('status', '1')->where('image','!=','')->get();
       
        
        return view('site.about-us',['services'=>$services,'categories'=>$categories]);
    }
	

	
	public function supports(Request $request)
    {	 
        $categories = Categories::where('status', '1')->get();
		return view('site.support',['categories'=>$categories]);
    }
	
	 
	
	
    public function Contact(Request $request)
    {	 
	    
        return view('site.contact-us');
    }
	
	
	public function Portfolio(Request $request)
    {	 
	    
        return view('site.portfolio');
    }
	
	
	
	public function sendEmail(Request $request)
    {	 
	   
			$data = $request->validate([	
				'name' => 'required',	
				'email' => 'required|email',
				'phone' => 'required',
				'message' => 'required',
			 
			]);
			
			\Notifications::route('mail','verma19591@gmail.com')->notify(new SendContactForm($data));
			return redirect()->route('contact-us');
			
 
			
			
    }
	
	
	 
	 
	
	public function Service(Request $request)
	{		
		$services = Services::where('status', '1')->get();
		$categories = Categories::where('status', '1')->get();
		
        return view('site.service',['services'=>$services,'categories'=>$categories]);
    }
	
	 public function serviceDetails(Request $request,$slug)
	{	
 		$categories = Categories::where('status', '1')->get();
 		$categoryDetails = Categories::where('slug',$slug)->where('status', '1')->first();
 		$services = Services::where('categories_id',$categoryDetails->id)->where('status', '1')->get();
		if (!empty($services)) {
		 
		return view('site.service-details',['categories'=>$categories,'services'=>$services,'categoryDetails'=>$categoryDetails,'slug'=>$slug]);
		}else{
		 
			return response()->view('site.error410', [], 410);
		}
    }
	
	
	
	public function serviceChildDetails(Request $request,$slug,$mslug)
	{	
 		$serviceChildDetails = Services::where('service_slug',$mslug)->where('status', '1')->first();
		
		$categories = Categories::where('slug',$slug)->where('status', '1')->first();		
		$services = Services::where('categories_id',$categories->id)->where('status', '1')->get();
		if (!empty($serviceChildDetails)) {
		return view('site.service-child-details',['services'=>$services,'categories'=>$categories,'slug'=>$slug,'serviceChildDetails'=>$serviceChildDetails]);
		}else{
		  	return response()->view('site.error410', [], 410);
		}
    }
    
    
    
    public function sitemap()
	{
	    
	     $categoryList = Categories::where('status', '1')->get();
 
		
		return response()->view('site.sitemap', ['categoryList' => $categoryList])
    ->header('Content-Type', 'application/xml');
 
	}
 
	public function termsCondition(Request $request)
    {	 
       
		return view('site.terms-conditions');
    }

	public function privacypolicy(Request $request)
    {	 
       
		return view('site.privacy-policy');
    }

	public function copyrightpolicy(Request $request)
    {	 
       
		return view('site.copyright-policy');
    }
	public function refundPolicy(Request $request)
    {	 
       
		return view('site.refund-policy');
    }
	public function careers(Request $request)
    {	 
       
		return view('site.careers');
    }



}
