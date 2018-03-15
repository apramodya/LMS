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
                                <a href="{{ route('admin-forum', ['course_id' => $course->id]) }}" class="btn btn-outline-primary btn-sm">Forum</a>
                                <a href="" class="btn btn-outline-primary btn-sm">Edit Course Details</a>
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
                                    @foreach($course->lecturers as $lecturer)
                                    <ul>
                                        @if($lecturer->position_id < 5 )
                                            <li class="list-group-item">
                                                <span class="text-capitalize">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</span>
                                            </li>
                                        @endif
                                    </ul>
                                    @endforeach
                                </dd>
                            </dl>
                            <hr class="bg-dark">
                            <dl class="row">
                                <dt class="col-md-4">Instructors Assigned</dt>
                                <dd class="col-md-8">
                                    @foreach($course->lecturers as $lecturer)
                                        <ul>
                                            @if($lecturer->position_id == 5 )
                                                <li class="list-group-item">
                                                    <span class="text-capitalize">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</span>
                                                </li>
                                            @endif
                                        </ul>
                                    @endforeach
                                </dd>
                            </dl>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection


