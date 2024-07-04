<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function sliderIndex(){
        $sliders = Slider::orderBy('id', 'desc')->paginate(10);
        return view('admin.slider-index', compact('sliders'));
    }

    public function createSlider(){
        return view('admin.slider-create');
    }

    public function storeSlider(Request $request){
        $rules = [
            'slider-heading' => 'required|string|max:255',
            'slider-sub-heading' => 'required|string|max:255',
            'slider-link' => 'nullable|url|max:255',
            'slider-image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            if ($request->hasFile('slider-image')) {
                $image = $request->file('slider-image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/sliders'), $imageName);
            } else {
                return redirect()->back()->with('error', 'Image file not found.');
            }

            $slider = new Slider();
            $slider->slider_heading = $request->input('slider-heading');
            $slider->slider_sub_heading = $request->input('slider-sub-heading');
            $slider->slider_link = $request->input('slider-link');
            $slider->slider_image = $imageName;
            $slider->save();
            session()->flash('message', ['type' => 'success', 'content' => 'Slider created successfully!']);
            return redirect()->route('slider.index');
       }catch(Exception $e){
        Log::info($e->getMessage());
        return response()->json([$e->getMessage()], 500);
       }
    }

    public function editSlider($id){
        $slider = Slider::find($id);
        return view('admin.slider-edit', compact('slider'));
    }

    public function updateSlider(Request $request, $id){
        $slider = Slider::find($id);
        if($slider){
            try {
                $rules = [
                    'slider-heading' => 'required|string|max:255',
                    'slider-sub-heading' => 'required|string|max:255',
                    'slider-link' => 'nullable|url|max:255',
                    'slider-image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
                $validator = Validator::make($request->all(), $rules);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // Handle the file upload
                if ($request->hasFile('slider-image')) {
                    $image = $request->file('slider-image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/sliders'), $imageName);
                } else {
                    return redirect()->back()->with('error', 'Image file not found.');
                }

                // Create a new slider
                $slider->slider_heading = $request->input('slider-heading');
                $slider->slider_sub_heading = $request->input('slider-sub-heading');
                $slider->slider_link = $request->input('slider-link');
                $slider->slider_image = $imageName;
                $slider->save();
                session()->flash('message', ['type' => 'success', 'content' => 'Slider updated successfully!']);
                return redirect()->route('slider.index');
            } catch (Exception $e) {
                Log::info($e->getMessage());
                return response()->json([$e->getMessage()], 500);
            }
        }else{
            return redirect()->route('slider.index')->with('success', 'Id not found.');

        }
    }

    public function deleteSlider($id){
        $slider = Slider::find($id);
        if($slider->delete()){
            session()->flash('message', ['type' => 'success', 'content' => 'Slider deleted successfully!']);
            return redirect()->route('slider.index');
        }else{
            return redirect()->back()->with('success', 'Slider can not be deleted..!');
        }
    }
}
