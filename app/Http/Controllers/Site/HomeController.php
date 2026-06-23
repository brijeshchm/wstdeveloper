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
use App\Blog;
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
    $blogs = Blog::where('status', '1')
        ->orderBy('id', 'DESC')
        ->get(); // plain Collection — we're slicing manually, so paginate() isn't useful here

//     if ($blogs->isEmpty()) {
//         $firstBlog       = null;
//         $popularArticles = collect();
//         $tickerArticles  = collect();
//         $listArticles    = collect();
//     } else {
        
//     $firstBlog = $blogs->first() ? [
//         'url'        => $blogs->first()->slug,
//         'title'      => $blogs->first()->title,
//         'name'       => $blogs->first()->category_name,
//         'img'        => $blogs->first()->image_banner,
//         'excerpt'    => $blogs->first()->description,
//         'created_at' => $blogs->first()->created_at,
//         'updated_at' => $blogs->first()->updated_at,
//     ] : null;
            

//         $popularArticles = $blogs->slice(1, 3)->values()->map(function ($blog) {
//     return [
//         'url'        => $blog->slug,
//         'title'      => $blog->title,
//         'name'       => $blog->category_name,
//         'img'        => $blog->image_banner, // or whichever image field is correct here
//         'excerpt'    => $blog->description,
//         'created_at' => $blog->created_at,
//         'updated_at' => $blog->updated_at,
//     ];
// });
//         $tickerArticles  = $blogs->slice(4, 10)->values();
//         // $listArticles    = $blogs->slice(1)->values();
//         $listArticles = $blogs->slice(1)->values()->map(function ($blog) {
//         return [
//         'url'        => $blog->slug,
//         'title'      => $blog->title,
//         'name'       => $blog->category_name,
//         'img'        => $blog->blog_image, 
//         'excerpt'    => $blog->description,
//         'created_at' => $blog->created_at,
//         'updated_at' => $blog->updated_at,
//         ];
//         });
//     }





    if ($blogs->isEmpty()) {
        $firstBlog       = null;
        $popularArticles = collect();
        $tickerArticles  = collect();
        $listArticles    = collect();
    } else {
        $firstBlog       = $blogs->first();
        $popularArticles = $blogs->slice(1, 3)->values();
        $tickerArticles  = $blogs->slice(4, 10)->values();
        $listArticles    = $blogs->slice(1)->values();
    }

   

        $categories = Blog::select('category_name as name', DB::raw('COUNT(*) as count'))
            ->whereNotNull('category_name')
            ->where('status', '1')    
            ->where('category_name', '!=', '')
            ->groupBy('category_name')
            ->orderBy('count', 'DESC')
            ->get();

    $tags = [];
 
    return view('site.blog', compact(
        'firstBlog',
        'popularArticles',
        'tickerArticles',
        'listArticles',
        'categories',
        'tags'
    ));
}
	 
    
     public function blogdetails(Request $request, $slug)
    {
       
        $blogDetails =  Blog::where('slug',$slug)->first();
            
    // dd($blogDetails);

        $blogList = Blog::where('status', '1')->orderBy('id', 'DESC')->get();

        $tickerItems = $blogList->slice(1, 2)->values();
 
        // Build FAQ — filter empty pairs
        $faqs = [];
        for ($i = 1; $i <= 6; $i++) {
            $q = $blogDetails["faqq{$i}"] ?? null;
            $a = $blogDetails["faqa{$i}"] ?? null;
            if ($q && $a) {
                $faqs[] = ['q' => $q, 'a' => $a];
            }
        }
 
        // Author gradient colour (rotated by article id)
        $gradients = [
            'linear-gradient(135deg,#1e3a5f 0%,#2563eb 50%,#0891b2 100%)',
            'linear-gradient(135deg,#14532d 0%,#16a34a 50%,#0d9488 100%)',
            'linear-gradient(135deg,#4c1d95 0%,#7c3aed 50%,#db2777 100%)',
            'linear-gradient(135deg,#7c2d12 0%,#ea580c 50%,#d97706 100%)',
            'linear-gradient(135deg,#064e3b 0%,#0f766e 50%,#0284c7 100%)',
            'linear-gradient(135deg,#581c87 0%,#a21caf 50%,#db2777 100%)',
        ];
        $authorColor = $gradients[(int)($blogDetails['id'] ?? 0) % count($gradients)];
 
        // Paragraphs — filter blank
        $paragraphs = array_values(array_filter([
            $blogDetails['paragraph1'] ?? '',
            $blogDetails['paragraph2'] ?? '',
            $blogDetails['paragraph3'] ?? '',
            $blogDetails['paragraph4'] ?? '',
            $blogDetails['paragraph5'] ?? '',
            $blogDetails['paragraph6'] ?? '',
        ], fn($p) => trim($p) !== ''));
 
        $categories = [];
        if(!empty($blogDetails['category_name'])){
            $categories = Blog::select('category_name as name', DB::raw('COUNT(*) as count'))
            ->whereNotNull('category_name')
            ->where('status', '1')
            ->where('category_name',$blogDetails['category_name'])
            ->where('category_name', '!=', '')
            ->groupBy('category_name')
            ->orderBy('count', 'DESC')
            ->get();
        }

       
        return view('site.blog-details', compact(
            'blogDetails','blogList','tickerItems','categories',
            'faqs','authorColor','paragraphs','slug'
        ));
         
    }
	 	

    public function blogCategory(Request $request, $slug)
    {

   
        $blogs = Blog::where('status', '1')->where('category_name',$slug)->orderBy('id', 'DESC')->get();
 
        $categories = Blog::select('category_name as name', DB::raw('COUNT(*) as count'))
        ->whereNotNull('category_name')
        ->where('status', '1')
        ->where('category_name',$slug)
        ->where('category_name', '!=', '')
        ->groupBy('category_name')
        ->orderBy('count', 'DESC')
        ->get();
        return view('site.blog-category', ['categories' => $categories,'blogs'=>$blogs]);
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
