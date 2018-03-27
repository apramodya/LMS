@extends('layouts.app')
@section('title')
    Add Results - {{$course->name}}
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('add-results-to', $course->id) }}" method="post">
            @csrf
            <table class="table table-responsive-md">
                <thead class="blue-grey lighten-4">
                <tr>
                    <th>#</th>
                    <th>Index Number</th>
                    <th>Final Grade</th>
                </tr>
                </thead>
                <tbody>
                @foreach($course->students as $student)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{ $student->index_number }}<input name="index_number" type="hidden"
                                                               value="{{ $student->index_number }}"></td>
                        <td style="width: 40%"><input name="final_grade" class="form-control form-control-sm"
                                                      type="text" placeholder="Final Grade"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-outline-primary btn-sm">Add Results</button>
        </form>
    </div>
@endsection