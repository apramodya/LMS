                    @extends('layouts.app')
                    @section('title')
                        Examination Medicals
                    @endsection
                    @section('content')
                        <div class="container">
                            <div class="jumbotron">
                                <div class="row">
                                    <div class="col-md-8 offset-2">
                                        {{--<form method="post" action="{{ route('submit-medical') }}" enctype="multipart/form-data">--}}

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
                                                        <label for="course_id"><strong>Year</strong></label>
                                                        <input type="text" class="form-control" id="course_id" name="course_id" disabled value="{{$medical->year}}">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <label for="name"><strong>Semester</strong></label>
                                                    <input type="text" class="form-control" id="registration" name="registration" disabled value="{{$medical->semester}}">
                                                </div>




                                            </div>
                                            <div class="row">


                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="course_id"><strong>Course ID</strong></label>
                                                        <input type="text" class="form-control" id="course_id" name="course_id" disabled value="{{$medical->course_id}}">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <label for="name"><strong>Registration Number</strong></label>
                                                    <input type="text" class="form-control" id="registration" name="registration" disabled value="{{$student->index_number}}">
                                                </div>



                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="causes"><strong>Causes for Absense</strong></label>
                                                        <textarea type="text" class="form-control" id="causes" name="causes">{{$medical->causes}}</textarea>

                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="remarks"><strong>Remarks [Optional]</strong></label>
                                                        <textarea type="text" class="form-control" id="remarks" name="remarks">{{$medical->remarks}}</textarea>

                                                    </div>
                                                </div>

                                            </div>

                                        <a href="{{route('generate-medical',['id' => $lastID])}}"><button class="btn btn-primary">Generate PDF</button></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endsection

