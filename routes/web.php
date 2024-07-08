<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestimonialController;

Route::get('/', [AppController::class, 'index']);

Route::get('news/list', [NewsController::class, 'newsPage'])->name('news');
Route::get('news/details/{id}', [NewsController::class, 'newsDetails'])->name('news.details');
Route::get('contact/details', [BusinessController::class, 'contact'])->name('contact');
Route::get('about/details', [BusinessController::class, 'about'])->name('about');
Route::get('events/list', [EventController::class, 'eventPage'])->name('events');
Route::get('event/details/{id}', [EventController::class, 'eventDetails'])->name('event.details');
Route::get('testimonials', [TestimonialController::class, 'testmonialPage'])->name('testimonial');

Route::get('social/page/details/{id}', [PageController::class, 'socialActivity'])->name('social-page');
Route::get('educational/page/details/{id}', [PageController::class, 'educationalActivity'])->name('educational-page');
Route::get('arts/page/details/{id}', [PageController::class, 'artsActivity'])->name('arts-page');
Route::get('other/page/details/{id}', [PageController::class, 'otherActivity'])->name('other-page');

require __DIR__.'/admin.php';
