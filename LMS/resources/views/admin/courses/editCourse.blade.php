@extends('layouts.app')
@section('title')
    Edit Course
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="{{ route('edit-course', $course->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <select class="form-control" id="year" name="year">
                                        <option value="1" @if ($course->year == 1) {{ 'selected="selected"' }} @endif>
                                            1
                                        </option>
                                        <option value="2" @if ($course->year == 2) {{ 'selected="selected"' }} @endif>
                                            2
                                        </option>
                                        <option value="3" @if ($course->year == 3) {{ 'selected="selected"' }} @endif>
                                            3
                                        </option>
                                        <option value="4" @if ($course->year == 4) {{ 'selected="selected"' }} @endif>
                                            4
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="degree">Degree</label>
                                    <select class="form-control" id="degree" name="degree">
                                        <option value="cs" @if ($course->degree == 'cs') {{ 'selected="selected"' }} @endif>
                                            CS
                                        </option>
                                        <option value="is" @if ($course->degree == 'is') {{ 'selected="selected"' }} @endif>
                                            IS
                                        </option>
                                        <option value="both" @if ($course->degree == 'both') {{ 'selected="selected"' }} @endif>
                                            Both
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <select class="form-control" id="semester" name="semester">
                                        <option value="1" @if ($course->semester == 1) {{ 'selected="selected"' }} @endif>
                                            I
                                        </option>
                                        <option value="2" @if ($course->semester == 2) {{ 'selected="selected"' }} @endif>
                                            II
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Course Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="course_id">Course Id</label>
                                    <input type="text" class="form-control" id="course_id" name="course_id"
                                           value="{{ $course->course_id }}" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="enrollment_key">Enrollment Key</label>
                                    <input type="text" class="form-control" id="enrollment_key" name="enrollment_key"
                                           value="{{ $course->enrollment_key }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection