@extends('layouts.app')
@section('title')
    Edit Submission
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="{{ route('lecturer-editSubmission',['id' => $course->id, 'id1' => $submission->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="course">Course Name</label>
                                    <input type="text" class="form-control" id="course" name="course" disabled value="{{ $course->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="course_id">Course ID</label>
                                    <input type="text" class="form-control" id="course_id" name="course_id" disabled value="{{ $course->course_id }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $submission->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" id="description" name="description" required>{{ $submission->description }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $submission->start_date }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $submission->end_date }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_time">Start Time</label>
                                    <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $submission->start_time }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_time">End Time</label>
                                    <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $submission->end_time }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="attachment">Attachment</label>
                                    <input name="attachment" type="file" class="form-control-file" id="attachment">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="attachment">Uploaded File</label>
                                    <br>
                                    <a class="btn btn-outline-primary" href="{{ route('lecturer-deleteFileSubmission',['id' => $course->id, 'id1' => $submission->id]) }}">Delete File</a>
                                    <a href="{{ route('lecturer-getFileSubmission',['id' => $course->id, 'id1' => $submission->id]) }}">{{ $submission->attachment }}</a>
                                    <input type="hidden"  id="attachment1" name="attachment1" value="">

                                </div>
                            </div>

                        </div>
                        <div class="form-check">
                            <input type="hidden"  id="sms" name="sms" value="0">
                            <input type="checkbox" class="form-check-input" id="sms" name="sms" value="1">
                            <label class="form-check-label" for="sms">SMS</label>
                        </div>
                        <div class="form-check">
                            <input type="hidden"  id="email"  name="email" value="0">
                            <input type="checkbox" class="form-check-input" id="email" checked="checked" name="email" value="1">
                            <label class="form-check-label" for="email">Email</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection