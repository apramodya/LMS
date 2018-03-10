@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            @if(Auth()->user()->type == 'admin' )
                @include('dashboards.admin')
            @elseif(Auth()->user()->type == 'lecturer' )
                @include('dashboards.lecturer')
            @elseif(Auth()->user()->type == 'student' )
                @include('dashboards.student')
            @endif
        @endauth
    </div>
@endsection
