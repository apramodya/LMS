<?php

namespace App\Http\Controllers;

use App\Mail\StudentEmail;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{

    public function getEmail()
    {
    	$sender = Auth::user()->students->first();

    	$index_number = $sender->index_number;
        return view('student.sendEmail', ['sender' => $index_number]);
    }

    public function sendEmail(Request $request){
	    $validator = Validator::make( $request->all(), [
		    'to'     => 'required',
		    'body'     => 'required',
		    'title'     => 'required'
	    ] );
	    if ( $validator->fails() ) {
		    flash( 'Please fill all' )->error();

		    return redirect()->to( route( 'email-user' ) );
	    }
	    $sender = Auth::user()->students->first()->index_number;

	    $receiver = $request['to'];
    	$receiver = Student::where('index_number','=',$receiver)->first()->email;

    	$mail = ['body' => $request->body, 'title' => $request->title, 'sender' => $sender];

    	Mail::to($receiver)->send(new StudentEmail($mail));
	    flash( 'Message emailed' )->success();

	    return redirect(route('email-user'));

    }

}
