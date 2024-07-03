<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\User;
use App\Models\Event;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $services = Service::get();
        $users = User::get();
        $sliders = Slider::get();
        $categories = ServiceCategory::get();
        $testimonials = Testimonial::get();
        $events = Event::get();
        $news = News::get();
        $services = Service::get();
        return view('admin.dashboard', compact('services', 'users', 'sliders', 'categories', 'testimonials', 'events', 'news'));
    }

    public function logout(request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
