@extends('layouts.app')
@section('title')
    View Results
@endsection
@section('content')
    <div class="container">
        <div class="">
            <div class="jumbotron">
                <h1>{{ $resul->course_id }}</h1>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <caption>List of Results</caption>
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
