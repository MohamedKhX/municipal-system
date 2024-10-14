<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Report;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $reports = Report::take(3)->get();
        $posts = News::take(3)->get();

        return view('main', [
            'reports' => $reports,
            'posts'   => $posts
        ]);
    }
}
