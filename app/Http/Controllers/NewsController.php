<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(4);
        if (request()->ajax()) {
            return view('news.partials.news-list', compact('news'))->render();
        }
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }

    public function adminIndex()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $news = new News();
        $news->name = $request->title;
        $news->description = $request->description;
        $news->author = auth()->user()->login;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('/images/news', 'public');
            $news->image = str_replace('public/', '', $path);
        }

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Новость добавлена');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $news = News::findOrFail($id);
        $news->name = $request->title;
        $news->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('/images/news', 'public');
            $news->image = str_replace('public/', '', $path);
        }

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Новость обновлена');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Новость удалена');
    }
}