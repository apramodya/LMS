@extends('layouts.app')
@section('title')
    Add Course
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="{{ route('') }}">
                        @csrf
                        <div class="row">

                            <div class="col-5">
                                <div class="form-group">
                                    <label for="degree"><strong>Degree</strong></label>
                                    <select class="form-control" id="degree" name="degree">
                                        <option value="cs">Computer Science</option>
                                        <option value="is">Information Systems</option>

                                    </select>
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
                                <option value="1">Programming</option>

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
                                <div class="form-group">
                                    <label for="course_id"><strong>Sitting</strong></label>
                                    <select class="form-control" id="sitting" name="sitting">
                                        <option value="1">First </option>
                                        <option value="2">Repeat</option>
                                    </select>
                                </div>
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



                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection