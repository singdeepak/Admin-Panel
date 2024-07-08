<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Event;
use App\Models\Slider;
use App\Models\Business;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){
        $sliders = Slider::get();
        $business = Business::get();
        $newses = News::get();
        $testimonials = Testimonial::limit(4)->get();
        $events = Event::get();
        return view('index', compact('sliders', 'business', 'newses', 'testimonials', 'events'));
    }
}
