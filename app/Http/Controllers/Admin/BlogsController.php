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
use App\Blog;
use App\Author;
use App\Helpers;
use App\Categories;
use Illuminate\Support\Str;
class BlogsController extends Controller
{

 protected $imageFields = ['blog_image', 'image_banner'];

    /*
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
         $this->middleware('auth');
	   date_default_timezone_set('Asia/Kolkata');
    }

    /*
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	  

		$data['title'] ="All Blog";
        $data['header'] ="All Blog";
        return view('admin.blog.index',['data'=>$data]);

         
    } 
	
 
   /*
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {		
		$data['title'] ="Create Blog";
        $data['header'] ="Create Blog";
		$cetegories= Categories::select('id','name')->where('status',1)->get();	
	 
        return view('admin.blog.index',['categories'=>$cetegories,'data'=>$data]);
    } 
	 /*
	 add save Course Title with slug
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveBlog(Request $request)
    {	  
	//  echo "<pre>";print_r($_POST);die;
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
			 
				'title' => 'required|min:20|max:160',				 		
				'rating' => 'required',				
				'category' => 'required',				
				'total_rating' => 'required',					  			
				'meta_title'=>'required|min:20|max:160',	
				'meta_keywords'=>'required|min:20|max:260',	
				'meta_description'=>'required|min:45|max:260',	
				 		 				
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			$alt= $request->input('alt');
			
				// GENERATING SLUG
			// ***************
			$business_slug = NULL;
			$business_slug = $this->generate_slug(str_replace('?','',$request->input('title')));
			if(is_null($business_slug)){
			return redirect("/admin/blogs/add");

			}
			$slugExists = DB::table('web_blog')
			->select(DB::raw('slug'))
			->where('slug', 'like', '%'.$business_slug.'%')
			->orderBy('id','desc')
			->get();
			if(count($slugExists)>0){
			$business_slug = $slugExists[0]->slug;
			$business_slug = explode("-",$business_slug);
			$end = end($business_slug);
			reset($business_slug);
			if(!is_numeric($end)){
			$business_slug[] = 1;
			}else{
			++$end;
			$business_slug[count($business_slug)-1] = $end;
			}
			$business_slug = implode("-",$business_slug);
			}
		 
			 
				
				$blog = New Blog;
				$blog->title = ucwords(trim($request->input('title')));		
				$blog->slug  =$business_slug;		 				 
				$blog->rating = trim($request->input('rating'));					 
				$blog->total_rating = trim($request->input('total_rating'));					 
				$blog->meta_title = $request->input('meta_title');					 
				$blog->meta_keywords = $request->input('meta_keywords');					 
				$blog->meta_description = $request->input('meta_description');					 
				 
				$blog->category = $request->input('category');	
				$blog->category_name = $request->input('category');	
				$category = Categories::where('id',$request->input('category'))->first();

				if(!empty($category)){
				$blog->category = $category->id;
				$blog->category_name = $category->category_slug;
				}
		 								
				$blog->created_by = '1';				 
				$blog->status = '1';				 
				 	
			if($blog->save()){
				$status=1;							 
				$msg="Blog submitted successfully!";		
				
			}else{
				$status=0;							 
				$msg="Blog could not be submitted, Please try again!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 

  
	
	 
   /*
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {	  
		$edit_data= Blog::findOrFail(base64_decode($id)); 
		$categories= Categories::select('id','name')->where('status',1)->get();	
		$data['title'] ="Edit Blog";
        $data['header'] ="Edit Blog";

		date_default_timezone_set('Asia/Kolkata');
		$data['button'] = "Save";
		$authors = Author::where('status','1')->get();
        return view('admin.blog.edit_blog',['edit_data'=>$edit_data,'categories'=>$categories,'data'=>$data,'authors'=>$authors]);
    } 
	
	 /*
	 add save Course Title with slug
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogsEditSave(Request $request,$id)
    {	  
 
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
				
				'title' => 'required|min:20|max:100',				
				'sub_title'=>'required|min:28|max:148',			
				'rating' => 'required',				
				'total_rating' => 'required',				
				'category' => 'required',				
				'subcategory' => 'required',				
				'alt' => 'required',
				'slug' => 'required',
				'meta_keyword'=>'required|min:20|max:260',	
				'meta_description'=>'required|min:45|max:260',	
				'blog_description' => 'required|min:100|max:240',				 				
				'blog_content' => 'required',				 				
				 			
			]);
			
			if($request->hasFile('blog_icons')){
				 $validator = Validator::make($request->all(),[					 
			//	'blog_icons' => 'required|mimes:jpeg,png,jpg,svg|max:8|dimensions:min_width=315,min_height=230,max_width=325,max_height=240',	 			
				'blog_icons' => 'required|mimes:jpeg,png,jpg,svg', 
					 			
			]);
			}
			if($request->hasFile('blog_image')){
				 $validator = Validator::make($request->all(),[					 
				//'blog_image' => 'required|mimes:jpeg,png,jpg,svg|max:40|dimensions:min_width=600,min_height=400,max_width=750,max_height=450',	 			
		    	'blog_image' => 'required|mimes:jpeg,png,jpg,svg',			
			]);
			} 
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
				$alt= $request->input('alt');	
				$blog = Blog::findOrFail($id);
				$blog->title = ucfirst(trim($request->input('title')));		
				$blog->slug  =trim(str_replace('?','',$request->input('slug')));			
				$blog->sub_title = ucfirst($request->input('sub_title'));					 
				$blog->rating = trim($request->input('rating'));					 
				$blog->total_rating = trim($request->input('total_rating'));	
				$blog->category = trim($request->input('category'));
				$blog->subcategory = trim($request->input('subcategory'));				
				$blog->meta_keyword = ucfirst($request->input('meta_keyword'));					 
				$blog->meta_description = ucfirst($request->input('meta_description'));					 
				$blog->blog_description = ucfirst($request->input('blog_description'));				
				$blog->blog_content = ucfirst($request->input('blog_content'));				
				
				if ($request->hasFile('blog_icons')) {
				$icons = [];
				$filePath = $this->getBlogFolderStructure();
			 
				$file =  $request->file('blog_icons');
				$iconsfilename =str_replace(' ', '_', $file->getClientOriginalName());			 
				$destinationPath = public_path($filePath);
				$nameArr = explode('.',$iconsfilename);
				$ext = array_pop($nameArr);
				$name = implode('_',$nameArr);
				if(file_exists($destinationPath.'/'.$iconsfilename)){
				$iconsfilename = $name."_".time().'.'.$ext;
				}
				$file->move($destinationPath,$iconsfilename);				 
				$icons['blog_icons'] = array(
				'name'=>$iconsfilename,
				'alt'=>$alt,						
				'src'=>$filePath."/".$iconsfilename
				);	
				$blog->blog_icons = serialize($icons);		
				}else{
				$blog->blog_icons = $blog->blog_icons;	
				}	
				
				if ($request->hasFile('blog_image')) {
				$image = [];
				$filePath = $this->getBlogFolderStructure();
			 
				$file =  $request->file('blog_image');
				$filename =str_replace(' ', '_', $file->getClientOriginalName());			 
				$destinationPath = public_path($filePath);
				$nameArr = explode('.',$filename);
				$ext = array_pop($nameArr);
				$name = implode('_',$nameArr);
				if(file_exists($destinationPath.'/'.$filename)){
				$filename = $name."_".time().'.'.$ext;
				}
				$file->move($destinationPath,$filename);				 
				$image['blog_image'] = array(
				'name'=>$filename,
				'alt'=>$alt,						
				'src'=>$filePath."/".$filename
				);	
				$blog->blog_image = serialize($image);		
				}else{
				$blog->blog_image = $blog->blog_image;	
				}	
				
			 	$blog->updated_by = '1';			
			if($blog->save()){
				$status=1;							 
				$msg="Blog updated successfully!";		
				
			}else{
				$status=0;							 
				$msg="Blog could not be updated, Please try again!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 

	// GET  Course pagination
	public function getblogsPagination(Request $request)
	{
		   
		if($request->ajax()){			 
		$blogs = 	Blog::orderBy('id','desc');		 
		if($request->input('search.value')!==''){
				$blogs = $blogs->where(function($query) use($request){
					$query->orWhere('title','LIKE','%'.$request->input('search.value').'%')					     		   
						  ->orWhere('sub_title','LIKE','%'.$request->input('search.value').'%');
				});
			}
			$blogs = $blogs->paginate($request->input('length'));
			
			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $blogs->total();
			$returnLeads['recordsFiltered'] = $blogs->total();
			$returnLeads['recordCollection'] = [];
 
			foreach($blogs as $blog){				 
				$action="";
				$seperate="";	
				$status="";		
				$image="";		
				$action .='<a href="/admin/blogs/edit/'.base64_encode($blog->id).'" title="Edit Blog" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>';
			 
				$action .= '<a href="javascript:blogController.delete('.$blog->id.')" title="Delete Blog" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';	
				 
			 
				if($blog->status=='1'){
					$status .='<a href="javascript:blogController.status('.$blog->id.',0)" title="Blog status" class="btn btn-success" >Active</a>';	
					}else{
					$status .='<a href="javascript:blogController.status('.$blog->id.',1)" title="Blog status" class="btn btn-danger" >Inactive</a>';	
					}
					$data[] = [		 		 		 
						 				 			
						$blog->slug,				 			
					
						$status,		
						$action,					  
						 
					];
					$returnLeads['recordCollection'][] = $blog->id;				 
			}			
			$returnLeads['data'] = $data;
			return response()->json($returnLeads);			
			
		}  
		
	}
	
  
	 /*
     * Remove the specified resource from storage del_icon.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
		 
		$blog = Blog::findOrFail($id);			 
		if($blog->blog_image!='')
		{
			$image = json_decode($blog->blog_image);
			$large = $image->blog_image->src;
			if(!empty($image->blog_image->src)){
			$thumbnail = $image->blog_image->src;
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
		
		if($blog->image_banner!='')
		{
			$image = json_decode($blog->image_banner);
			$large = $image->image_banner->src;
			if(!empty($image->image_banner->src)){
			$thumbnail = $image->image_banner->src;
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

		 
		
		if($blog->delete()){
		$status=1;							 
		$msg="Blog Deleted Successfully!";	
		}else{
		$status=0;							 
		$msg="Blog could not be Deleted!";	
		}
		return response()->json(['status'=>$status,'msg'=>$msg],200); 
    }
  
  
 
	 /*
     * Remove the specified resource from storage del_icon.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteImage($id,$blog_image)
    {
       	 
		$delet_data = Blog::findOrFail($id); 	
		if($delet_data->$blog_image!='')
		{		
			 
			$image = json_decode($delet_data->$blog_image);
			
			$large = $image->$blog_image->src;
			if(!empty($image->$blog_image->src)){
			$thumbnail = $image->$blog_image->src;
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
 
		$edit_data = array($blog_image  =>"",);	 
		$del = Blog::where('id',$id)->update($edit_data);			 		
		return redirect('admin/blogs/edit/'.base64_encode($id))->with("success","image deleted successfully.");
			
    }
    
    
    /*
     * Remove the specified resource from storage status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(request $request, $id,$val)
    {
       	 if($request->ajax()){	
		 
		$blog = Blog::findOrFail($id);	 
		$blog->status=$val;
		 
		if($blog->save()){
			$status=1;							 
			$msg="Blog status updated successfully !";					
			}else{
			$status=0;							 
			$msg="Blog status could not be successfully, Please try again !";	
			}		
			return response()->json(['status'=>$status,'msg'=>$msg],200); 
		 }
    }
  
 
      
    // FOLDER STRUCTURE GENERATOR
    // **************************
    function getBlogFolderStructure(){
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
    		$partial_str = 'uploads/Blog/'.date('Y').'/'.date('m').'/'.$week;
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

     function generate_slug($slug=null){
    	if(is_null($slug)){
    		return null;
    	}
    	$slug = explode(" ",$slug);
    	$slug = array_map('trim',$slug);
    	//$slug = array_map('remove_splchars',$slug);
    	$slug = array_map('strtolower',$slug);
    	$slug = implode("-",$slug);
    	return $slug;
    }
 


	  /**
     * POST /admin/blogMetaUpdate/{id}
     * Section 1 — Basic Details & SEO
     */
    public function blogMetaUpdate(Request $request, $id)
    {	 
        $blog = Blog::findOrFail($id);
 
        $validated = $request->validate([
            'category'      => 'nullable|integer',      
          
            'author'            => 'nullable|string|max:255',
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:web_blog,slug,' . $id,          
            'meta_title'        => 'nullable|string|max:255',
            'meta_keywords'     => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
             
        ]);
 
        if (empty($validated['slug']) && !empty($validated['title'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
 
		
        $blog->fill($validated);
		$category = Categories::where('id',$request->input('category'))->first();

		if(!empty($category)){
		$blog->category = $category->id;
		$blog->category_name = $category->category_slug;
		}
        $blog->save();
 
        return response()->json([
            'status' => true,
            'msg'    => 'Basic details & SEO updated successfully.',
        ]);
    }
 
    /**
     * POST /admin/blogUpdateAbout/{id}
     * Section 2 — About & Paragraphs
     */
    public function blogUpdateAbout(Request $request, $id)
    {

	 
        $blog = Blog::findOrFail($id); 
        $validated = $request->validate([
            'about_heading'     => 'nullable|string|max:255',
            'about_blog'  => 'nullable|string',
            'paragraph1'  => 'nullable|string',
            'paragraph2'  => 'nullable|string',
            'paragraph3'  => 'nullable|string',
            'paragraph4'  => 'nullable|string',
            'paragraph5'  => 'nullable|string',
            'paragraph6'  => 'nullable|string',
        ]);
 
        $blog->fill($validated);
        $blog->save();
 
        return response()->json([
            'status' => true,
            'msg'    => 'About & paragraphs updated successfully.',
        ]);
    }
 
    /**
     * POST /admin/blogUpdateContent/{id}
     * Section 3 — Content (top/bottom heading + content)
     */
    public function blogUpdateContent(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
 
        $validated = $request->validate([
         
            'heading'     => 'nullable|string',
            'blog_description' => 'nullable|string',
            'top_heading'     => 'nullable|string|max:255',
            'top_content'     => 'nullable|string',
            'bottom_heading'  => 'nullable|string|max:255',
            'bottom_content'  => 'nullable|string',
            'conclusion'  => 'nullable|string',
        ]);
 
        $blog->fill($validated);
        $blog->save();
 
        return response()->json([
            'status' => true,
            'msg'    => 'Content updated successfully.',
        ]);
    }
 
    /**
     * POST /admin/blogUpdateFaq/{id}
     * Section 4 — Ratings & FAQs
     */
    public function blogUpdateFaq(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
 
        $validated = $request->validate([
            'rating' => 'nullable|numeric|min:0|max:5',
            'total_rating' => 'nullable|integer|min:0',
            'faqq1' => 'nullable|string|max:255', 'faqa1' => 'nullable|string',
            'faqq2' => 'nullable|string|max:255', 'faqa2' => 'nullable|string',
            'faqq3' => 'nullable|string|max:255', 'faqa3' => 'nullable|string',
            'faqq4' => 'nullable|string|max:255', 'faqa4' => 'nullable|string',
            'faqq5' => 'nullable|string|max:255', 'faqa5' => 'nullable|string',
         
        ]);
 
        $blog->fill($validated);
        $blog->save();
 
        return response()->json([
            'status' => true,
            'msg'    => 'Ratings & FAQs updated successfully.',
        ]);
    }
 
    
 

	/*
	 * POST /admin/blogUpdateImage/{id}
	 * Section 5 — Banner & Image
	 */
	public function blogUpdateImage(Request $request, $id)
	{
		$blog = Blog::findOrFail($id);

		 
		$request->validate([
		'blog_image'   => 'nullable|max:5120',
		'image_banner' => 'nullable|max:5120',
		]);

		// Maps form field name => model column name
		$this->handleImageUploads($request, $blog, [
			'blog_image'   => 'blog_image',
			'image_banner' => 'image_banner',
		]);

		$blog->save();

		return response()->json([
			'status' => true,
			'msg'    => 'Images updated successfully.',
		]);
	}
 
 
 protected function handleImageUploads(Request $request, Blog $blog, array $fieldMap = [])
{
    if (empty($fieldMap)) {
        $fieldMap = array_combine($this->imageFields, $this->imageFields);
    }

    foreach ($fieldMap as $formField => $column) {
        if ($request->hasFile($formField)) {
            $file = $request->file($formField);
            $destination = 'uploads/blogs';
            $destinationPath = public_path($destination);

            $originalName = $file->getClientOriginalName();

            try {
                if ($formField === 'image_banner') {
                    $savedFilename = $this->saveImageSmart($file, $destinationPath, 900, 600);
                } elseif ($formField === 'blog_image') {
                    $savedFilename = $this->saveImageSmart($file, $destinationPath, 400, 300);
                }  
            } catch (\Exception $e) {
                // Skip this file rather than fatally crashing the whole save
                \Log::warning("Image upload failed for field [{$formField}]: " . $e->getMessage());
                continue;
            }

            $blog->{$column} = json_encode([
                $column => [
                    'src'  => $destination . '/' . $savedFilename,
                    'name' => $originalName, // ← original filename preserved, not the regenerated one
                ],
            ]);
        }
    }
}

 private function saveImageSmart($file, $destinationPath, $width = null, $height = null)
	{
		$ext = strtolower($file->getClientOriginalExtension());
		$name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
		$name = str_replace(' ', '_', $name);
		$filename =  time() . rand(1000,9999);

		// ✅ SVG → Save directly
		if ($ext === 'svg') {
			$finalName = $filename . '.svg';
			$file->move($destinationPath, $finalName);
			return $finalName;
		}

		// ✅ Raster → Convert to WEBP
		$imagePath = $file->getPathname();

		switch ($ext) {
			case 'jpg':
			case 'jpeg':
				$src = imagecreatefromjpeg($imagePath);
				break;
			case 'png':
				$src = imagecreatefrompng($imagePath);
				imagepalettetotruecolor($src);
				imagealphablending($src, true);
				imagesavealpha($src, true);
				break;
			case 'webp':
				$src = imagecreatefromwebp($imagePath);
				break;
			default:
				throw new \Exception('Unsupported image type');
		}

		$width = $width ?? imagesx($src);
		$height = $height ?? imagesy($src);

		$dst = imagecreatetruecolor($width, $height);
		imagealphablending($dst, false);
		imagesavealpha($dst, true);

		imagecopyresampled(
			$dst,
			$src,
			0,
			0,
			0,
			0,
			$width,
			$height,
			imagesx($src),
			imagesy($src)
		);

		$finalName = $filename . '.webp';
		imagewebp($dst, $destinationPath . '/' . $finalName, 80);

		imagedestroy($src);
		imagedestroy($dst);

		return $finalName;
	}

 
}
