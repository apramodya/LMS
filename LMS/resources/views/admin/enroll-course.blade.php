@extends('layouts.app')
@section('title')
    Enroll Course
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="{{ route('enroll-course') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="course">Course</label>
                                    <select class="form-control" id="course" name="course_id">
                                        <option>Choose</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->course_id }}">{{ $course->name }} | {{ $course->course_id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="lecturer">Lecturer</label>
                                    <select class="form-control text-capitalize" id="lecturer" name="lecturer_id">
                                        <option>Choose</option>
                                        @foreach($lecturers as $lecturer)
                                            <option value="{{ $lecturer->user_id }}">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Enroll</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
