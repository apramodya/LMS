@extends('layouts.app')
@section('title')
    Course Name
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 ">
                <dl class="row">
                    {{--<dt class="col-md-3">Lecturers Assigned</dt>--}}
                    {{--<dd class="col-md-8">--}}
                        <ul>
{{--{{dd($quiz)}}--}}         <form>
                            @foreach($quizes as $quiz)
                            <li class="list-group-item">



                                <h5><strong>{{$quiz->question}}</strong></h5>

                                <input type="radio" name="answer" value=""> {{$quiz->answer1}}<br>
                                <input type="radio" name="answer" value=""> {{$quiz->answer2}}<br>
                                <input type="radio" name="answer" value=""> {{$quiz->answer3}}<br>
                                <input type="radio" name="answer" value=""> {{$quiz->answer4}}<br>

                            </li>
                            @endforeach
                            <button type="submit"> Submit</button>
                            </form>

                        </ul>
                    </dd>
                </dl>


                </div>
            </div>
        </div>
    </div>
@endsection


