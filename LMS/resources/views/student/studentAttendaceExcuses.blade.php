@extends('layouts.app')
@section('title')
    Add Course
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="{{ route('student-attendace-excuses')}}">
                        @csrf
                        <div class="row">

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

                        <div class="col-4">
                            <label for="name"><strong>Registration Number</strong></label>
                            <input type="text" class="form-control" id="registration" name="registration" disabled value="{{$student->index_number}}">
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

                            <div class="col-4">
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
                    <div class="col-12">
                        <div class="form-group">
                            <label for="address"><strong>Address</strong></label>
                            <textarea type="text" class="form-control" id="address" name="address" required></textarea>

                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                        <label for="Mobile"><strong>Mobile</strong></label>
                        <input type="text" class="form-control" id="Mobile" name="Mobile" required>
                    </div>
                        </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="Home"><strong>Home</strong></label>
                                    <input type="text" class="form-control" id="Home" name="Home" required>
                                </div>
                            </div>
                    </div>

                    <label><strong>Period of Absense</strong></label>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="From"><strong>From</strong></label>
                                <input type="text" class="form-control" id="From" name="From" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="To"><strong>To</strong></label>
                                <input type="text" class="form-control" id="To" name="To" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="causes"><strong>Causes for Absense</strong></label>
                                    <textarea type="text" class="form-control" id="causes" name="causes" required></textarea>

                                </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="remarks"><strong>Remarks [Optional]</strong></label>
                                    <textarea type="text" class="form-control" id="remarks" name="remarks" required></textarea>

                                </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="attachment"><strong>Supporting Documents</strong></label>
                                    <input name="attachment" type="file" class="form-control-file" id="attachment">
                                </div>

                            </div>
                        </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label><strong>Statement of student:</strong></label>
                                <textarea type="text" class="form-control" id="remarks" name="remarks" >
                                I hereby requesting you to excuse me from the above lecture/ lectures. The submitted details and the proof documents are true and accurate according to my knowledge. If in the event it is proved that I have provided forge details I am liable to cancel my excuse for the lectures and considered as absent in the calculation of attendance and other disciplinary actions (if any).
                                </textarea>
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