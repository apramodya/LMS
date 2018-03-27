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
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td class="font-weight-bold"><a href="{{ route('student-course',$course->course_id) }}">{{ $course->name }}</a></td>
                        <td>{{ $course->course_id }}</td>
                        <td><a class="btn btn-sm btn-outline-danger waves-effect" data-toggle="modal"
                               data-target="#unenrollmodel">un enroll</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Central Modal Medium Danger -->
    <div class="modal fade" id="unenrollmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Un Enroll ?</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-question fa-4x animated rotateInDownLeft"></i>
                        <p>Are you sure you want to un enroll this course?</p>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a href="#" class="btn btn-outline-danger waves-effect">Yes</a>
                    <a class="btn btn-outline-green waves-effect" data-dismiss="modal">No</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Danger-->
@endsection