<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = News::orderBy('created_at', 'desc')->get();
        return response()->json($news);
    }

    public function show($id) {
        $news = News::findOrFail($id);
        return response()->json($news);
    }
}
