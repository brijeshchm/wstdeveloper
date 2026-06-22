@extends('site.layouts.appError')
@section('title')
Page not found @endsection 
@section('keyword')
Page not found @endsection
@section('description')
Page not found @endsection
@section('content')
      

 <section class="page-title-section bg-img cover-background mx-lg-1-6 mx-xl-2-5 mx-xxl-2-9 left-overlay-dark" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="position-relative">
                            <h1>Page not found</h1>
                            <p>This page has been permanently removed.</p>
                        </div>
                    <a href="{{url('/')}}">Home</a>
                             
                        
                    </div>
                </div>
            </div>
             
        </section>
	@endsection