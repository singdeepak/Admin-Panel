<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function pageIndex()
    {
        $pages = Page::orderBy('id', 'desc')->paginate(10);
        return view('admin.page-index', compact('pages'));
    }

    public function createPage()
    {
        return view('admin.page-create');
    }

    public function storePage(Request $request)
    {
        $rules = [
            'page_title' => 'required|string|max:255',
            'page_desc' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            if ($request->hasFile('banner_image')) {
                $image = $request->file('banner_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/pages'), $imageName);
            } else {
                return redirect()->back()->with('error', 'Image file not found.');
            }

            $page = new Page();
            $page->page_title = $request->input('page_title');
            $page->page_desc = $request->input('page_desc');
            $page->banner_image = $request->input('banner_image');
            $page->banner_image = $imageName;
            $page->save();
            session()->flash('message', ['type' => 'success', 'content' => 'Page created successfully!']);
            return redirect()->route('page.index');
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json([$e->getMessage()], 500);
        }
    }

    public function editPage($id)
    {
        $page = Page::find($id);
        return view('admin.page-edit', compact('page'));
    }


    public function updatePage(Request $request, $id)
    {
        $page = Page::find($id);
        if ($page) {
            try {
                $rules = [
                    'page_title' => 'required|string|max:255',
                    'page_desc' => 'required|string|max:255',
                    'banner_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                if ($request->hasFile('banner_image')) {
                    $image = $request->file('banner_image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/pages'), $imageName);
                    $page->banner_image = $imageName;
                }

                $page->page_title = $request->input('page_title');
                $page->page_desc = $request->input('page_desc');
                $page->save();
                session()->flash('message', ['type' => 'success', 'content' => 'Page updated successfully!']);
                return redirect()->route('page.index');
            } catch (Exception $e) {
                Log::info($e->getMessage());
                return response()->json([$e->getMessage()], 500);
            }
        } else {
            return redirect()->route('page.index')->with('success', 'Id not found.');
        }
    }

    public function deletePage($id)
    {
        $page = Page::find($id);
        if ($page->delete()) {
            session()->flash('message', ['type' => 'success', 'content' => 'Page deleted successfully!']);
            return redirect()->route('page.index');
        } else {
            return redirect()->back()->with('success', 'Page can not be deleted..!');
        }
    }

    public function socialActivity($id){
        $social = Page::find($id);
        return view('social-page-details', compact('social'));
    }

    public function educationalActivity($id){
        $educational = Page::find($id);
        return view('educational-page-details', compact('educational'));
    }

    public function artsActivity($id){
        $arts = Page::find($id);
        return view('arts-page-details', compact('arts'));
    }

    public function otherActivity($id){
        $other = Page::find($id);
        return view('other-page-details', compact('other'));
    }
}
