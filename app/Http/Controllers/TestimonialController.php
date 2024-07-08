<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function testimonialIndex(){
        $testimonials = Testimonial::orderBy('id', 'desc')->paginate(10);
        return view('admin.testimonial-index', compact('testimonials'));
    }

    public function createTestimonial(){
        return view('admin.testimonial-create');
    }

    public function storeTestimonial(Request $request){
        $rules = [
            'client_name' => 'required|string|max:255',
            'testimonial_text' => 'required|string',
            'client_designation' => 'nullable|string|max:255',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'added_date' => 'required|date',
            'priority' => 'required|integer|min:1',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            if ($request->hasFile('client_image')) {
                $image = $request->file('client_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/testimonials'), $imageName);
            } else {
                return redirect()->back()->with('error', 'Image file not found.');
            }

            $testimonial = new Testimonial();
            $testimonial->client_name = $request->input('client_name');
            $testimonial->testimonial_text = $request->input('testimonial_text');
            $testimonial->client_designation = $request->input('client_designation');
            $testimonial->added_date = $request->input('added_date');
            $testimonial->priority = $request->input('priority');
            $testimonial->client_image = $imageName;
            $testimonial->save();
            session()->flash('message', ['type' => 'success', 'content' => 'Testimonial created successfully!']);
            return redirect()->route('testimonial.index');
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response()->json([$e->getMessage()], 500);
        }
    }

    public function editTestimonial(Request $request, $id){
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial-edit', compact('testimonial'));
    }


    public function updateTestimonial(Request $request, $id)
    {
        try {
            $testimonial = Testimonial::find($id);

            $rules = [
                'client_name' => 'required|string|max:255',
                'testimonial_text' => 'required|string',
                'client_designation' => 'nullable|string|max:255',
                'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'added_date' => 'required|date',
                'priority' => 'required|integer|min:1',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Check if a new image file has been uploaded
            if ($request->hasFile('client_image')) {
                $image = $request->file('client_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/testimonials'), $imageName);
                $testimonial->logo = $imageName;
            }

            // Update other fields of testimonial
            $testimonial->client_name = $request->input('client_name');
            $testimonial->testimonial_text = $request->input('testimonial_text');
            $testimonial->client_designation = $request->input('client_designation');
            $testimonial->added_date = $request->input('added_date');
            $testimonial->priority = $request->input('priority');
            $testimonial->save();
            session()->flash('message', ['type' => 'success', 'content' => 'Testimonial updated successfully!']);
            return redirect()->route('testimonial.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Failed to update testimonial.']);
        }
    }



    public function deleteTestimonial($id){
        $testimonial = Testimonial::find($id);
        if ($testimonial->delete()) {
            session()->flash('message', ['type' => 'success', 'content' => 'Testimonial deleted successfully!']);
            return redirect()->route('$testimonial.index');
        } else {
            return redirect()->back()->with('success', 'Testimonial can not be deleted..!');
        }
    }
}
