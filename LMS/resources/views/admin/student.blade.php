@extends('layouts.app')
@section('title')
    {{ $student->index_number }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Student Details
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-5">Full Name</dt>
                            <dd class="col-sm-7"><span class="text-capitalize">{{ $student->first_name }} {{ $student->last_name }}</span></dd>

                            <dt class="col-sm-5">Email</dt>
                            <dd class="col-sm-7">{{ $student->email }}</dd>

                            <dt class="col-sm-5">Phone</dt>
                            <dd class="col-sm-7"><span class="text-uppercase">{{ $student->phone }}</span></dd>

                            <dt class="col-sm-5">Year of Registration</dt>
                            <dd class="col-sm-7"><span class="text-uppercase">{{ $student->registration_year }}</span></dd>

                            <dt class="col-sm-5">Index number</dt>
                            <dd class="col-sm-7"><span class="text-uppercase">{{ $student->index_number }}</span></dd>

                            <dt class="col-sm-5">Degree</dt>
                            <dd class="col-sm-7"><span class="text-uppercase">{{ degreeName($student->degree) }}</span></dd>

                            <dt class="col-sm-5"></dt>
                            <dd class="col-sm-7"><span class=""></span></dd>
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
                            @foreach($student->courses as $course)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->course_id }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <!--Table body-->

                        </table>
                        <!--Table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection