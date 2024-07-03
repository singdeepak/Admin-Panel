<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function newsIndex()
    {
        $news = News::orderBy('id', 'desc')->paginate(10);
        return view('admin.news-index', compact('news'));
    }

    public function createNews()
    {
        return view('admin.news-create');
    }

    public function storeNews(Request $request)
    {
        try {
            $rules = [
                'news_title' => 'required|string|max:255',
                'news_short_desc' => 'required|string',
                'priority' => 'required|numeric',
                'news_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator) {
                return redirect()->back()->withErrors($validator->errors());
            }

            if ($request->hasFile('news_image')) {
                $image = $request->file('news_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/news'), $imageName);
            } else {
                return redirect()->back()->with('error', 'Image file not found.');
            }

            // Create a new News
            $news = new News();
            $news->news_title = $request->input('news_title');
            $news->news_short_desc = $request->input('news_short_desc');
            $news->priority = $request->input('priority');
            $news->news_image = $imageName;
            $news->save();

            return redirect()->route('news.index')->with('success', 'News created successfully.');
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json([$e->getMessage()], 500);
        }
    }

    public function editNews($id)
    {
        $news = News::find($id);
        return view('admin.news-edit', compact('news'));
    }

    public function updateNews(Request $request, $id)
    {
        $news = News::find($id);
        if ($news) {
            try {
                $rules = [
                    'news_title' => 'required|string|max:255',
                    'news_short_desc' => 'required|string',
                    'priority' => 'required|numeric',
                    'news_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator) {
                    return redirect()->back()->withErrors($validator->errors());
                }

                if ($request->hasFile('news_image')) {
                    $image = $request->file('news_image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/news'), $imageName);
                } else {
                    return redirect()->back()->with('error', 'Image file not found.');
                }

                // Update a News
                $news->news_title = $request->input('news_title');
                $news->news_short_desc = $request->input('news_short_desc');
                $news->priority = $request->input('priority');
                $news->news_image = $imageName;
                $news->save();

                return redirect()->route('news.index')->with('success', 'News updated successfully.');
            } catch (Exception $e) {
                Log::info($e->getMessage());
                return response()->json([$e->getMessage()], 500);
            }
        } else {
            return redirect()->route('news.index')->with('success', 'Id not found.');
        }
    }

    public function deleteNews($id)
    {
        $news = News::find($id);
        if ($news->delete()) {
            return redirect()->route('news.index')->with('success', 'News deleted successfully..!');
        } else {
            return redirect()->back()->with('success', 'News can not be deleted..!');
        }
    }
}