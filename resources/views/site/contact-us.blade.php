@extends('site.layouts.app')
@section('title')
Contact WebSolutionTechnology | Get Expert Software & Web Solutions @endsection 
@section('keyword')
contact websolutiontechnology, software company contact, website development inquiry, IT solutions support, web development consultation, software services contact, digital solutions company @endsection
@section('description')
Connect with WebSolutionTechnology for professional software development, website design, mobile app development, and IT solutions. Our experts are ready to help transform your ideas into successful digital solutions. @endsection
@section('content')
      <section class="page-title-section bg-img cover-background mx-lg-1-6 mx-xl-2-5 mx-xxl-2-9 left-overlay-dark" data-overlay-dark="8" data-background="img/banner/page-title.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="position-relative">
                            <h1>Contact Us</h1>
                        </div>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="#!">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="line-animated">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </section>

        <!-- CONTACT INFO
        ================================================== -->
        <section>
            <div class="container">
                <div class="row mt-n1-9">
                    <div class="col-md-6 col-xl-4 mt-1-9 wow fadeIn" data-wow-delay="200ms">
                        <div class="card-style-02 h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="card-icon">
                                        <i class="ti-mobile text-primary display-20"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3 ms-lg-4">
                                    <h3 class="h5">Phone Number</h3>
                                    <p class="mb-0">(+91) 93183 45497</p>
                                    <!--<p class="mb-0">(+1) 234-567-9874</p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-1-9 wow fadeIn" data-wow-delay="400ms">
                        <div class="card-style-02 h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="card-icon">
                                        <i class="ti-location-pin text-primary display-20"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3 ms-lg-4">
                                    <h3 class="h5">Location</h3>
                                    <p class="mb-0 w-lg-80"><img src="{{asset('site/img/india.webp')}}" alt="india"width="50"> G-13, Noida Sector 3, Noida, Uttar Pradesh 201301</p>
                                     <p class="mb-0 w-lg-80"><img src="{{asset('site/img/USA.webp')}}" alt="india"width="50"> Casanova Drive, Virginia Beach, VA 23454, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-1-9 wow fadeIn" data-wow-delay="600ms">
                        <div class="card-style-02 h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="card-icon">
                                        <i class="ti-email text-primary display-20"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3 ms-lg-4">
                                    <h3 class="h5">Email Address</h3>
                                    <p class="mb-0">info@websolutiontechnology.com</p>
                                     <p class="mb-0">websolutiontechnology19@gmail.com</p>
                                    
                                    

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CONTACT FORM
        ================================================== -->
        <section class="p-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 mb-1-6 mb-xl-0 wow fadeIn" data-wow-delay="200ms">
                        <div class="pe-xl-1-9">
                            <div class="section-title left mb-1-9">
                                <span class="sm-title">Contact Us</span>
                                <h2 class="mb-0 h1 mt-2">Write Us Any Message</h2>
                            </div>
                            <p class="mb-1-9">These are the phrases we stay via way of means of in the whole lot we do. Each brand we build, and we create.</p>
                            <ul class="social-icon-style3 ps-0">
                                <li class="me-1"><a href="https://www.facebook.com/profile.php?id=61574109399709"target="_blank"><i class="fab fa-facebook-f" ></i></a></li>
                                <li class="me-1"><a href="https://x.com/websolutiontechnology" target="_blank"><i class="fab fa-twitter" ></i></a></li>
                                <li class="me-1"><a href="https://www.instagram.com/websolutiontechnology/"  target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li class="me-0"><a href="https://www.linkedin.com/in/code-kredit/"  target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-7 wow fadeIn register_form" data-wow-delay="400ms">
                       <form action="" method="post" onsubmit="return contactController.dataSaveForm(this)" autocomplete="off">
                                <div class="quform-elements">
                                    <div class="row">

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="name">Your Name <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control"  type="text" name="name" placeholder="Your name here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="email">Your Email <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" type="text" name="email" placeholder="Your email here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                       

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="phone">Contact Number</label>
                                                <div class="quform-input">
                                                    <input class="form-control"  type="text" name="mobile" maxlength="16"  onkeypress="return isNumericKeyCheck(event);"  placeholder="Your phone here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->
										
										 <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="subject">Service <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <select class="form-control" name="service">
														<option value="">Select Service </option>
														<option value="Digital Marketing">Digital Marketing</option>
														<option value="Social Marketing">Social Marketing</option>
														<option value="Content Marketing">Content Marketing</option>
														<option value="E-mail Marketing">E-mail Marketing</option>
													</select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Textarea element -->
                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="message">Message <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <textarea class="form-control"  name="message" rows="3" placeholder="Tell us a few words"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Textarea element -->

                                       
<style>
.resetData{
	display:none;
}
	.help-block{
		color:red;
	}
	.close{	 
    float: right;
}
</style>

                                        <!-- Begin Submit button -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
													<input type="reset" class="resetData">	 
                                                <button class="btn-style1 border-0" type="submit"  name="submit"><span>Send Message</span></button>
                                            </div>
                                            <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                                        </div>
                                        <!-- End Submit button -->

                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </section>
<div id="successMessage" class="modal fade" role="dialog" data-backdrop="static">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
<div class="imgclass"></div>
<h3 style="text-align: center; font-size: 21px; font-weight: 600; margin-top: 16px;">Thank you for reaching out to us.</h3>
<div class="successhtml"></div>
<div class="failedhtml"></div>
</div>
</div>
</div>
</div>
        <!-- MAP
        ================================================== -->
        <section class="pb-0">
            <div class="container-fuild">
                <iframe class="contact-map" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7007.273018368754!2d77.31363668868714!3d28.58067590277195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce45a2fec4393%3A0xaa5938d112af449e!2sNoida%20Sector%203%2C%20Noida%2C%20Uttar%20Pradesh%20201301!5e0!3m2!1sen!2sin!4v1744873907970!5m2!1sen!2sin"></iframe>
            </div>
        </section>
	@endsection