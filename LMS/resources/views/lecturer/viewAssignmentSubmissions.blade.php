@extends('layouts.app')
@section('title')
    View Assignment Submissions
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="table-responsive">
                    <table class="table">
                        <caption>List of Submissions</caption>
                        <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Index #</th>
                            <th scope="col">Title</th>
                            <th scope="col">Submitted On</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Give Marks</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @foreach()--}}
                        {{--@foreach($assignmentSubmission->assignmentsubmissions as $submission)--}}
                        <tr class="text-center">
                            <th scope="row">{{--{{ $loop->index + 1}}--}}</th>
                            @foreach($assignmentSubmission->students as $student)
                            <td>{{ $student->index_number }}</td>
                            @endforeach
                            <td>15000028_PHP_Takehome</td>
                            <td>2018-06-30</td>
                            <td>
                                <a href="#" class="btn btn-outline-primary btn-sm">Download</a>
                            </td>
                            <td>
                                <form action="">
                                    <div class="row">
                                        <div class="col-md-4 offset-md-2">
                                            <input class="form-control form-control-sm" type="number" placeholder="Marks given">
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-outline-primary btn-sm">Mark</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        {{--@endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection