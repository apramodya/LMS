@extends('layouts.app')
@section('title')
    View Results
@endsection
@section('content')
    <div class="container">
        <div class="">
            <div class="jumbotron">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <caption>List of Results</caption>
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Course Code</th>
                            <th scope="col">Final Mark</th>
                            <th scope="col">Final Grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $result)
                            <tr>
                                <th scope="row">{{ $loop->index + 1}}</th>
                                <td>{{ $result->course_id }}</td>
                                <td>{{ $result->final_mark }}</td>
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
