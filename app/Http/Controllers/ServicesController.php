<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::paginate(6);

        return view('services.index', [
            'services' => $services
        ]);
    }

    public function show($id)
    {
        $service = Service::find($id);
        $latestPosts = News::take(3)->get();

        return view('services.show', [
            'service' => $service,
            'latestPosts' => $latestPosts
        ]);
    }
}
