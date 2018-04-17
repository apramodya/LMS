@extends('layouts.app')
@section('title')
    Course Name
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 ">
                <!--Accordion wrapper-->
                <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                    <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingOne">
                            <a data-toggle="collapse" data-parent="#accordionEx" href="#info" aria-expanded="true"
                               aria-controls="collapseOne">
                                <h5 class="mb-0">
                                    Course Details <i class="fa fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="info" class="collapse " role="tabpanel" aria-labelledby="headingOne"
                             data-parent="#accordionEx">
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-md-3">Course Details</dt>
                                    <dd class="col-md-8">
                                        <ul>
                                            <li class="list-group-item"><strong>{{ $course->name }}</strong>
                                                | {{ $course->course_id }}</li>
                                        </ul>
                                    </dd>
                                </dl>
                                <hr class="bg-dark">
                                <dl class="row">
                                    <dt class="col-md-3">Lecturers Assigned</dt>
                                    <dd class="col-md-8">
                                        <ul>
                                            @if(countLecturers($course->course_id) >= 1)
                                                @foreach($course->lecturers as $lecturer)
                                                    @if(($lecturer->position_id) < 5)
                                                        <li class="list-group-item text-capitalize">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</li>
                                                    @endif
                                                @endforeach
                                            @else
                                                <li class="list-group-item text-capitalize">No Lecturers Assigned Yet</li>
                                            @endif
                                        </ul>
                                    </dd>
                                </dl>
                                <hr class="bg-dark">
                                <dl class="row">
                                    <dt class="col-md-3">Instructors Assigned</dt>
                                    <dd class="col-md-8">
                                        <ul>
                                            @if(countInstructors($course->course_id) >= 1)
                                                @foreach($course->lecturers as $lecturer)
                                                    @if(($lecturer->position_id) == 5)
                                                        <li class="list-group-item text-capitalize">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</li>
                                                    @endif
                                                @endforeach
                                            @else
                                                <li class="list-group-item text-capitalize">No Instructors Assigned Yet</li>
                                            @endif
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <!-- Accordion card -->
                </div>
                <!--/.Accordion wrapper-->

            </div>
            <div class="col-md-2">
                <button class="btn btn-indigo btn-md">Forum</button>
            </div>
        </div>
        <hr class="black">
        <div class="row">
            <div class="col-md-10 offset-1">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#notices" role="tab">Notices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#notes" role="tab">Lecture Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#assignments" role="tab">Assignments <span class="badge badge-pill badge-danger">New</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#submissions" role="tab">Submissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#quizzes" role="tab">Quizzes</a>
                    </li>
                </ul>
                <!-- Tab panels -->
                <div class="tab-content card">
                    <!--Panel 1-->
                    <div class="tab-pane fade in show active" id="notices" role="tabpanel">
                        <ul class="list-group list-group-flush">
                                @foreach($notices as $notice)
                                <li class="list-group-item">
                                <strong>{{$notice->title}}</strong>
                                 <p> {{ $notice->description }} </p>
                                 <a href="#" class="btn btn-outline-primary btn-sm">Download</a>
                                 <p class="font-italic">Published on {{$notice->created_at}} </p>
                                  @endforeach
                            </li>
                        </ul>
                    </div>
                    <!--/.Panel 1-->
                    <!--Panel 2-->
                    <div class="tab-pane fade" id="notes" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            @foreach($lectureNotes as $lectureNote)
                            <li class="list-group-item">
                            <strong>{{$lectureNote->title}}</strong>
                            <p>{{$lectureNote->description}}</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Download</a>
                            <p class="font-italic">Published {{ $lectureNote->created_at }}</p>
                            @endforeach
                            </li>
                        </ul>
                    </div>
                    <!--/.Panel 2-->
                    <!--Panel 3-->
                    <div class="tab-pane fade" id="assignments" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            @foreach($assignments as $assignment)
                            <li class="list-group-item">
                                <a href="{{route('student-submitAssignment-get',['id' => $course->id,'id1' => $assignment->id])}}">{{$assignment->assignment_id}} </a>
                                <p>{{$assignment->description}}</p>
                                <a href="#" class="btn btn-outline-primary btn-sm">Download Info</a>
                                <p class="font-italic">Published:{{$assignment->created_at}}</p>
                                <p class="font-italic">Deadline: <span class="red-text">{{$assignment->end_date}} </span> at <span class="red">  {{$assignment->end_time}}</span></p>
                            @endforeach
                            </li>
                        </ul>
                    </div>
                    <!--/.Panel 3-->
                    <!--Panel 4-->
                    <div class="tab-pane fade" id="submissions" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            @foreach($submissions as $submission)
                            <li class="list-group-item">
                                <strong>{{$submission->title}}</strong>
                                <p>{{$submission->description}}</p>
                                <a href="#" class="btn btn-outline-primary btn-sm">Download Info</a>
                                <p class="font-italic">Published:{{$submission->created_at}}</p>
                                <p class="font-italic">Deadline <span class="red-text">{{ $submission->end_date }} </span> at <span class="red">{{$submission->end_time}}</span></p>
                            @endforeach
                            </li>
                        </ul>
                    </div>
                    <!--/.Panel 4-->
                    <!--Panel 5-->
                    <div class="tab-pane fade" id="quizzes" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Title</strong>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dicta earum error
                                    excepturi, ipsa ipsam possimus quam quidem ratione recusandae. Ad amet assumenda
                                    laudantium officia pariatur, quia recusandae voluptatibus voluptatum?</p>
                                <a href="#" class="btn btn-outline-primary btn-sm">Go to</a>
                                <p class="font-italic">Published on {{ now() }}</p>
                                <p class="font-italic">Deadline <span class="red-text">{{ now() }}</span></p>
                            </li>
                        </ul>
                    </div>
                    <!--/.Panel 5-->
                </div>
            </div>
        </div>
    </div>
@endsection


