@extends('layouts.app')
@section('title')
    View Assignment Submissions
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <a href="{{ route('lecturer-downloadAllSubmissions',['id' => $course->id, 'id1' => $submission->id]) }}" class="btn btn-outline-primary btn-sm">Download All</a>
            <div class="row">
                <div class="table-responsive table-bordered">
                    <table class="table">
                        <caption>List of Submissions</caption>
                        <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Index #</th>
                            <th scope="col">Title</th>
                            <th scope="col">Submitted On</th>
                            <th scope="col">Submitted Time</th>
                            <th scope="col">Submission Status</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Give Marks</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        function checkDeadline($date,$time,$Date,$Time)
                        {

                            if (strtotime($Date)>strtotime($date))
                            {
                                return true;
                            }
                            elseif (strtotime($Date)==strtotime($date)){
                                if($Time>$time){
                                    return true;

                                }
                                else{
                                    return false;
                                }
                            }
                            else{
                                return false;
                            }

                        }
                        ?>
                        {{-- @foreach()--}}
                        @foreach($submission->submissionsubmissions as $submissionsubmission)
                            <tr class="text-center">
                                <th scope="row">{{--{{ $loop->index + 1}}--}}</th>
                                @foreach($submissionsubmission->students as $student)
                                    <td>{{ $student->index_number }}</td>
                                @endforeach

                                <?php
                                $secondNumber = $submissionsubmission->created_at;
                                $date = $submission->end_date;
                                $time = $submission->end_time;
                                $timestamp = strtotime($secondNumber);
                                $Date= date('Y-m-d', $timestamp);
                                $Time = date('H:i:s', $timestamp);
                                ?>

                                <td>{{ $submission->title  }}</td>

                                <td>{{ substr($submissionsubmission->created_at,0,10) }}</td>
                                <td>{{ substr($submissionsubmission->created_at,10,18) }}</td>
                                <td>
                                    @if(checkDeadline($date,$time,$Date,$Time)==true)

                                        <span class="rgba-red-strong"><strong>Late</strong></span>

                                    @else
                                        <span class="rgba-green-strong"><strong>Non-Late</strong></span>


                                    @endif


                                </td>
                                <td>
                                    <a href="{{ route('lecturer-downloadSubmissions',['id' => $course->id, 'id1' => $submissionsubmission->id]) }}" class="btn btn-outline-primary btn-sm">Download</a>
                                </td>
                                <td>
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-4 offset-md-2">
                                                <input class="form-control form-control-sm" type="number" placeholder="Marks given">
                                            </div>
                                            <div class="col-md-4 ">
                                                <button type="submit" class="btn btn-outline-primary btn-sm">Mark</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection