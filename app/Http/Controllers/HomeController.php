<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Report;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $reports = Report::take(3)->get();
        $services = Service::take(3)->get();
        $posts = News::take(3)->get();

        $reportsLocation =  Report::all();

        return view('main', [
            'reports' => $reports,
            'posts'   => $posts,
            'reportsLocation' => $reportsLocation,
            'services' => $services
        ]);
    }
}
