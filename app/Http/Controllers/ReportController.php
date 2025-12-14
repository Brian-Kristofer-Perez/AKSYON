<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    private $reportService;

    function __construct(ReportService $reportService) {
        $this->reportService = $reportService;
    }

    function myReports() {
        $currentUserId = Auth::id();
        $reports = $this->reportService->getById($currentUserId);

        return view('my-reports');
    }

    function submitReportsPage() {
        $currentUserId = Auth::id();

        return view('submit-report');
    }
}
