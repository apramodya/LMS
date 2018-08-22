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
                        <span> <strong>Overview of {{$student->first_name}} {{$student->last_name}}</strong> </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{--gpa--}}
                            <div class="col-md-8"> <h4>Current GPA: {{$gpaFinal}}</h4></div>
                        </div>
                        <div class="row">
                            {{--rank--}}
                            <div class="col-md-3">#16</div>
                            {{--creadits--}}
                            <div class="col-md-3">60</div>
                        </div>
                    </div>

                    {{--@foreach($age as $x=>$x_value)--}}

                        {{--{{$x}} {{$x_value}}--}}

{{--{{$rank}}--}}
                    {{--@endforeach--}}

                </div>
            </div>
        </div>
<br>

        <div class="card">
            <div class="card-header">
                <span><strong>Student Ranking</strong></span>
            </div>
            <div class="card-body">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <?php $count = 0; ?>
                                    @foreach($sortedRanks as $key => $sortedRank)
                             <?php   $count = $count + 1 ?>
                                    <li class="list-group-item"><strong>#{{$count}} {{$key}}</strong>
                                        {{--<span class="small">John Doe</span>--}}
                                        <span class="float-right font-weight-bold"><strong>{{$sortedRank}}</strong></span>
                                    </li>
                                    @endforeach
                    </ul>
                </div>
            </div>
        </div>



    </div>
@endsection