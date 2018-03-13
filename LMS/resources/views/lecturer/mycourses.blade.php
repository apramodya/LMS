<?php
?>
@extends('layouts.app')
@section('title')
    My Courses
@endsection
@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <caption>List of courses</caption>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Enrollment Key</th>
                    <th scope="col">Year</th>
                    <th scope="col">Degree</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    @foreach($enrolls as $enroll)
                        @if($enroll->course_id == $course->course_id)
                            <tr>
                                <th scope="row">{{ $course->id }}</th>
                                <td><a href="{{ route('lecturer-course',$course->course_id) }}">{{ $course->name }}</a>
                                </td>
                                <td>{{ $course->course_id }}</td>
                                <td>{{ $course->enrollment_key }}</td>
                                <td>{{ $course->year }}</td>
                                <td>{{ $course->degree }}</td>
                                <td><i class="fas fa-ban"></i></td>
                                @endif
                            </tr>
                            @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection