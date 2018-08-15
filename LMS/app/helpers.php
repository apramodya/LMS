<?php

//broadcast message
function broadcastSMSEmail( $msg, $course_id, $sms, $email ) {
	$receivers = \App\Course::where( 'id', '=', $course_id )->first()->students;
	//dd( $receivers );

	if ( $sms == 1 ) {
		foreach ( $receivers as $receiver ) {
			print_r($msg." \n");
			print_r("Message sent to ".$receiver->phone."\r\n");

//			sms( $msg, $receiver->phone );
		}
	}
	if ( $email == 1 ) {
		foreach ( $receivers as $receiver ) {
			print_r($msg." \n");
			print_r("Message emailed to ".$receiver->email."\r\n");

			email( $msg, $receiver->email );
		}
	}
}

// send text message
function sms( $msg, $receiver ) {
	$user     = '94719990807';
	$password = '2036';
	$text     = urlencode( $msg );
	$to       = '94719990807';

	$baseurl = 'http://www.textit.biz/sendmsg';
	$url     = $baseurl . '/?id=' . $user . '&pw=' . $password . '&to=' . $to . '&text=' . $text;
	$ret     = file( $url );

	$res = explode( ':', $ret[0] );

	if ( trim( $res[0] ) == 'OK' ) {
		$msg = 'Sent';
//		echo 'Message Sent – ID : '.$res[1];
	} else {
//		echo 'Sent Failed – Error : '.$res[1];
		$msg = 'Fail';
	}

	return $msg;
}

// send email
function email( $msg, $receiver ) {
	$to      = $receiver;
	$subject = 'the subject';
	$message = $msg;
	$headers = 'From: webmaster@example.com' . "\r\n" .
	           'Reply-To: webmaster@example.com' . "\r\n" .
	           'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);
}

// return the full degree name
function degreeName( $degree ) {
	if ( $degree == 'CS' || $degree == 'cs' ) {
		return 'Computer Science';
	} elseif ( $degree == 'IS' || $degree == 'is' ) {
		return 'Information Systems';
	} elseif ( $degree == 'both' ) {
		return 'CS and IS';
	}

}

// count number of lecturers
function countLecturers( $course ) {
	$count     = 0;
	$lecturers = \App\Course::where( 'course_id', '=', $course )->first()->lecturers;
	foreach ( $lecturers as $lecturer ):
		if ( $lecturer->position_id < 5 ) {
			$count ++;
		}
	endforeach;

	return $count;
}

// count number of instructors
function countInstructors( $course ) {
	$count     = 0;
	$lecturers = \App\Course::where( 'course_id', '=', $course )->first()->lecturers;
	foreach ( $lecturers as $lecturer ):
		if ( $lecturer->position_id == 5 ) {
			$count ++;
		}
	endforeach;

	return $count;
}

// is new?
// check whether passed 1 day
function isNew( $created_at ) {
	$date1 = now();
	$date2 = $created_at;
	$diff  = $date2->diffInHours( $date1 );
	if ( $diff < 24 ) {
		return true;
	}
}

// convert CSV file to a json object
function csv2json( $file ) {
	if ( ( $handle = fopen( $file, "r" ) ) !== false ) {
		$csvs = [];
		while ( ! feof( $handle ) ) {
			$csvs[] = fgetcsv( $handle );
		}
		$datas        = [];
		$column_names = [];
		foreach ( $csvs[0] as $single_csv ) {
			$column_names[] = $single_csv;
		}
		foreach ( $csvs as $key => $csv ) {
			if ( $key === 0 ) {
				continue;
			}
			foreach ( $column_names as $column_key => $column_name ) {
				$datas[ $key - 1 ][ $column_name ] = $csv[ $column_key ];
			}
		}
		$json = json_encode( $datas );
		fclose( $handle );

		return $json;
	}
}