<h1>Year ONE Semester ONE</h1> <br><br>

<h6>{{($student->first_name)}} {{($student->last_name)}}</h6> <br>

@foreach($semesterOnes as $semesterOne)
    {{--<strong>{{$semesterOne->course_id}}</strong>--}}
    <?php $count=0;  ?>

    @foreach($resultsOnes as $resultsOne)

        @if($resultsOne->course_id == $semesterOne->course_id)
            <?php $count=$count+1;  ?>
        <strong>{{$semesterOne->name}}</strong> : <strong>{{$resultsOne->final_grade}}</strong><br>

        @endif
    @endforeach

    @if($count!=1)
            <strong> {{$semesterOne->name}}</strong>: No <br>
    @endif

@endforeach




<h1>Semester 02</h1>

<h6>{{($student->first_name)}} {{($student->last_name)}}</h6> <br>

@foreach($semesterTwos as $semesterTwo)
    {{--<strong>{{$semesterOne->course_id}}</strong>--}}
    <?php $count=0;  ?>

    @foreach($resultsOnes as $resultsOne)

        @if($resultsOne->course_id == $semesterTwo->course_id)
            <?php $count=$count+1;  ?>
            <strong>{{$semesterTwo->name}}</strong> : <strong>{{$resultsOne->final_grade}}</strong><br>

        @endif
    @endforeach

    @if($count!=1)
        <strong> {{$semesterTwo->name}}</strong>: No <br>
    @endif

@endforeach

{{--{{dd($count)}}--}}



