@extends('layouts.app')
@section('title')
    Quiz - {{ $quiz->quiz_name }}
    {{--{{ dd($quiz->id) }}--}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                {{--['courseid' => $course->id,'assignmentid' => $assignment->id]--}}
                {{--{{  $serializeArray = serialize($questions)}}--}}

                @php
                    $items = array();
                        foreach($questions as $question){
                        $items[] = $question->question;
                    }
               // $questionArray= serialize($items);

              //  dd($questionArray);

                @endphp

                <form method="post" action="{{ route('student-submit-Quiz',serialize($items))}}" enctype="multipart/form-data">
                    @csrf

                @foreach($questions as $question)

                    <div class="card">
                        <div class="card-body">


{{--                            {{dd}}--}}
                            <h4 class="card-title">{{($question->question)}}</h4>
                            <input type="radio" name="{{$question->id}}" value=""> {{$question->answer1}}<br>
                            <input type="radio" name="{{$question->id}}" value=""> {{$question->answer2}}<br>
                            <input type="radio" name="{{$question->id}}" value=""> {{$question->answer3}}<br>
                            <input type="radio" name="{{$question->id}}" value=""> {{$question->answer4}}<br>
                        </div>'
                    </div>
                    <br>
                @endforeach
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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




{{--<form method="post" action="{{ route('student-submitAssignment', ['courseid' => $course->id,'assignmentid' => $assignment->id])}}" enctype="multipart/form-data">--}}
    {{--@csrf--}}
    {{--<div class="form-group">--}}
        {{--<label for="title">Title</label>--}}
        {{--<input type="text" class="form-control" id="title" name="title" required>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--<label for="description">Description</label>--}}
        {{--<textarea type="text" class="form-control" id="article-ckeditor" name="description" required></textarea>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--<label for="attachment">Attachment</label>--}}
        {{--<input name="attachment" type="file" class="form-control-file" id="attachment">--}}
    {{--</div>--}}
    {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
{{--</form>--}}
