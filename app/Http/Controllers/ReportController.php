<?php

namespace App\Http\Controllers;

use App\Models\StatusUpdate;
use App\Services\ReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Report;

class ReportController extends Controller
{
    private $reportService;

    function __construct(ReportService $reportService) {
        $this->reportService = $reportService;
    }

    function myReports() {
        $currentUserId = Auth::id();
        $reports = $this->reportService->getById($currentUserId);

        return view('my-reports', ['reports' => $reports]);
    }

    function submitReportsPage() {
        $currentUserId = Auth::id();

        return view('submit-report');
    }

    function submitReport(Request $request){
        $validated = $request->validate([
            'category'    => 'required|string',
            'latitude'    => 'required',
            'longitude'   => 'required',
            'description' => 'required|string',
            'photo'       => 'required|image|mimes:jpeg,png',
        ]);

        $imageBase64 = null;
        $mimeType = null;

        $file = $request->file('photo');
        $mimeType = $file->getMimeType();

        // Base64 encoding for convenience
        $fileContents = file_get_contents($file->getRealPath());
        $imageBase64 = base64_encode($fileContents);

        // Gonna create a title automatically
        $cleanCategory = Str::headline($validated['category']);
        $dateString = now()->format('Y-m-d');

        // Create a report and manually inject values via setter (Illuminate doesn't like constructors)
        $report = new Report();
        $report->title = "$cleanCategory - $dateString";
        $report->latitude = $request->latitude;
        $report->longitude = $request->longitude;
        $report->description = $request->description;
        $report->category = $request->category;
        $report->date = now();        
        $report->image = $imageBase64; 
        $report->image_mime = $mimeType;
        $report->userId = Auth::guard('web')->id();   
        $report->status = 'Pending';    

        $this->reportService->addReport($report);

        return redirect()->route('home');
    }

    function addUpdate(Request $request) {

        $validated = $request->validate([
            'currentReportId' => 'required',
            'newStatus' => 'required',
            'notes' => 'required',
        ]);

        $this->reportService->addUpdate($validated);

        return redirect()->route('home');
    }
}