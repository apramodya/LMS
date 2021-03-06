@extends('layouts.app')
@section('title')
    Students' List
@endsection
@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <caption>List of Students ({{ count($students) }})</caption>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Index #</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Degree</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td class="font-weight-bold"><a href="{{ route('admin-student', $student->id) }}" class="blue-"><span class="text-capitalize">{{ $student->first_name }} {{ $student->last_name }}</span></a></td>
                        <td>{{ $student->index_number }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ degreeName($student->degree) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection