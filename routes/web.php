<?php

use Illuminate\Support\Facades\Route;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Illuminate\Support\Facades\Auth;



use App\Http\Controllers\Auth\LoginController;

 

Route::auth();	
Auth::routes(); 

Route::get('/login', [App\Http\Controllers\UserAuth\AuthController::class, 'UserLogin']);
Route::get('/logout', [App\Http\Controllers\UserAuth\AuthController::class, 'logout']);
Route::post('/login',[App\Http\Controllers\UserAuth\AuthController::class,'authenticate']);
Route::get('/register', [App\Http\Controllers\UserAuth\AuthController::class, 'UserLogin']);

Route::post('/register',[App\Http\Controllers\UserAuth\AuthController::class,'saveRegister']);



Route::get('/', [App\Http\Controllers\Site\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\Site\HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/portfolio', [App\Http\Controllers\Site\HomeController::class, 'Portfolio'])->name('portfolio');
Route::get('/contact-us', [App\Http\Controllers\Site\HomeController::class, 'Contact'])->name('contact-us');
 
Route::get('/support', [App\Http\Controllers\Site\HomeController::class, 'supports']);
Route::post('/dataSaveForm',[App\Http\Controllers\Site\ContactController::class, 'saveDataEnquiry']);



//Site Service
use App\Http\Controllers\Site\HomeController;
Route::get('/services', [App\Http\Controllers\Site\HomeController::class, 'Service'])->name('services.list');
Route::get('/services/{slug}', [App\Http\Controllers\Site\HomeController::class, 'serviceDetails'])->name('service.details');

Route::get('services/{slug}/{mslug}', [App\Http\Controllers\Site\HomeController::class, 'serviceChildDetails'])->name('child.details');

Route::get('/terms-conditions', [App\Http\Controllers\Site\HomeController::class, 'termsCondition'])->name('terms.conditions');
Route::get('/privacy-policy', [App\Http\Controllers\Site\HomeController::class, 'privacypolicy'])->name('privacy.policy');
Route::get('/copyright-policy', [App\Http\Controllers\Site\HomeController::class, 'copyrightpolicy'])->name('copyright.policy');
Route::get('/refund-policy', [App\Http\Controllers\Site\HomeController::class, 'refundPolicy'])->name('refund.policy');
Route::get('/careers', [App\Http\Controllers\Site\HomeController::class, 'careers'])->name('careers');
Route::get('/blog', [App\Http\Controllers\Site\HomeController::class, 'refundPolicy'])->name('blog.list');
Route::get('/blog/{slug}', [App\Http\Controllers\Site\HomeController::class, 'refundPolicy'])->name('blog.details');

Route::post('send-email', [App\Http\Controllers\Site\HomeController::class, 'sendEmail'])->name('send.email'); 
Route::post('/search/ajaxView',[App\Http\Controllers\Site\HomeController::class, 'ajaxView'] );
Route::post('/search/ajaxKeyword',[App\Http\Controllers\Site\HomeController::class, 'ajaxKeyword']);
Route::post('/search/getKeyword',[App\Http\Controllers\Site\HomeController::class, 'getKeyword']);
Route::get('/sitemap.xml', [App\Http\Controllers\Site\HomeController::class, 'sitemap']);


 
 
 
 
 
 
 //admin login
Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/admin/login',[App\Http\Controllers\Auth\LoginController::class,'authenticate']);
Route::get('/admin/logout', [App\Http\Controllers\Auth\LoginController::class,'adminLogout']); 
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->middleware('auth');

 

//users 
Route::get('/admin/users', [App\Http\Controllers\Admin\UsersController::class, 'index']);
Route::get('/admin/usersAdd/add', [App\Http\Controllers\Admin\UsersController::class, 'usersAdd']);
Route::post('/admin/saveUsers', [App\Http\Controllers\Admin\UsersController::class, 'saveUsers']);
Route::get('/admin/usersEdit/edit/{id}', [App\Http\Controllers\Admin\UsersController::class, 'Edit']);
Route::post('/admin/usersEditSave/{id}', [App\Http\Controllers\Admin\UsersController::class, 'usersEditSave']);
Route::get('/admin/users/status/{id}/{val}', [App\Http\Controllers\Admin\UsersController::class, 'status']);
Route::get('/admin/users/get-users', [App\Http\Controllers\Admin\UsersController::class, 'getUsersPagination']);
Route::get('/admin/users/delete/{id}', [App\Http\Controllers\Admin\UsersController::class, 'delete']);
//users




 
 //service Admin
 
Route::get('/admin/service', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->middleware('auth');
Route::get('/admin/serviceAdd/add', [App\Http\Controllers\Admin\ServiceController::class, 'serviceAdd'])->middleware('auth');
Route::post('/admin/serviceSave', [App\Http\Controllers\Admin\ServiceController::class, 'serviceSave'])->middleware('auth');
Route::get('/admin/servicesEdit/edit/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'Edit'])->middleware('auth');
Route::post('/admin/serviceEditSave/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'serviceEditSave'])->middleware('auth');
Route::get('/admin/service/status/{id}/{val}', [App\Http\Controllers\Admin\ServiceController::class, 'status'])->middleware('auth');
Route::get('/admin/service/get-service', [App\Http\Controllers\Admin\ServiceController::class, 'getServicePagination'])->middleware('auth');
Route::get('/admin/service/delete/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'delete'])->middleware('auth');
Route::get('/admin/service/del_icon/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'deleteImage'])->middleware('auth');




//Category
use App\Http\Controllers\Admin\CategoryController;
Route::get('/admin/category', [CategoryController::class, 'index'])->middleware('auth');
Route::get('/admin/categoryAdd/add', [CategoryController::class, 'categoryAdd'])->middleware('auth');
Route::post('/admin/categorySave', [CategoryController::class, 'categorySave'])->middleware('auth');
Route::get('/admin/categoryEdit/edit/{id}', [CategoryController::class, 'Edit'])->middleware('auth');
Route::post('/admin/categoryEditSave/{id}', [CategoryController::class, 'categoryEditSave'])->middleware('auth');
Route::get('/admin/category/status/{id}/{val}', [CategoryController::class, 'status'])->middleware('auth');
Route::get('/admin/category/get-category', [CategoryController::class, 'getcategoryPagination'])->middleware('auth');
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->middleware('auth');
Route::get('/admin/category/del_icon/{id}', [CategoryController::class, 'deleteImage'])->middleware('auth');


//homePage
use App\Http\Controllers\Admin\HomePageController;
Route::get('/admin/homePage', [HomePageController::class, 'index']);

Route::get('/admin/homePageEdit/edit/{id}', [HomePageController::class, 'Edit']);
Route::post('/admin/homePageEditSave/{id}', [HomePageController::class, 'homePageEditSave']);

Route::get('/admin/homePage/status/{id}/{val}', [HomePageController::class, 'status']);
Route::get('/admin/homePage/get-homePage', [HomePageController::class, 'getHomePagePagination']);
Route::get('/admin/homePage/del_icon/{id}', [HomePageController::class, 'deleteImage']);



//logo
use App\Http\Controllers\Admin\LogoController;
Route::get('/admin/logo', [LogoController::class, 'index']);
Route::get('/admin/logoAdd/add', [LogoController::class, 'logoAdd']);
//Route::post('/admin/logoSave', [LogoController::class, 'logoSave']);
Route::get('/admin/logoEdit/edit/{id}', [LogoController::class, 'Edit']);
Route::post('/admin/logoEditSave/{id}', [LogoController::class, 'logoEditSave']);

Route::get('/admin/logo/status/{id}/{val}', [LogoController::class, 'status']);
Route::get('/admin/logo/get-logo', [LogoController::class, 'getLogoPagination']);
Route::get('/admin/logo/del_icon/{id}', [LogoController::class, 'deleteImage']);



//
//sliders

use App\Http\Controllers\Admin\SlidersController;
Route::get('/admin/sliders', [SlidersController::class, 'index']);
Route::get('/admin/slidersAdd/add', [SlidersController::class, 'slidersAdd']);
Route::post('/admin/slidersSave', [SlidersController::class, 'slidersSave']);
Route::get('/admin/slidersEdit/edit/{id}', [SlidersController::class, 'Edit']);
Route::post('/admin/slidersEditSave/{id}', [SlidersController::class, 'slidersEditSave']);

Route::get('/admin/sliders/status/{id}/{val}', [SlidersController::class, 'status']);
Route::get('/admin/sliders/get-sliders', [SlidersController::class, 'getslidersPagination']);

Route::get('/admin/sliders/delete/{id}', [SlidersController::class, 'delete']);
Route::get('/admin/sliders/del_icon/{id}', [SlidersController::class, 'deleteImage']);

//
//sliders

use App\Http\Controllers\Admin\BlogsController;
Route::get('/admin/blogs', [BlogsController::class, 'index']);
Route::get('/admin/blogs/add', [BlogsController::class, 'create']);
Route::post('/admin/blogsSave', [BlogsController::class, 'saveBlog']);
Route::get('/admin/blogs/edit/{id}', [BlogsController::class, 'Edit']);
Route::post('/admin/blogsEditSave/{id}', [BlogsController::class, 'blogsEditSave']);

Route::get('/admin/blogs/status/{id}/{val}', [BlogsController::class, 'status']);
Route::get('/admin/blogs/get-blogs', [BlogsController::class, 'getblogsPagination']);

Route::get('/admin/blogs/delete/{id}', [BlogsController::class, 'delete']);
Route::get('/admin/blogs/del_icon/{id}', [BlogsController::class, 'deleteImage']);




Route::get('/admin/login', [LoginController::class, 'login'])->name('login');
Route::post('/admin/login',[LoginController::class,'authenticate']);
//->middleware('auth')
//Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard']);

 
 


Route::get('/cache', function() {
    
	$exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:clear');
    //$exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
	 $exitCode = Artisan::call('route:clear');
	  $exitCode = Artisan::call('view:clear');
    return '<h1>Cache facade value cleared cache from leads URL</h1>';
});
