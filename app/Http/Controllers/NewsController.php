<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(6);

        return view('news.index', [
            'news' => $news
        ]);
    }

    public function show($id)
    {
        $post = News::find($id);
        $latestPosts = News::take(3)->get();

        return view('news.show', [
            'post' => $post,
            'latestPosts' => $latestPosts
        ]);
    }
}
