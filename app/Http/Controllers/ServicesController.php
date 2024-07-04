<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function serviceIndex()
    {
        $services = Service::orderBy('id', 'desc')->paginate(10);
        return view('admin.service-index', compact('services'));
    }

    public function createService()
    {
        $categories = ServiceCategory::get();
        return view('admin.service-create', compact('categories'));
    }

    public function storeService(Request $request)
    {
        $rules = [
            'choose_category' => 'required|exists:service_categories,id',
            'service_title' => 'required|string|max:255',
            'service_short_desc' => 'required|string|max:255',
            'service_long_desc' => 'required|string',
            'service_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'priority' => 'required|integer|min:1',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $service = new Service();
            $service->service_category_id = $request->choose_category;
            $service->service_title = $request->service_title;
            $service->service_short_desc = $request->service_short_desc;
            $service->service_long_desc = $request->service_long_desc;
            if ($request->hasFile('service_image')) {
                $imageName = time() . '.' . $request->file('service_image')->extension();
                $request->file('service_image')->move(public_path('images/services'), $imageName);
                $service->service_image = $imageName;
            }
            $service->priority = $request->priority;
            $service->save();
            session()->flash('message', ['type' => 'success', 'content' => 'Service created successfully!']);
            return redirect()->route('service.index');
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json([$e->getMessage()], 500);
        }
    }

    public function editService($id)
    {
        $service = Service::find($id);
        $categories = ServiceCategory::get();
        if ($service) {
            return view('admin.service-edit', compact('service', 'categories'));
        } else {
            return redirect()->route('service.index');
        }
    }

    public function updateService(Request $request, $id)
    {
        $service = Service::find($id);
        if($service){
            try {
                $rules = [
                    'choose_category' => 'required|exists:service_categories,id',
                    'service_title' => 'required|string|max:255',
                    'service_short_desc' => 'required|string|max:255',
                    'service_long_desc' => 'required|string',
                    'service_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'priority' => 'required|integer|min:1',
                ];

                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $service->service_category_id = $request->choose_category;
                $service->service_title = $request->service_title;
                $service->service_short_desc = $request->service_short_desc;
                $service->service_long_desc = $request->service_long_desc;
                if ($request->hasFile('service-image')) {
                    $imageName = time() . '.' . $request->file('service-image')->extension();
                    $request->file('service-image')->move(public_path('images/services'), $imageName);
                    $service->service_image = $imageName;
                }

                $service->priority = $request->priority;
                $service->save();
                session()->flash('message', ['type' => 'success', 'content' => 'Service updated successfully!']);
                return redirect()->route('service.index');
            } catch (Exception $e) {
                Log::info($e->getMessage());
                return response()->json([$e->getMessage()], 500);
            }
        }else{
            return "Not found ID";
        }
    }

    public function deleteService($id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->delete();
            session()->flash('message', ['type' => 'success', 'content' => 'Service deleted successfully!']);
            return redirect()->route('service.index');
        } else {
            return redirect()->route('service.index')->with('error', 'Service not found.');
        }
    }
}
