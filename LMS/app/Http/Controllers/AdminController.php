<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAnnounce(){
        return view('announcements/create-announcement');
    }
    public function postAnnounce(Request $request){
        $announcement = new Announcement([
            'year' => $request->input('year'),
            'degree' => $request->input('degree'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'attachment' => $request->input('attachment'),
        ]);
        $announcement->save();
        return redirect(route('dashboard'));
    }

    public function announcements()
    {
        $announcements = Announcement::all();
        return view('announcements/announcements',['announcements' => $announcements]);
    }

}
