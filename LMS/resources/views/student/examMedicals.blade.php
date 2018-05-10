@extends('layouts.app')
@section('title')
   Examination Medicals
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="{{ route('submit-medical') }}" enctype="multipart/form-data">

                        @csrf

                            <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname"><strong>First Name</strong></label>
                                    <input type="text" class="form-control" id="fname" name="fname" disabled value="{{$student->first_name}}">

                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="degree"><strong>Last Name</strong></label>
                                    <input type="text" class="form-control" id="fname" name="fname" disabled value="{{$student->last_name}}">

                                </div>
                            </div>
                            </div>
                    <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="degree"><strong>Degree</strong></label>
                                    <input type="text" class="form-control" id="degree" name="degree" disabled value="{{$student->degree}}">

                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="year"><strong>Year</strong></label>
                                    <select class="form-control" id="year" name="year">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="semester"><strong>Semester</strong></label>
                                    <select class="form-control" id="semester" name="semester">
                                        <option value="1">I</option>
                                        <option value="2">II</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-4">
                        <div class="form-group">
                            <label for="name"><strong>Course Name</strong></label>
                            <select class="form-control" id="course_name" name="year">
                                $count=0;
                                @foreach($courses as $course)
                                    $count=$count+1;
                                <option value="$count">{{$course->name}}</option>
                                    @endforeach

                            </select>
                        </div>
                        </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="course_id"><strong>Course ID</strong></label>
                                    <input type="text" class="form-control" id="course_id" name="course_id" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <label for="name"><strong>Registration Number</strong></label>
                                <input type="text" class="form-control" id="registration" name="registration" disabled value="{{$student->index_number}}">
                            </div>



                            <div class="col-12">
                                <div class="form-group">
                                    <label for="causes"><strong>Causes for Absense</strong></label>
                                    <textarea type="text" class="form-control" id="causes" name="causes" required></textarea>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="remarks"><strong>Remarks [Optional]</strong></label>
                                    <textarea type="text" class="form-control" id="remarks" name="remarks" required></textarea>

                                </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                <label for="attachment"><strong>Supporting Documents</strong></label>
                                <input name="attachment" type="file" class="form-control-file" id="attachment">
                            </div>

                            </div>


                        </div>
                        {{--<div class="row">--}}

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection