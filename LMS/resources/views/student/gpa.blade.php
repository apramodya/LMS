@extends('layouts.app')
@section('title')
    GPA
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card">
                    <div class="card-header">
                        <span>GPA of 15000028</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{--gpa--}}
                            <div class="col-md-3">3.2</div>
                        </div>
                        <div class="row">
                            {{--rank--}}
                            <div class="col-md-3">#16</div>
                            {{--creadits--}}
                            <div class="col-md-3">60</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection