@extends('layouts.app')
@section('title')
    Add Results - {{$course->name}}
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('add-results-to', $course->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="form-group">
                                <input type="text" id="index_number" name="index_number" class="form-control"
                                       placeholder="Index Number">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="form-group">
                                <input type="text" id="grade" name="grade" class="form-control"
                                       placeholder="Final Grade">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mx-md-auto">
                            <button type="submit" class="btn btn-outline-primary btn-sm">Add Result</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection