<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdminController, UserController, CommonController, UserLoginController, RoleController, CategoryController, SliderController, PagesController, SocialMediaController, GeneralSettingController, TestimonialController, AboutController};

//@include_once('admin_web.php');

Route::get('/migrate', function(){
    \Artisan::call('migrate');
    dd('migrated!');
});

Route::post('/userLogin', [UserLoginController::class, 'userLogin'])->name('userLogin');

/*forgot password*/
Route::get('forgotPassword', [AdminController::class, 'forgotPassword'])->name('forgotPassword');

/*reset password*/
Route::post('/reset-pws', [UserLoginController::class,'reset_pws'])->name('reset-pws');

/*reset password get token*/
Route::get('reset-password-get/{token?}', [UserLoginController::class, 'resetPasswordGet'])->name('reset.password.get');

/*reset password send*/
Route::post('reset-password-post', [UserLoginController::class, 'resetPasswordPost'])->name('reset.password.post');

Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function (){

    Route::get('change-password',[CommonController::class,'changePassword'])->name('change-password');

    Route::post('change-password-post',[CommonController::class,'changePasswordPost'])->name('change-password-post');
    
    Route::get('/', [UserLoginController::class, 'index']);
    
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    /*change status*/
    Route::post('change-status',[CommonController::class,'changeStatus'])->name('change-status');

    /*change-position*/
    Route::post('change-position',[CommonController::class,'changePosition'])->name('change-position');

    /*change-position*/
    Route::get('clear',[CommonController::class,'cacheClearGet'])->name('clear');
    Route::get('clear-post',[CommonController::class,'cacheClearpost'])->name('clear-post');
    
    Route::resource('user', UserController::class);
    
    Route::resource('roles', RoleController::class);

    /*category*/
    Route::resource('category', CategoryController::class);
    Route::get('get-category-info/{id}', [CategoryController::class, 'getModelLog'])->name('category.model-log');
    Route::get('child-category/{id}',[CategoryController::class, 'getChildById'])->name('child-category');


    /*slider*/
    Route::resource('slider', SliderController::class);
    Route::get('get-slider-info/{id}', [SliderController::class, 'getModelLog'])->name('slider.model-log');

    /*testimonial*/
    Route::resource('testimonial', TestimonialController::class);
    Route::get('get-testimonial-info/{id}', [TestimonialController::class, 'getModelLog'])->name('testimonial.model-log');

    /*pages*/
    Route::resource('pages', PagesController::class);
    Route::get('get-pages-info/{id}', [PagesController::class, 'getModelLog'])->name('pages.model-log');
    Route::get('page-image-delete/{id}', [PagesController::class, 'pageImageDelete'])->name('page-image-delete');

    /*social-media*/
    Route::resource('social-media', SocialMediaController::class);

    /*about*/
    Route::resource('about', AboutController::class);

    /*general setting*/
    Route::resource('general-setting', GeneralSettingController::class);
});
