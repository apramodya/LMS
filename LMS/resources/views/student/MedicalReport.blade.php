

@extends('layouts.app')
@section('title')
    Examination Medicals
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">



                    <a href="{{route('generate-medical')}}"><button class="btn btn-primary">Generate PDF</button></a>


                </div>
            </div>
        </div>
    </div>
@endsection


