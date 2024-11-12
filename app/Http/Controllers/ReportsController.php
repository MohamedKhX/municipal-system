<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $reports = Report::latest()->paginate(6);

        return view('reports.index', [
            'reports' => $reports
        ]);
    }

    public function show($id)
    {
        $report = Report::find($id);

        return view('reports.show', [
            'report' => $report,
        ]);
    }

    public function create()
    {
        return view('reports.create');
    }
}
