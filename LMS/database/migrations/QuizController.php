<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\QuizQuestion;
use Illuminate\Http\Request;

class QuizController extends Controller {
	public function getAddQuestion( $id1, $id2 ) {
		$quiz = Quiz::where( 'id', '=', $id2 )->first();

		return view( 'lecturer.addQuizQuestion', [ 'quiz' => $quiz, 'id1' => $id1, 'id2' => $id2 ] );
	}

	public function postAddQuestion( Request $request, $id1, $id2 ) {
		$question                 = new QuizQuestion();
		$question->quiz_id        = $id2;
		$question->question       = $request->question;
		$question->answer1        = $request->answer1;
		$question->answer2        = $request->answer2;
		$question->answer3        = $request->answer3;
		$question->answer4        = $request->answer4;
		$question->correct_answer = $request->correct_answer;

		$question->save();

		return redirect( route( 'add-question', [ $id1, $id2 ] ) );
	}

	public function submitQuiz( Request $request, $id1, $id2 ) {
		$question                 = new QuizQuestion();
		$question->quiz_id        = $id2;
		$question->question       = $request->question;
		$question->answer1        = $request->answer1;
		$question->answer2        = $request->answer2;
		$question->answer3        = $request->answer3;
		$question->answer4        = $request->answer4;
		$question->correct_answer = $request->correct_answer;

		$question->save();

		return redirect( route( 'view-quiz', [ $id1, $id2 ] ) );
	}

	public function getQuiz( $id1, $id2 ) {
		$quiz = Quiz::where( 'id', '=', $id2 )->first();

		return view( 'lecturer.quiz', [ 'quiz' => $quiz, 'id1' => $id1, 'id2' => $id2 ] );
	}

	public function getEditQuestion( $id1, $id2, $id3 ) {
		$quiz     = Quiz::where( 'id', '=', $id2 )->first();
		$question = QuizQuestion::where( 'id', '=', $id3 )->first();

		return view( 'lecturer.editQuizQuestion', [ 'quiz'     => $quiz,
		                                            'id1'      => $id1,
		                                            'id2'      => $id2,
		                                            'id3'      => $id3,
		                                            'question' => $question
		] );
	}

	public function postEditQuestion( Request $request, $id1, $id2, $id3 ) {
		$question                 = QuizQuestion::find( $id3 );
		$question->question       = $request->question;
		$question->answer1        = $request->answer1;
		$question->answer2        = $request->answer2;
		$question->answer3        = $request->answer3;
		$question->answer4        = $request->answer4;
		$question->correct_answer = $request->correct_answer;

		$question->save();

		return redirect( route( 'view-quiz', [ $id1, $id2 ] ) );
	}
}
