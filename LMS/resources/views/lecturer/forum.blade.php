@extends('layouts.app')
@section('title')
    Forum - {{ $forum->course->name }}
@endsection
@section('content')
    <div class="container">
        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-4">
                <div class="" style="padding-top: 70px">
                    <pre>Questions Asked <span class="badge indigo">{{ $qCount }}</span></pre>
                </div>
            </div>
            <div class="col-md-8">
                <form action="{{ route('lecturer-forumQuestion',$forum->course_id) }}" method="post">
                    @csrf
                    <div class="md-form">
                        <textarea type="text" id="question" name="question" class="form-control md-textarea" rows="1"></textarea>
                        <label for="question">Your Question</label>
                    </div>
                    <div class="pull-right">
                        <button type="submit" name="Ask" class="btn btn-primary btn-sm">Ask</button>
                    </div>
                </form>
            </div>
        </div>
        @foreach($forum->questions as $question)
        <div class="accordion" id="{{ $question->id }}" role="tablist" aria-multiselectable="true">

            <!-- Accordion card -->

            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <a data-toggle="collapse" href="#c{{ $question->id }}" aria-expanded="true" aria-controls="c{{ $question->id }}">
                        <h4 class="mb-0">Question {{ $loop->iteration }} <i class="fa fa-angle-down rotate-icon"></i></h4>
                    </a>
                    <div style="padding-top: 20px">
                        <h5 class="mb-0">{{ $question->question }}</h5>
                        @foreach($question->lecturers as $lecturer)
                        <p class="font-italic">By {{ $lecturer->first_name }} On {{ $question->created_at }}</p>
                        @endforeach
                    </div>
                </div>
                <div id="c{{ $question->id }}" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
                     data-parent="#{{ $question->id }}">
                    <div class="card-body">
                        <!--Main wrapper-->
                        @foreach($question->answers as $answer)
                        <div class="comments-list text-justify">
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <p class="grey-text">{{ $answer->answer }}</p>
                                    @foreach($answer->lecturers as $lecturer)
                                    <h6 class="font-italic">By {{ $lecturer->first_name }} On {{ $answer->created_at }}</h6>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <form action="{{ route('lecturer-forumQuestion',$question->id) }}" method="post">
                            @csrf
                            <div class="md-form">
                                <textarea type="text" id="answer" name="answer" class="form-control md-textarea"
                                          rows="1"></textarea>
                                <label for="answer">Your Reply</label>
                            </div>
                            <div class="pull-right">
                                <button type="submit" name="Reply" class="btn btn-primary btn-sm">Reply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
            <br>
            <br>
        @endforeach


    </div>

@endsection