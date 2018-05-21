@extends('layouts.app')
@section('title')
    Quiz - {{ $quiz->quiz_name }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                @foreach($questions as $question)
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ucfirst($question->question)}}</h4>
                            <input type="radio" name="answer" value=""> {{$question->answer1}}<br>
                            <input type="radio" name="answer" value=""> {{$question->answer2}}<br>
                            <input type="radio" name="answer" value=""> {{$question->answer3}}<br>
                            <input type="radio" name="answer" value=""> {{$question->answer4}}<br>
                        </div>
                    </div>
                    <br>
                @endforeach
                <a class="btn btn-primary">Finish</a>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <p>No. of questions: </p>
                    <p>Time left: </p>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
    </div>
@endsection


