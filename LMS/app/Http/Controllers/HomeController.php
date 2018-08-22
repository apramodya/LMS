<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
	public function __construct() {
		$this->middleware( 'auth' );
	}

	public function home() {
		// post only announcement for all batches
		$userid = Auth::user()->id;
		$type   = User::where( 'id', '=', $userid )->first()->type;
		if ( $type == 'student' ) {
			$year          = Student::where( 'user_id', '=', $userid )->first()->year;
			$announcements = Announcement::where( 'year', '=', 'all' )->orWhere( 'year', '=', $year )->orderBy( 'created_at', 'desc' )->get();
		} else {
			$announcements = Announcement::where( 'year', '=', 'all' )->orderBy( 'created_at', 'desc' )->get();
		}

		flash( 'Welcome to LMS!' )->success();

		return view( 'welcome', [ 'announcements' => $announcements ] );
	}

	public function index() {
		return view( 'dashboard' );
	}


}
