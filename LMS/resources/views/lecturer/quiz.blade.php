@extends('layouts.app')
@section('title')
    View Quiz
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h4>Questions and answers of <strong>{{ $quiz->quiz_name }}</strong></h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer 1</th>
                    <th>Answer 2</th>
                    <th>Answer 3</th>
                    <th>Answer 4</th>
                    <th>Correct Answer</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quiz->questions as $question)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->answer1 }}</td>
                        <td>{{ $question->answer2 }}</td>
                        <td>{{ $question->answer3 }}</td>
                        <td>{{ $question->answer4 }}</td>
                        <td>{{ $question->correct_answer }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection




