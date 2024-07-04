<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ServiceCategoryController extends Controller
{
    public function categoryIndex(){
        $categories = ServiceCategory::orderBy('id', 'desc')->paginate(10);
        return view('admin.category-index', compact('categories'));
    }

    public function createCategory(){
        return view('admin.category-create');
    }


    public function storeCategory(Request $request)
    {
        try {
            $rules = [
                'category' => 'required|string|regex:/^[a-zA-Z]+$/|max:255',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $category = new ServiceCategory();
            $category->category_name = $request->category;
            $category->save();
            session()->flash('message', ['type' => 'success', 'content' => 'Category created successfully!']);
            return redirect()->route('category.index');
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json([$e->getMessage()], 500);
        }
    }


    public function editCategory($id){
        $category = ServiceCategory::find($id);
        return view('admin.category-edit', compact('category'));
    }


    public function updateCategory(Request $request, $id){
        $category = ServiceCategory::find($id);
        if ($category) {
            try {
                $rules = [
                    'category' => 'required|string|regex:/^[a-zA-Z]+$/|max:255',
                ];
                $validator = Validator::make($request->all(), $rules);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $category->category_name = $request->input('category');
                $category->save();
                session()->flash('message', ['type' => 'success', 'content' => 'Category updated successfully!']);
                return redirect()->route('category.index');
            } catch (Exception $e) {
                Log::info($e->getMessage());
                return response()->json([$e->getMessage()], 500);
            }
        }else{
            return redirect()->route('cateory.index')->with('success', 'Id not found.');
        }
    }


    public function deleteCategory($id){
        $category = ServiceCategory::find($id);
        if ($category->delete()) {
            session()->flash('message', ['type' => 'success', 'content' => 'Category deleted successfully!']);
            return redirect()->route('category.index');
        } else {
            return redirect()->back()->with('success', 'Category can not be deleted..!');
        }
    }

}
