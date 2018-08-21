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
                            <th scope="col">Index Number</th>
                            <th scope="col">Final Grade</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>15000028</td>
                                <td>C</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
