@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Lecturer Details
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">Full Name</dt>
                            <dd class="col-sm-9"><span
                                        class="text-capitalize">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</span>
                            </dd>

                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9">{{ $lecturer->email }}</dd>

                            <dt class="col-sm-3">Phone</dt>
                            <dd class="col-sm-9"><span class="text-uppercase">{{ $lecturer->phone }}</span></dd>

                            <dt class="col-sm-3">Position</dt>
                            <dd class="col-sm-9"><span class="text-capitalize">{{ $lecturer->position->position }}</span></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        Enrolled Courses Details
                    </div>
                    <div class="card-body">
                        <!--Table-->
                        @if(!$lecturer->courses->isEmpty())
                            <table class="table">

                                <!--Table head-->
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                </tr>
                                </thead>
                                <!--Table head-->
                                <!--Table body-->
                                <tbody>
                                @foreach($lecturer->courses as $course)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td class="font-weight-bold"><a href="{{ route('admin-course', $course->course_id) }}">{{ $course->name }}</a></td>
                                        <td>{{ $course->course_id }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <!--Table body-->

                            </table>
                            @else
                            {{ 'No courses enrolled' }}
                            @endif
                        <!--Table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection