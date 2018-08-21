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

                <br>

                <div class="card">
                    <div class="card-header">
                        <span>2nd Year 1st Semester</span>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                @foreach($semesterThrees as $semesterThree)
                                    <?php $count=0;  ?>
                                    @foreach($results as $result)
                                        @if($result->course_id == $semesterThree->course_id)
                                            <?php $count=$count+1;  ?>
                                            <li class="list-group-item"><strong>{{$semesterThree->name}}</strong>
                                                <span class="small">{{$semesterThree->course_id}}</span>
                                                <span class="float-right font-weight-bold"><strong>{{$result->final_grade}}</strong></span>
                                            </li>
                                        @endif
                                    @endforeach
                                    @if($count!=1)
                                        <li class="list-group-item"><strong>{{$semesterThree->name}}</strong>
                                            <span class="small">{{$semesterThree->course_id}}</span>
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
                        <span>2nd Year 2nd Semester</span>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                @foreach($semesterFours as $semesterFour)
                                    <?php $count=0;  ?>
                                    @foreach($results as $result)
                                        @if($result->course_id == $semesterFour->course_id)
                                            <?php $count=$count+1;  ?>
                                            <li class="list-group-item"><strong>{{$semesterFour->name}}</strong>
                                                <span class="small">{{$semesterFour->course_id}}</span>
                                                <span class="float-right font-weight-bold"><strong>{{$result->final_grade}}</strong></span>
                                            </li>
                                        @endif
                                    @endforeach
                                    @if($count!=1)
                                        <li class="list-group-item"><strong>{{$semesterFour->name}}</strong>
                                            <span class="small">{{$semesterFour->course_id}}</span>
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
                        <span>3rd Year 1st Semester</span>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                @foreach($semesterFives as $semesterFive)
                                    <?php $count=0;  ?>
                                    @foreach($results as $result)
                                        @if($result->course_id == $semesterFive->course_id)
                                            <?php $count=$count+1;  ?>
                                            <li class="list-group-item"><strong>{{$semesterFive->name}}</strong>
                                                <span class="small">{{$semesterFive->course_id}}</span>
                                                <span class="float-right font-weight-bold"><strong>{{$result->final_grade}}</strong></span>
                                            </li>
                                        @endif
                                    @endforeach
                                    @if($count!=1)
                                        <li class="list-group-item"><strong>{{$semesterFive->name}}</strong>
                                            <span class="small">{{$semesterFive->course_id}}</span>
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
                        <span>3rd Year 2nd Semester</span>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                @foreach($semesterSixs as $semesterSix)
                                    <?php $count=0;  ?>
                                    @foreach($results as $result)
                                        @if($result->course_id == $semesterSix->course_id)
                                            <?php $count=$count+1;  ?>
                                            <li class="list-group-item"><strong>{{$semesterSix->name}}</strong>
                                                <span class="small">{{$semesterSix->course_id}}</span>
                                                <span class="float-right font-weight-bold"><strong>{{$result->final_grade}}</strong></span>
                                            </li>
                                        @endif
                                    @endforeach
                                    @if($count!=1)
                                        <li class="list-group-item"><strong>{{$semesterSix->name}}</strong>
                                            <span class="small">{{$semesterSix->course_id}}</span>
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
                        <span>4th Year 1st Semester</span>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                @foreach($semesterSevens as $semesterSeven)
                                    <?php $count=0;  ?>
                                    @foreach($results as $result)
                                        @if($result->course_id == $semesterSeven->course_id)
                                            <?php $count=$count+1;  ?>
                                            <li class="list-group-item"><strong>{{$semesterSeven->name}}</strong>
                                                <span class="small">{{$semesterSeven->course_id}}</span>
                                                <span class="float-right font-weight-bold"><strong>{{$result->final_grade}}</strong></span>
                                            </li>
                                        @endif
                                    @endforeach
                                    @if($count!=1)
                                        <li class="list-group-item"><strong>{{$semesterSeven->name}}</strong>
                                            <span class="small">{{$semesterSeven->course_id}}</span>
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
                        <span>4th Year 2nd Semester</span>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                @foreach($semesterEights as $semesterEight)
                                    <?php $count=0;  ?>
                                    @foreach($results as $result)
                                        @if($result->course_id == $semesterEight->course_id)
                                            <?php $count=$count+1;  ?>
                                            <li class="list-group-item"><strong>{{$semesterEight->name}}</strong>
                                                <span class="small">{{$semesterEight->course_id}}</span>
                                                <span class="float-right font-weight-bold"><strong>{{$result->final_grade}}</strong></span>
                                            </li>
                                        @endif
                                    @endforeach
                                    @if($count!=1)
                                        <li class="list-group-item"><strong>{{$semesterEight->name}}</strong>
                                            <span class="small">{{$semesterEight->course_id}}</span>
                                            <span class="float-right font-weight-bold"><strong>Not Added Yet</strong></span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <br>






            </div>
        </div>
    </div>
@endsection


