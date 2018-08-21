@extends('layouts.app')
@section('title')
    Check Results
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="{{ route('lecturer-post-results-by-course') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 offset-md-2">
                                <div class="form-group">
                                    <select class="custom-select" name="course_id" required>
                                        <option value="" selected disabled>Choose Course</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->course_id }}">{{ $course->name }}
                                                | {{ $course->course_id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-sm btn-primary">Check Results</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
