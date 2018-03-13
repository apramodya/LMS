@extends('layouts.app')
@section('title')
    {{ $course->name }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Info
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-md-3">Course Details</dt>
                            <dd class="col-md-9">
                                <ul>
                                    <li class="list-group-item"><strong>{{ $course->name }}</strong>
                                        | {{ $course->course_id }}</li>
                                    <li class="list-group-item">Year {{ $course->year }}
                                        | {{ degreeName($course->degree) }}</li>
                                </ul>
                            </dd>
                        </dl>
                        <hr class="bg-dark">
                        <dl class="row">
                            <dt class="col-md-4">Lecturers Assigned</dt>
                            <dd class="col-md-8">
                                <ul>
                                    @foreach($lecturers as $lecturer)
                                        @if($lecturer->lecturer[0]->position_id < 5)
                                            <li class="list-group-item">{{ $lecturer->lecturer[0]->first_name }} {{ $lecturer->lecturer[0]->last_name }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </dd>
                        </dl>
                        <hr class="bg-dark">
                        <dl class="row">
                            <dt class="col-md-4">Instructors Assigned</dt>
                            <dd class="col-md-8">
                                <ul>
                                    @foreach($lecturers as $lecturer)
                                        @if($lecturer->lecturer[0]->position_id < 5)
                                            <li class="list-group-item">{{ $lecturer->lecturer[0]->first_name }} {{ $lecturer->lecturer[0]->last_name }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Actions
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="btn-group-vertical" role="group" aria-label="Actions">
                                    <a href="{{ route('lecturer-addLectureNotes',$course->course_id) }}"
                                       class="btn btn-primary ml-0">Add Lecture Notes</a>
                                    <a href="{{ route('lecturer-addAssignment',$course->course_id) }}"
                                       class="btn btn-primary">Add Assignment</a>
                                    <a href="{{ route('lecturer-addSubmission',$course->course_id) }}"
                                       class="btn btn-primary">Add Submission</a>
                                    <a href="{{ route('lecturer-addQuiz',$course->course_id) }}"
                                       class="btn btn-primary">Add Quiz</a>
                                    <a href="{{ route('lecturer-addNotice',$course->course_id) }}"
                                       class="btn btn-primary">Add Notice</a>
                                    <a href=""
                                       class="btn btn-indigo">Forum</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Course View
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div id="notices">
                                        <h4>Notices</h4>
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
                                </div>
                                <hr class="bg-dark">
                                <div class="row">
                                    <div id="lectures">
                                        <h4>Lecture Notes</h4>
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
                                </div>
                                <hr class="bg-dark">
                                <div class="row">
                                    <div id="assignments">
                                        <h4>Assignments</h4>
                                        <ul class="list-group list-group-flush">
                                            @foreach($assignments as $assignment)

                                            <li class="list-group-item">
                                                <strong>{{ $assignment->assignment_id }}</strong>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dicta earum error excepturi, ipsa ipsam possimus quam quidem ratione recusandae. Ad amet assumenda laudantium officia pariatur, quia recusandae voluptatibus voluptatum?</p>
                                                <a href="#" class="btn btn-outline-primary btn-sm">Download Info</a>
                                                <a href="#" class="btn btn-outline-primary btn-sm">Edit</a>
                                                <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                                <p class="font-italic">Published on {{ now() }}</p>
                                                <p class="font-italic">Deadline <span class="red-text">{{ now() }}</span></p>
                                            </li>
                                                @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <hr class="bg-dark">
                                <div class="row">
                                    <div id="assignments">
                                        <h4>Submissions</h4>
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
                                </div>
                                <hr class="bg-dark">
                                <div class="row">
                                    <div id="assignments">
                                        <h4>Quizzes</h4>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


