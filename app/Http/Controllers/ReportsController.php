<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index($municipalityId)
    {
        $reports = Report::where('municipality_id', $municipalityId)
            ->latest()
            ->paginate(6);

        return view('reports.index', [
            'reports' => $reports
        ]);
    }

    public function show($municipalityId, $id)
    {
        $report = Report::find($id);

        return view('reports.show', [
            'report' => $report,
        ]);
    }

    public function create($municipalityId)
    {
        return view('reports.create', [
            'municipalityId' => $municipalityId
        ]);
    }
}
