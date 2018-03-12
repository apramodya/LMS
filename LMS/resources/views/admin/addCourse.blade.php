@extends('layouts.app')
@section('title')
    Add Course
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="{{ route('add-course') }}">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <select class="form-control" id="year" name="year">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="degree">Degree</label>
                                    <select class="form-control" id="degree" name="degree">
                                        <option value="cs">CS</option>
                                        <option value="is">IS</option>
                                        <option value="both">Both</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <select class="form-control" id="semester" name="semester">
                                        <option value="1">I</option>
                                        <option value="2">II</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Course Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="course_id">Course Id</label>
                                    <input type="text" class="form-control" id="course_id" name="course_id" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="enrollment_key">Enrollment Key</label>
                                    <input type="text" class="form-control" id="enrollment_key" name="enrollment_key" required>
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