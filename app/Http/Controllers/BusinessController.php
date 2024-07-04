<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    public function buisnessIndex()
    {
        $businesses = Business::orderBy('id', 'desc')->paginate(10);
        return view('admin.business-index', compact('businesses'));
    }

    public function createBusiness()
    {
        return view('admin.business-create');
    }

    public function storeBusiness(Request $request)
    {
        try {
            $rules = [
                'business_name' => 'required|string|max:255',
                'about_info' => 'required|string|max:2000',
                'contact' => 'required|string|max:255',
                'address' => 'required|string|max:500',
                'email_id' => 'required|email|max:255',
                'website' => 'nullable|url|max:255',
                'anchor' => 'nullable|string|max:255',
                'facebook' => 'nullable|url|max:255',
                'youtube' => 'nullable|url|max:255',
                'instagram' => 'nullable|url|max:255',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];

            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Handle the file upload
            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/logo'), $imageName);
            } else {
                return redirect()->back()->with('error', 'Image file not found.');
            }

            // Create a new business
            $business = new Business();
            $business->business_name = $request->input('business_name');
            $business->about_info = $request->input('about_info');
            $business->contact = $request->input('contact');
            $business->address = $request->input('address');
            $business->email_id = $request->input('email_id');
            $business->website = $request->input('website');
            $business->anchor = $request->input('anchor');
            $business->facebook = $request->input('facebook');
            $business->youtube = $request->input('youtube');
            $business->instagram = $request->input('instagram');
            $business->logo = $imageName;
            $business->save();
            session()->flash('message', ['type' => 'success', 'content' => 'Business created successfully!']);
            return redirect()->route('business.index');
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json([$e->getMessage()], 500);
        }
    }

    public function editbusiness($id)
    {
        $business = Business::find($id);
        return view('admin.business-edit', compact('business'));
    }

    public function updateBusiness(Request $request, $id)
    {
        $business = Business::find($id);
        if ($business) {
            try {
                $rules = [
                    'business_name' => 'required|string|max:255',
                    'about_info' => 'required|string|max:2000',
                    'contact' => 'required|string|max:255',
                    'address' => 'required|string|max:500',
                    'email_id' => 'required|email|max:255',
                    'website' => 'nullable|url|max:255',
                    'anchor' => 'nullable|string|max:255',
                    'facebook' => 'nullable|url|max:255',
                    'youtube' => 'nullable|url|max:255',
                    'instagram' => 'nullable|url|max:255',
                    'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                ];

                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                if ($request->hasFile('logo')) {
                    $image = $request->file('logo');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/logo'), $imageName);
                } else {
                    return redirect()->back()->with('error', 'Image file not found.');
                }

                $business->business_name = $request->input('business_name');
                $business->about_info = $request->input('about_info');
                $business->contact = $request->input('contact');
                $business->address = $request->input('address');
                $business->email_id = $request->input('email_id');
                $business->website = $request->input('website');
                $business->anchor = $request->input('anchor');
                $business->facebook = $request->input('facebook');
                $business->youtube = $request->input('youtube');
                $business->instagram = $request->input('instagram');
                $business->logo = $imageName;
                $business->save();
                session()->flash('message', ['type' => 'success', 'content' => 'Business updated successfully!']);
                return redirect()->route('business.index');
            } catch (Exception $e) {
                Log::info($e->getMessage());
                return response()->json([$e->getMessage()], 500);
            }
        } else {
            return redirect()->route('business.index')->with('success', 'Id not found.');
        }
    }

    public function deleteBusiness($id)
    {
        $business = Business::find($id);
        if ($business->delete()) {
            session()->flash('message', ['type' => 'success', 'content' => 'Business deleted successfully!']);
            return redirect()->route('business.index');
        } else {
            return redirect()->back()->with('success', 'business can not be deleted..!');
        }
    }
}
