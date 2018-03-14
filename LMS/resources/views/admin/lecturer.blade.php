@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        Lecturer Details
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">Full Name</dt>
                            <dd class="col-sm-9"><span class="text-capitalize">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</span></dd>

                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9">{{ $lecturer->email }}</dd>

                            <dt class="col-sm-3">Phone</dt>
                            <dd class="col-sm-9"><span class="text-uppercase">{{ $lecturer->phone }}</span></dd>

                            <dt class="col-sm-3">Position</dt>
                            <dd class="col-sm-9"><span class="text-uppercase">{{ $lecturer->registration_year }}</span></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection