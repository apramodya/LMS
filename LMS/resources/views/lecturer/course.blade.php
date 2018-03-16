@extends('layouts.app')
@section('title')
    Course Name
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
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
                                            <li class="list-group-item"><strong>Course Name</strong> | Course ID</li>
                                        </ul>
                                    </dd>
                                </dl>
                                <hr class="bg-dark">
                                <dl class="row">
                                    <dt class="col-md-3">Lecturers Assigned</dt>
                                    <dd class="col-md-8">
                                        <ul>
                                            @foreach($course->lecturers as $lecturer)
                                            <li class="list-group-item">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</li>
                                            @endforeach
                                        </ul>
                                    </dd>
                                </dl>
                                <hr class="bg-dark">
                                <dl class="row">
                                    <dt class="col-md-3">Instructors Assigned</dt>
                                    <dd class="col-md-8">
                                        <ul>
                                            <li class="list-group-item">Name</li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <!-- Accordion card -->

                    <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingTwo">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h5 class="mb-0">
                                    Actions <i class="fa fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10 offset-1">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                            <a href="{{ route('lecturer-addLectureNotes',$course->id) }}"
                                               class="btn btn-primary">Add Lecture Notes</a>
                                            <a href="{{ route('lecturer-addAssignment',$course->id) }}"
                                               class="btn btn-primary">Add Assignment</a>
                                            <a href="{{ route('lecturer-addSubmission',$course->id) }}"
                                               class="btn btn-primary">Add Submission</a>
                                            <a href="{{ route('lecturer-addQuiz',$course->id) }}"
                                               class="btn btn-primary">Add Quiz</a>
                                            <a href="{{ route('lecturer-addNotice',$course->id) }}"
                                               class="btn btn-primary">Add Notice</a>
                                            <a href=""
                                               class="btn btn-indigo">Forum</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Accordion card -->
                </div>
                <!--/.Accordion wrapper-->

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
                        <a class="nav-link" data-toggle="tab" href="#assignments" role="tab">Assignments</a>
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
                            <li class="list-group-item">
                                <strong>Title</strong>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dicta earum error excepturi, ipsa ipsam possimus quam quidem ratione recusandae. Ad amet assumenda laudantium officia pariatur, quia recusandae voluptatibus voluptatum?</p>
                                <a href="#" class="btn btn-outline-primary btn-sm">Download</a>
                                <a href="#" class="btn btn-outline-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                <p class="font-italic">Published on {{ now() }}</p>
                            </li>
                        </ul>
                    </div>
                    <!--/.Panel 1-->
                    <!--Panel 2-->
                    <div class="tab-pane fade" id="notes" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Title</strong>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dicta earum error excepturi, ipsa ipsam possimus quam quidem ratione recusandae. Ad amet assumenda laudantium officia pariatur, quia recusandae voluptatibus voluptatum?</p>
                                <a href="#" class="btn btn-outline-primary btn-sm">Download</a>
                                <a href="#" class="btn btn-outline-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                <p class="font-italic">Published on {{ now() }}</p>
                            </li>
                        </ul>

                    </div>
                    <!--/.Panel 2-->
                    <!--Panel 3-->
                    <div class="tab-pane fade" id="assignments" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            @foreach($course->assignments as $assignment)
                                <li class="list-group-item">
                                    <strong>{{ $assignment->assignment_id }}</strong>
                                    <p>{{ $assignment->description }}</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Download Info</a>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                    <p class="font-italic">Published on {{ $assignment->start_date }} {{ $assignment->start_time }}</p>
                                    <p class="font-italic">Deadline <span class="red-text">{{ $assignment->end_date }} {{ $assignment->end_time }}</span></p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--/.Panel 3-->
                    <!--Panel 4-->
                    <div class="tab-pane fade" id="submissions" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Title</strong>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dicta earum error excepturi, ipsa ipsam possimus quam quidem ratione recusandae. Ad amet assumenda laudantium officia pariatur, quia recusandae voluptatibus voluptatum?</p>
                                <a href="#" class="btn btn-outline-primary btn-sm">Download Info</a>
                                <a href="#" class="btn btn-outline-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                <p class="font-italic">Published on {{ now() }}</p>
                                <p class="font-italic">Deadline <span class="red-text">{{ now() }}</span></p>
                            </li>
                        </ul>
                    </div>
                    <!--/.Panel 4-->
                    <!--Panel 5-->
                    <div class="tab-pane fade" id="quizzes" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Title</strong>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dicta earum error excepturi, ipsa ipsam possimus quam quidem ratione recusandae. Ad amet assumenda laudantium officia pariatur, quia recusandae voluptatibus voluptatum?</p>
                                <a href="#" class="btn btn-outline-primary btn-sm">Go to</a>
                                <a href="#" class="btn btn-outline-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
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