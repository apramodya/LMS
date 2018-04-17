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
                    <th scope="col">year</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td class="font-weight-bold"><a href="{{route('student-course',$course->id)}}">{{ $course->name }}</a></td>
                        <td>{{ $course->course_id }}</td>
                        <td>{{$course->year}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection