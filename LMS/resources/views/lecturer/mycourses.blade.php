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
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td><a href="{{ route('lecturer-course',$course->id) }}" class="font-weight-bold">{{ $course->name }}</a>
                        </td>
                        <td>{{ $course->course_id }}</td>
                        <td>{{ $course->enrollment_key }}</td>
                        <td>{{ $course->year }}</td>
                        <td>{{ $course->degree }}</td>
                        <td><a href="{{ route('lecturer-unenroll-courses',['id' => $course->id]) }}" class="btn btn-sm btn-outline-danger">un enroll</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection