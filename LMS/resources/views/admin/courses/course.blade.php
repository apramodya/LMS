@extends('layouts.app')
@section('title')
    {{ $course->name }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        Info
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-md-5">Course Actions</dt>
                            <dd class="col-md-7">
                                <a href="{{ route('admin-forum', ['course_id' => $course->id]) }}"
                                   class="btn btn-outline-primary btn-sm">Forum</a>
                                <a href="{{ route('edit-course', ['course_id' => $course->id]) }}"
                                   class="btn btn-outline-primary btn-sm">Edit Course Details</a>
                            </dd>
                        </dl>
                        <hr class="bg-dark">
                        <dl class="row">
                            <dt class="col-md-5">Course Details</dt>
                            <dd class="col-md-7">
                                <p>Course Name: <strong>{{ $course->name }}</strong></p>
                                <p>Course ID: {{ $course->course_id }}</p>
                                <p>Enrollment Key: {{ $course->enrollment_key }}</p>
                                <p>Year: {{ $course->year }}</p>
                                <p>Semester: {{ $course->semester }}</p>
                                <p>Degree: {{ degreeName($course->degree) }}</p>

                            </dd>
                        </dl>

                        <hr class="bg-dark">

                        <dl class="row">
                            <dt class="col-md-4">Lecturers Assigned</dt>
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
                            <dt class="col-md-4">Instructors Assigned</dt>
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
        </div>
        <br>
    </div>
@endsection


