<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index($municipalityId)
    {
        $services = Service::where('municipality_id', $municipalityId)
            ->paginate(6);

        return view('services.index', [
            'services' => $services
        ]);
    }

    public function show($municipalityId, $id)
    {
        $service = Service::find($id);

        $latestPosts = News::where('municipality_id',$municipalityId)
            ->take(3)
            ->get();

        return view('services.show', [
            'service' => $service,
            'latestPosts' => $latestPosts
        ]);
    }
}
