@extends('layouts.app')
@section('title')
    Add Results Using CSV
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="{{ route('add-results-using-csv') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="course">Select Course</label>
                                    <select class="form-control" id="course" name="course_id" required>
                                        <option>Choose Course</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}
                                                | {{ $course->course_id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="file">Attach CSV File <span class="font-small red-text">(Please consider the format)</span></label>
                                    <input class="form-control" type="file" name="attachment" id="file" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 offset-4">
                                <button type="submit" class="btn btn-sm btn-primary">Add Results</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

