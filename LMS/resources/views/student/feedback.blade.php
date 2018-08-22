@extends('layouts.app')
@section('title')
    Feedback
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="{{route('submit-feedback') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-10 offset-1">
                                <div class="form-group">
                                    <label for="course">Course</label>
                                    <select name="course" id="course" class="form-control">
                                        <?php $count = 0; ?>
                                        @foreach($courses as $course)
                                           <?php $count=$count+1; ?>
                                            <option value="$count">{{$course->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1">
                                <div class="form-group">
                                    <label for="lecturer">Lecturer</label>

                                    <select name="lecturer" id="lecturer" class="form-control">
                                        <?php $coun = 0; ?>
                                        @foreach($lecturers as $lecturer)
                                                <?php $coun=$coun+1; ?>
                                        <option value="$count">{{$lecturer->first_name}} {{$lecturer->last_name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1">
                                <div class="form-group">
                                    <label for="q1">What is your impression about the lecturer?</label>
                                    <textarea type="text" class="form-control" id="q1" name="q1"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1">
                                <div class="form-group">
                                    <label for="q2">What is your impression about the course?</label>
                                    <textarea type="text" class="form-control" id="q2" name="q2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1">
                                <div class="form-group">
                                    <label for="q3">What are your suggestions to improve the course?</label>
                                    <textarea type="text" class="form-control" id="q3" name="q3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 offset-4">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <button type="reset" class="btn btn-primary btn-sm">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection