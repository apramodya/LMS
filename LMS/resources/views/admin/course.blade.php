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
                                    @if(true)
                                        <li class="list-group-item">{{ $course->lecturerCount($course->course_id) }}</li>
                                    @endif
                                    @foreach($lecturers as $lecturer)
                                        @if($lecturer->lecturer[0]->position_id < 5)
                                            <li class="list-group-item"><span
                                                        class="text-capitalize">{{ $lecturer->lecturer[0]->first_name }} {{ $lecturer->lecturer[0]->last_name }}</span>
                                            </li>
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
                                    @if(true)
                                        <li class="list-group-item">No instructors assigned yet</li>
                                    @endif
                                    @foreach($lecturers as $lecturer)
                                        @if($lecturer->lecturer[0]->position_id == 5)
                                            <li class="list-group-item"><span
                                                        class="text-capitalize">{{ $lecturer->lecturer[0]->first_name }} {{ $lecturer->lecturer[0]->last_name }}</span>
                                            </li>
                                        @endif
                                    @endforeach
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


