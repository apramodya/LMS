@extends('layouts.app')
@section('title')
    Forum - {{ $forum->course->name }}
@endsection
@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="row" style="padding-bottom: 20px;">
                <div class="col-md-3">
                    <div class="" style="padding-left: 60px; padding-top: 60px">
                        <pre>Questions asked <span class="badge indigo">{{ $qCount }}</span></pre>
                        <pre>Replies given <span class="badge indigo">{{ null }}</span></pre>
                    </div>
                </div>
                <div class="col-md-7 offset-1">
                    <form class="card" style="padding: 20px;"
                          action="{{ route('lecturer-forumQuestion',$forum->course_id) }}" method="post">
                        @csrf
                        <div class="md-form">
                        <textarea type="text" id="question" name="question" class="form-control md-textarea"
                                  rows="1" required></textarea>
                            <label for="question">Your Question</label>
                        </div>
                        <div class="pull-right">
                            <button type="submit" name="Ask" class="btn btn-primary btn-sm">Ask</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if($qCount == 0)
            <div class="jumbotron">
                <div class="mt-1">
                    <ul class="list-unstyled">
                        <li class="comment-date">
                            <p class="grey-text">No questions asked yet</p>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <div class="jumbotron">
                @foreach($forum->questions as $question)
                    <div class="accordion" id="{{ $question->id }}" role="tablist" aria-multiselectable="true">
                        <!-- Accordion card -->
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <a data-toggle="collapse" href="#c{{ $question->id }}" aria-expanded="true"
                                   aria-controls="c{{ $question->id }}">
                                    <h4 class="mb-0">{{ str_limit($question->question, 15) }}<i
                                                class="fa fa-angle-down rotate-icon"></i></h4>
                                </a>
                                <div style="padding-top: 20px">
                                    <p class="mb-0">{{ $question->question }}</p>
                                    @foreach($question->lecturers as $lecturer)
                                        <div class="mt-sm-1">
                                            <small class="font-weight-bold text-capitalize">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</small>
                                        </div>
                                        <div class="mt-sm-1">
                                            <ul class="list-unstyled">
                                                <li class="comment-date">
                                                    {{ $question->created_at }}
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                    @foreach($question->students as $student)

                                        <div class="mt-sm-1">
                                            <small class="font-weight-bold text-capitalize">{{ $student->first_name }} {{ $student->last_name }}</small>
                                        </div>
                                        <div class="mt-sm-1">
                                            <ul class="list-unstyled">
                                                <li class="comment-date">
                                                    {{ $question->created_at }}

                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <pre>Replies <span class="badge indigo">{{ count($question->answers) }}</span></pre>
                                </div>
                            </div>
                            <div id="c{{ $question->id }}" class="collapse" role="tabpanel" aria-labelledby="headingOne"
                                 data-parent="#{{ $question->id }}">
                                <div class="card-body">
                                    <!--Main wrapper-->
                                    @if(count($question->answers) > 0)
                                        @foreach($question->answers as $answer)
                                            <div class="comments-list text-center text-md-left mb-1">
                                                <!--First row-->
                                                <div class="row mb-4">
                                                    <!--Content column-->
                                                    <div class="col-11 offset-1">
                                                        @foreach($answer->lecturers as $lecturer)
                                                            <a>
                                                                <small class="font-weight-bold text-capitalize">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</small>
                                                            </a>
                                                            <div class="mt-1">
                                                                <ul class="list-unstyled">
                                                                    <li class="comment-date">
                                                                        {{ $answer->created_at }}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                            @foreach($answer->students as $student)
                                                                <a>
                                                                    <small class="font-weight-bold text-capitalize">{{ $student->first_name }} {{ $student->last_name }}</small>
                                                                </a>
                                                                <div class="mt-1">
                                                                    <ul class="list-unstyled">
                                                                        <li class="comment-date">
                                                                            {{ $answer->created_at }}
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @endforeach
                                                        <p class="grey-text">{{ $answer->answer }}</p>
                                                    </div>
                                                    <!--/.Content column-->
                                                </div>
                                                <!--/.First row-->
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="mt-1">
                                            <ul class="list-unstyled">
                                                <li class="comment-date">
                                                    <p class="grey-text">No replies yet</p>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('lecturer-forumQuestion',$question->id) }}" method="post"
                                          class="container">
                                        @csrf
                                        <div class="md-form">
                                <textarea type="text" id="answer" name="answer" class="form-control md-textarea"
                                          rows="1" required></textarea>
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
        @endif
    </div>

@endsection