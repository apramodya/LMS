<?php
$positions = \App\Position::all();
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="reg-student-tab" data-toggle="tab" href="#reg-student"
                           role="tab" aria-controls="nav-home" aria-selected="true">Register Student</a>
                        <a class="nav-item nav-link" id="reg-lecturer-tab" data-toggle="tab" href="#reg-lecturer"
                           role="tab" aria-controls="nav-profile" aria-selected="false">Register Lecturer</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="reg-student" role="tabpanel"
                         aria-labelledby="reg-student-tab">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <input type="hidden" name="type" value="student">
                                    <div class="form-group row">
                                        <label for="first_name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="first_name" type="text"
                                                   class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                   name="first_name" value="{{ old('first_name') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="last_name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="last_name" type="text"
                                                   class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                   name="last_name" value="{{ old('last_name') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="number"
                                                   class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                   name="phone" value="{{ old('phone') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="registration_year"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Year of Registration') }}</label>

                                        <div class="col-md-6">
                                            <input id="registration_year" type="number"
                                                   class="form-control{{ $errors->has('registration_year') ? ' is-invalid' : '' }}"
                                                   name="registration_year" value="{{ old('registration_year') }}"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="index_number"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Index Number') }}</label>

                                        <div class="col-md-6">
                                            <input id="index_number" type="number"
                                                   class="form-control{{ $errors->has('index_number') ? ' is-invalid' : '' }}"
                                                   name="index_number" value="{{ old('index_number') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reg-lecturer" role="tabpanel" aria-labelledby="reg-lecturer-tab">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <input type="hidden" name="type" value="lecturer">
                                    <div class="form-group row">
                                        <label for="first_name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="first_name" type="text"
                                                   class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                   name="first_name" value="{{ old('first_name') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="last_name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="last_name" type="text"
                                                   class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                   name="last_name" value="{{ old('last_name') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="number"
                                                   class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                   name="phone" value="{{ old('phone') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="position"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>

                                        <div class="col-md-6">
                                            <select class="custom-select" id="position" name="position_id">
                                                <option selected>Choose...</option>
                                                @foreach($positions as $position)
                                                    <option value="{{ $position->id }}">{{ $position->position }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="username"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                        <div class="col-md-6">
                                            <input id="username" type="text"
                                                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                   name="username" value="{{ old('username') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection