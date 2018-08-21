@extends('layouts.app')
@section('title')
    Results
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <span>1st Year 1st Semester</span>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <ul class="list-group list-group-flush">

                                @foreach($semesterOnes as $semesterOne)
                                    <?php $count=0;  ?>

                                    @foreach($results as $result)

                                        @if($result->course_id == $semesterOne->course_id)
                                            <?php $count=$count+1;  ?>

                                                <li class="list-group-item"><strong>{{$semesterOne->name}}</strong>
                                    <span class="small">{{$semesterOne->course_id}}</span>
                                    <span class="float-right font-weight-bold"><strong>{{$result->final_grade}}</strong></span>
                                </li>
                                        @endif
                                        @endforeach

                                        @if($count!=1)
                                            <li class="list-group-item"><strong>{{$semesterOne->name}}</strong>
                                                <span class="small">{{$semesterOne->course_id}}</span>
                                                <span class="float-right font-weight-bold"><strong>Not Added Yet</strong></span>
                                            </li>
                                        @endif

                                @endforeach



                            </ul>
                        </div>
                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-header">
                        <span>1st Year 2nd Semester</span>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <ul class="list-group list-group-flush">

                                @foreach($semesterTwos as $semesterTwo)
                                    <?php $count=0;  ?>

                                    @foreach($results as $result)

                                        @if($result->course_id == $semesterTwo->course_id)
                                            <?php $count=$count+1;  ?>

                                            <li class="list-group-item"><strong>{{$semesterTwo->name}}</strong>
                                                <span class="small">{{$semesterTwo->course_id}}</span>
                                                <span class="float-right font-weight-bold"><strong>{{$result->final_grade}}</strong></span>
                                            </li>
                                        @endif
                                    @endforeach

                                    @if($count!=1)
                                            <li class="list-group-item"><strong>{{$semesterTwo->name}}</strong>
                                            <span class="small">{{$semesterTwo->course_id}}</span>
                                            <span class="float-right font-weight-bold"><strong>Not Added Yet</strong></span>
                                        </li>
                                    @endif

                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection