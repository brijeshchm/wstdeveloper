@extends('admin.layouts.app')
@section('title')
  {{$data['title']}}
@endsection
@section('keyword')
   {{$data['title']}}
@endsection
@section('description')
    {{$data['title']}}
@endsection
@section('content')

<!-- main page content body part -->
<div id="main-content">
<style>
 .card-border{
    border: 1px solid #e0e0e0;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
 }
 .card-border .header h2{
    font-size: 18px;
    margin-bottom: 15px;
 }
</style>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>{{$data['header']}}</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/blogs')}}">Blog</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">
                            <a href="{{url('admin/blogs/add')}}" class="btn btn-primary">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add Blog
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════
             SECTION 1 — Basic Details & SEO
        ══════════════════════════════════ --}}
        <div class="row clearfix">
          

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Section 1 — Basic Details &amp; SEO</h2>
                        </div>
                        <div class="body">

						  <form id="form-meta" method="post" autocomplete="off"    	  
                  onsubmit="return blogController.blogMetaUpdate(this, {{ isset($edit_data->id) ? $edit_data->id : 'null' }})"
                  enctype="multipart/form-data">
                @csrf
                            <div class="row clearfix">

                                <div class="col-sm-6">
                                    <label>Category<span class="required">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control" name="category">
                                            <option value="">Select Category</option>
                                            @if(!empty($categories))
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ (old('category', $edit_data->category ?? '')) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                              

                             

                                <div class="col-sm-6">
                                    <label>Author</label>
                                    <div class="form-group">
                                       	<select type="text" class="form-control" name="author" >
                                            <option value="">Select Author</option>
                                            @if($authors)
                                                @foreach($authors as $author)

                                                <option value="{{ $author->id}}" @if ($author->id== old('author'))
                                selected="selected"	
                                @else
                                {{ (isset($edit_data) && $edit_data->author ==$author->id ) ? "selected":"" }} @endif>{{ $author->name}}</option>
                                                @endforeach
                                                @endif
                                            

                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Title<span class="required">*</span></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="title"
                                               value="{{ old('title', $edit_data->title ?? '') }}"
                                               placeholder="Enter title">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Slug</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="slug"
                                               value="{{ old('slug', $edit_data->slug ?? '') }}"
                                               placeholder="Enter slug (e.g. my-blog-title)">
                                    </div>
                                </div>

                               

                                <div class="col-sm-6">
                                    <label>Meta Title</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="meta_title"
                                               value="{{ old('meta_title', $edit_data->meta_title ?? '') }}"
                                               placeholder="Enter meta title">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Meta Keywords</label>
                                    <div class="form-group">                                      
                                        <textarea rows="4" class="form-control no-resize" name="meta_keywords">{{ old('meta_keywords', $edit_data->meta_keywords ?? '') }}</textarea>

                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Meta Description</label>
                                    <div class="form-group">
                                       
                                    <textarea rows="4" class="form-control no-resize" name="meta_description">{{ old('meta_description', $edit_data->meta_description ?? '') }}</textarea>

                                    </div>
                                </div>
 
                               

                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">
                                        {{ isset($edit_data) ? 'Update' : 'Submit' }}
                                    </button>
                                </div>
                            </div>

							</form>
                        </div>
                    </div>
                </div>
           
        </div>

        {{-- ══════════════════════════════════
             SECTION 2 — About & Paragraphs
        ══════════════════════════════════ --}}
        <div class="row clearfix">
       

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Section 2 — About &amp; Paragraphs</h2>
                        </div>
                        <div class="body">
     <form id="form-about" method="post" autocomplete="off"
                
                  onsubmit="return blogController.blogUpdateAbout(this, {{ isset($edit_data->id) ? $edit_data->id : 'null' }})"
                  enctype="multipart/form-data">
                @csrf
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label>Heading</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="about_heading"
                                               value="{{ old('about_heading', $edit_data->about_heading ?? '') }}"
                                               placeholder="Enter heading">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>About Blog</label>
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize" name="about_blog">{{ old('about_blog', $edit_data->about_blog ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
  							<div class="row clearfix">
                        
                                  
                                
                                    @for($i = 1; $i <= 6; $i++)
                                    <div class="col-sm-12">
                                        <label>Paragraph {{ $i }}</label>
                                        <div class="form-group">
                                            <textarea rows="3" class="form-control no-resize" name="paragraph{{ $i }}">{{ old('paragraph'.$i, $edit_data->{'paragraph'.$i} ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    @endfor
                                
                            
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">
                                        {{ isset($edit_data) ? 'Update' : 'Submit' }}
                                    </button>
                                </div>
                            </div>

							</form>

                        </div>
                    </div>
                </div>
          
        </div>


	 
        <div class="row clearfix">
          

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Section 3 — Content</h2>
                        </div>
                        <div class="body">
                    <form id="form-contents" method="post" autocomplete="off"               
                  onsubmit="return blogController.blogUpdateContent(this, {{ isset($edit_data->id) ? $edit_data->id : 'null' }})"
                  enctype="multipart/form-data">
                @csrf
                            
                 <div class="row clearfix">                                

                    <div class="col-sm-6">
                        <label>Heading</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="heading" value="{{ old('heading', $edit_data->heading ?? '') }}" placeholder="Enter heading">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label>Blog Description</label>
                        <div class="form-group">
                            <textarea rows="4" class="form-control no-resize" name="blog_description">{{ old('blog_description', $edit_data->blog_description ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="row clearfix">
                                

                                <div class="col-sm-6">
                                    <label>Top Heading</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="top_heading"
                                               value="{{ old('top_heading', $edit_data->top_heading ?? '') }}"
                                               placeholder="Enter top heading">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Top Content</label>
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize" name="top_content">{{ old('top_content', $edit_data->top_content ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label>Bottom Heading</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="bottom_heading"
                                               value="{{ old('bottom_heading', $edit_data->bottom_heading ?? '') }}"
                                               placeholder="Enter bottom heading">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Bottom Content</label>
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize" name="bottom_content">{{ old('bottom_content', $edit_data->bottom_content ?? '') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Conclusion</label>
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize" name="conclusion">{{ old('conclusion', $edit_data->conclusion ?? '') }}</textarea>
                                    </div>
                                </div>




                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">
                                        {{ isset($edit_data) ? 'Update' : 'Submit' }}
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- ══════════════════════════════════
             SECTION 4 — Ratings & FAQs
        ══════════════════════════════════ --}}
        <div class="row clearfix">
           

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Section 4 — Ratings &amp; FAQs</h2>
                        </div>
                        <div class="body">

						 <form id="form-faq" method="post" autocomplete="off"
                   
                  onsubmit="return blogController.blogUpdateFaq(this, {{ isset($edit_data->id) ? $edit_data->id : 'null' }})"
                  enctype="multipart/form-data">
                @csrf
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label>Rating Value</label>
                                    <div class="form-group">
                                        @php
                                            $ratings = [1, 2, 3, 4, 4.5, 4.6, 4.75, 4.8, 4.9, 5];
                                        @endphp
                                        <select name="rating" class="form-control">
                                            <option value="">Select Rating</option>
                                            @foreach($ratings as $rating)
                                            <option value="{{ $rating }}"
                                                {{ old('rating', $edit_data->rating ?? '') == $rating ? 'selected' : '' }}>
                                                {{ $rating }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Rating Count</label>
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="total_rating"
                                               value="{{ old('total_rating', $edit_data->total_rating ?? '') }}"
                                               placeholder="Enter total rating count">
                                    </div>
                                </div>
                            </div>

                            <div class="card-border">
                                <div class="header"><h2>FAQs</h2></div>
                                @for($i = 1; $i <= 5; $i++)
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <label>Question {{ $i }}</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="faqq{{ $i }}"
                                                   value="{{ old('faqq'.$i, $edit_data->{'faqq'.$i} ?? '') }}"
                                                   placeholder="Enter Question {{ $i }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Answer {{ $i }}</label>
                                        <div class="form-group">
                                            <textarea rows="3" class="form-control no-resize" name="faqa{{ $i }}">{{ old('faqa'.$i, $edit_data->{'faqa'.$i} ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">
                                        {{ isset($edit_data) ? 'Update' : 'Submit' }}
                                    </button>
                                </div>
                            </div>

							</form>

                        </div>
                    </div>
                </div>
            
        </div>

        {{-- ══════════════════════════════════
             SECTION 5 — Banner & Image
        ══════════════════════════════════ --}}
        <div class="row clearfix">
           

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Section 5 — Banner, Image</h2>
                        </div>
                        <div class="body">
 <form id="form-image" method="post" autocomplete="off"              
                  onsubmit="return blogController.blogUpdateImage(this, {{ isset($edit_data->id) ? $edit_data->id : 'null' }})"
                  enctype="multipart/form-data">
                @csrf
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label>Banner Image</label>
                                    <div class="form-group">
                                        @if(isset($edit_data) && $edit_data->image_banner != '')
                                            @php $banner = json_decode($edit_data->image_banner);
                                            
                                            
                                             @endphp
                                            <div>
                                                <img src="{{ asset('/'.$banner->image_banner->src) }}" style="max-width:100px;" height="100" width="100">
                                                <a href="{{ url('admin/blogs/del_icon/'.$edit_data->id.'/image_banner') }}" class="btn btn-inverse btn-circle m-b-5 deleteIcon"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                <input type="hidden" name="image_banner" value="{{ $edit_data->image_banner }}">
                                            </div>
                                        @else
                                            <input type="file" dir="auto" name="image_banner" accept=".jpeg,.jpg,.png,.svg,.webp">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Image</label>
                                    <div class="form-group">
                                        @if(isset($edit_data) && $edit_data->blog_image != '')
                                            @php $vicons = json_decode($edit_data->blog_image); @endphp
                                            <div>
                                                <img src="{{ asset('/'.$vicons->blog_image->src) }}" style="max-width:100px;" height="100" width="100">
                                                <a href="{{ url('admin/blogs/del_icon/'.$edit_data->id.'/blog_image') }}" class="btn btn-inverse btn-circle m-b-5 deleteIcon"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                <input type="hidden" name="blog_image" value="{{ $edit_data->blog_image }}">
                                            </div>
                                        @else
                                            <input type="file" dir="auto" name="blog_image" accept=".jpeg,.jpg,.png,.svg,.webp">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">
                                        {{ isset($edit_data) ? 'Update' : 'Submit' }}
                                    </button>
                                </div>
                            </div>
</form>
                        </div>
                    </div>
                </div>
             
        </div>

    </div>
</div>

{{-- Bootstrap modal used by blogController.js for success/error messages --}}
<div class="modal fade" id="messagemodel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>

<script src="{{asset('admin/assets/vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('admin/assets/js/blogController.js')}}"></script>
<script>
if (document.getElementById('ckeditor')) {
    CKEDITOR.replace('ckeditor');
    CKEDITOR.config.height = 300;
}
</script>

@endsection