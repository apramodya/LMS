@extends('layouts.app')
@section('title')
    View Results
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 offset-md-2">
                                <div class="form-group">
                                    <select class="custom-select" name="course_id" required>
                                        <option>Choose Course</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}
                                                | {{ $course->course_id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-sm btn-primary">View Results</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="">
            <div class="jumbotron">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <caption>List of courses</caption>
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Index Number</th>
                            <th scope="col">Final Grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $result)
                            <tr>
                                <th scope="row">{{ $loop->index + 1}}</th>
                                <td>{{ $result->index_number }}</td>
                                <td>{{ $result->final_grade }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
