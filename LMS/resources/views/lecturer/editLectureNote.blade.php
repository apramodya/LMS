@extends('layouts.app')
@section('title')
    Edit Lecture Notes
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="{{ route('lecturer-editLectureNotes',['id' => $course->id, 'id1' => $lecturenote->id]) }}" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" id="title" name="title" required value="{{ $lecturenote->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" id="description" name="description" required >{{ $lecturenote->description }}</textarea>
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
                                    <a class="btn btn-outline-primary" href="{{ route('lecturer-deleteFileLectureNote',['id' => $course->id, 'id1' => $lecturenote->id]) }}">Delete File</a>
                                    <a href="{{ route('lecturer-getFileLectureNote',['id' => $course->id, 'id1' => $lecturenote->id]) }}">{{ $lecturenote->attachment }}</a>
                                    <input type="hidden"  id="attachment1" name="attachment1" value="">
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