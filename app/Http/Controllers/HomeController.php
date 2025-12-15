<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reports = [];
        
        if (!Auth::guard('admin')->check()) {
            // For regular users, get their own reports
            $reports = \App\Models\Report::where('user_id', Auth::guard('web')->id())
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // For admins, get all reports
            $reports = \App\Models\Report::orderBy('created_at', 'desc')->get();
        }
        
        return view('home', ['reports' => $reports]);
    }
}
