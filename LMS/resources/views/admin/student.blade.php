@extends('layouts.app')
@section('title')
    {{ $student->index_number }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        Student Details
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">Full Name</dt>
                            <dd class="col-sm-9"><span class="text-capitalize">{{ $student->first_name }} {{ $student->last_name }}</span></dd>

                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9">{{ $student->email }}</dd>

                            <dt class="col-sm-3">Phone</dt>
                            <dd class="col-sm-9"><span class="text-uppercase">{{ $student->phone }}</span></dd>

                            <dt class="col-sm-3">Year of Registration</dt>
                            <dd class="col-sm-9"><span class="text-uppercase">{{ $student->registration_year }}</span></dd>

                            <dt class="col-sm-3">Index number</dt>
                            <dd class="col-sm-9"><span class="text-uppercase">{{ $student->index_number }}</span></dd>

                            <dt class="col-sm-3">Degree</dt>
                            <dd class="col-sm-9"><span class="text-uppercase">{{ degreeName($student->degree) }}</span></dd>

                            <dt class="col-sm-3"></dt>
                            <dd class="col-sm-9"><span class=""></span></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection