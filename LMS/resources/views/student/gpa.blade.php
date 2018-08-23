@extends('layouts.app')
@section('title')
    GPA
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <div style ="text-align:center;"class="card">
                    <div class="card-header">
                        <span> <strong>Overview of {{$student->first_name}} {{$student->last_name}}</strong> </span>
                    </div>
                    <div class="card-body" style ="text-align:center !important;background-color:#746d9a2e;height: 150px;">
                        <div class="row">
                            {{--gpa--}}  
                            <div class="col-md-12"> <span style ="font-size: 40px;">{{$gpaFinal}}</span><br><h4>Current GPA  </h4></div>                           
                        </div>                            
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                    <div style ="text-align:center;" class="card">
                        <div class="card-header">
                                <span> <strong>Degree Infromation</strong> </span>
                        </div>
                        <div class="card-body" style ="text-align:center !important;background-color:#746d9a2e;">
                            <div class="row">
                                {{--gpa--}}
                                
                                <div class="col-md-12"> <span style ="font-size: 40px;">
                                        @if($gpaFinal>=3.5)
                                            FC
                                        @elseif($gpaFinal>=3.25 && $gpaFinal <3.5)
                                            SU
                                        @elseif($gpaFinal>=3.00 && $gpaFinal <3.25)
                                            SL
                                        @elseif($gpaFinal<3.0 && $gpaFinal >2.0)
                                            NM
                                        @else
                                            NC
                                        @endif






                                    </span><br><h6 style ="font-size: 12px;">Code names for the classes are as follow, FC for First Class degree, SU for Second Upper degree, SL for Second Lower degree, NM for Normal degree and -- indicates that your GPA is insufficient to complete the degree.</h6></div>


                            </div>                               
                        </div>
                    </div
            </div>
        </div>
</div>





<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
                <div class="card-header">
                    <span><strong>Student Ranking</strong></span>
                </div>
                <div class="card-body" style ="background-color: #746d9a2e;">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <?php $count = 0; ?>
                                        @foreach($sortedRanks as $key => $sortedRank)
                                <?php   $count = $count + 1 ?>
                                        @if($key == $index)
                                        <li class="list-group-item green"><strong>#{{$count}} {{$key}}</strong>
                                            {{--<span class="small">John Doe</span>--}}
                                            <span class="float-right font-weight-bold"><strong>{{$sortedRank}}</strong></span>
                                        </li>
                                        @endif
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
        </div>
</div>







    </div>
@endsection