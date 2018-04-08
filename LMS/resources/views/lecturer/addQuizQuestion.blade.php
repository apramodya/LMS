@extends('layouts.app')
@section('title')
    Add Question
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="{{ route('add-question', [$id1, $id2]) }}">
                        @csrf
                        <h4>{{ $quiz->quiz_name }} : Questions</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="question">Question</label>
                                    <input type="text" class="form-control" id="question" name="question" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="answer1">Answer 1</label>
                                    <input type="text" class="form-control" id="answer1" name="answer1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="answer2">Answer 2</label>
                                    <input type="text" class="form-control" id="answer2" name="answer2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="answer3">Answer 3</label>
                                    <input type="text" class="form-control" id="answer3" name="answer3">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="answer4">Answer 4</label>
                                    <input type="text" class="form-control" id="answer4" name="answer4">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="correct_answer">Correct Answer</label>
                                    <select class="form-control" id="correct_answer" name="correct_answer">
                                        <option value="1">Answer 1</option>
                                        <option value="2">Answer 2</option>
                                        <option value="3">Answer 3</option>
                                        <option value="4">Answer 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button name="next" type="submit" class="btn btn-primary">Create Next Question</button>
                        <a name="finish" href="{{ route('view-quiz', [$id1, $id2]) }}" class="btn btn-primary">Finish Quiz</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection