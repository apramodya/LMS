<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        // post only announcement for all batches
        $announcements = Announcement::all()->sortByDesc('created_at')->where('year','=','all');

	    flash('Welcome to LMS!')->success();
        return view('welcome', ['announcements' => $announcements]);
    }

    public function index()
    {
        return view('dashboard');
    }


}
