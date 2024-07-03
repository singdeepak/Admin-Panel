<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ServiceCategoryController;

Route::get('admin', function () {
    return view('admin.index');
});

Route::middleware(['admin_guest'])->group(function() {
    Route::get('admin', [LoginController::class, 'showAdminLoginPage'])->name('admin.login');
    Route::post('admin/login', [LoginController::class, 'loginAdmin'])->name('admin.store');
});


Route::middleware(['admin_auth'])->group(function() {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');
});


// Account Routes
Route::get('user/edit/{$id}', [AccountController::class, 'editAccount'])->name('user.edit');
Route::put('user/update', [AccountController::class, 'updateAccount'])->name('user.update');


// Slider Routes
Route::get('sliders', [SliderController::class, 'sliderIndex'])->name('slider.index');
Route::get('slider', [SliderController::class, 'createSlider'])->name('slider.create');
Route::post('slider/create', [SliderController::class, 'storeSlider'])->name('slider.store');
Route::get('slider/edit/{id}', [SliderController::class, 'editSlider'])->name('slider.edit');
Route::put('slider/update/{id}', [SliderController::class, 'updateSlider'])->name('slider.update');
Route::delete('slider/delete/{id}', [SliderController::class, 'deleteSlider'])->name('slider.delete');


// Category Routes
Route::get('categories', [ServiceCategoryController::class, 'categoryIndex'])->name('category.index');
Route::get('category', [ServiceCategoryController::class, 'createCategory'])->name('category.create');
Route::post('category/create', [ServiceCategoryController::class, 'storeCategory'])->name('category.store');
Route::get('category/edit/{id}', [ServiceCategoryController::class, 'editCategory'])->name('category.edit');
Route::put('category/update/{id}', [ServiceCategoryController::class, 'updateCategory'])->name('category.update');
Route::delete('category/delete/{id}', [ServiceCategoryController::class, 'deleteCategory'])->name('category.delete');



// Service Routes
Route::get('services', [ServicesController::class, 'serviceIndex'])->name('service.index');
Route::get('service', [ServicesController::class, 'createService'])->name('service.create');
Route::post('service/create', [ServicesController::class, 'storeService'])->name('service.store');
Route::get('service/edit/{id}', [ServicesController::class, 'editService'])->name('service.edit');
Route::put('service/update/{id}', [ServicesController::class, 'updateService'])->name('service.update');
Route::delete('service/delete/{id}', [ServicesController::class, 'deleteService'])->name('service.delete');


// Testimonials Routes
Route::get('testimonials', [TestimonialController::class, 'testimonialIndex'])->name('testimonial.index');
Route::get('testimonial', [TestimonialController::class, 'createTestimonial'])->name('testimonial.create');
Route::post('testimonial/create', [TestimonialController::class, 'storeTestimonial'])->name('testimonial.store');
Route::get('testimonial/edit/{id}', [TestimonialController::class, 'editTestimonial'])->name('testimonial.edit');
Route::put('testimonial/update/{id}', [TestimonialController::class, 'updateTestimonial'])->name('testimonial.update');
Route::delete('testimonial/delete/{id}', [TestimonialController::class, 'deleteTestimonial'])->name('testimonial.delete');


// Business Routes
Route::get('businesses', [BusinessController::class, 'buisnessIndex'])->name('business.index');
Route::get('business', [BusinessController::class, 'createBusiness'])->name('business.create');
Route::post('business/create', [BusinessController::class, 'storeBusiness'])->name('business.store');
Route::get('business/edit/{id}', [BusinessController::class, 'editBusiness'])->name('business.edit');
Route::put('business/update/{id}', [BusinessController::class, 'updateBusiness'])->name('business.update');
Route::delete('business/delete/{id}', [BusinessController::class, 'deleteBusiness'])->name('business.delete');



// Event Routes
Route::get('events', [EventController::class, 'eventIndex'])->name('event.index');
Route::get('event', [EventController::class, 'createEvent'])->name('event.create');
Route::post('event/create', [EventController::class, 'storeEvent'])->name('event.store');
Route::get('event/edit/{id}', [EventController::class, 'editEvent'])->name('event.edit');
Route::put('event/update/{id}', [EventController::class, 'updateEvent'])->name('event.update');
Route::delete('event/delete/{id}', [EventController::class, 'deleteEvent'])->name('event.delete');


// News Routes
Route::get('newses', [NewsController::class, 'newsIndex'])->name('news.index');
Route::get('news', [NewsController::class, 'createNews'])->name('news.create');
Route::post('news/create', [NewsController::class, 'storeNews'])->name('news.store');
Route::get('news/edit/{id}', [NewsController::class, 'editNews'])->name('news.edit');
Route::put('news/update/{id}', [NewsController::class, 'updateNews'])->name('news.update');
Route::delete('news/delete/{id}', [NewsController::class, 'deleteNews'])->name('news.delete');


