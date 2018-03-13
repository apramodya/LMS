@extends('layouts.app')
@section('title')
    Lecturers list
@endsection
@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <caption>List of Lecturers</caption>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Position</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lecturers as $lecturer)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td><a href="" class="blue-">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</a></td>
                        <td>{{ $lecturer->email }}</td>
                        <td>{{ $lecturer->phone }}</td>
                        <td>{{ $lecturer->position_id }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
