@extends('layouts.app')
@section('title')
    Courses list
@endsection
@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <caption>List of courses ({{count($courses)}})</caption>
                <thead>
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Enrollment Key</th>
                    <th scope="col">Year</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Degree</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr class="">
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td class="font-weight-bold"><a href="{{ route('admin-course',$course->course_id) }}">{{ $course->name }}</a></td>
                        <td>{{ $course->course_id }}</td>
                        <td>{{ $course->enrollment_key }}</td>
                        <td>{{ $course->year }}</td>
                        <td>{{ $course->semester }}</td>
                        <td>{{ degreeName($course->degree) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection