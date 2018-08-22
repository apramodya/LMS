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
                    <div class="card-body" style ="text-align:center !important;background-color:#746d9a2e;">
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
                                
                                <div class="col-md-12"> <span style ="font-size: 40px;">{{$gpaFinal}}</span><br><h4>Current GPA  </h4></div>                               
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