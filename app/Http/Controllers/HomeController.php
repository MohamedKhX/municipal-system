<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use App\Models\News;
use App\Models\Report;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home($municipality = null)
    {
        $municipality = getCurrentMunicipality();

        $reports = Report::where('municipality_id', $municipality)
            ->take(3)
            ->get();

        $services = Service::where('municipality_id', $municipality)
            ->take(3)
            ->get();

        $posts = News::where('municipality_id', $municipality)
            ->take(3)
            ->get();

        $reportsLocation =  Report::all();

        return view('main', [
            'reports' => $reports,
            'posts'   => $posts,
            'reportsLocation' => $reportsLocation,
            'services' => $services,
            'municipalityId' => $municipality
        ]);
    }
}
