@extends('layouts.app')
@section('title')
    Submit Task
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 ">
                <!--Accordion wrapper-->
                <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                    <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingOne">
                            <a data-toggle="collapse" data-parent="#accordionEx" href="#info" aria-expanded="true"
                               aria-controls="collapseOne">
                                <h5 class="mb-0">
                                    Submission Details <i class="fa fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="info" class="collapse " role="tabpanel" aria-labelledby="headingOne"
                             data-parent="#accordionEx">
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-md-3">Due Date</dt>
                                    <dd class="col-md-8">
                                        <ul>
                                            {{ $submission->end_date}} , {{$submission->end_time}}
                                        </ul>
                                    </dd>
                                </dl>
                                <hr class="bg-dark">
                                <dl class="row">
                                    <dt class="col-md-3">Submission Status</dt>
                                    <dd class="col-md-8">
                                        <ul>
                                            @if($result== !NULL)
                                                <span class="rgba-green-strong"><strong>Submitted For Grading</strong></span>
                                            @else
                                                <span class="rgba-red-strong"><strong>Not Submitted Yet</strong></span>
                                            @endif
                                        </ul>
                                    </dd>
                                </dl>
                                <hr class="bg-dark">
                                <dl class="row">
                                    <dt class="col-md-3">Time</dt>
                                    <dd class="col-md-8">
                                        <ul>
                                            <span class="rgba-purple-strong" id="countdown"></span>
                                        </ul>

                                        <script>


                                            var day = @json($submission->end_date);
                                            var time = @json($submission->end_time);

                                            var datetime = day + " " + time;
                                            {{--var time = @json("$submission->end_time");--}}

                                                    {{--{{dd($assignment->end_date)}}--}}

                                                    {{--var countDownDate = new Date({{$assignment->end_date}}).getTime();--}}
                                            var countDownDate = new Date(datetime).getTime();

                                            var x = setInterval(function() {

                                                var now = new Date().getTime();


                                                var distance = countDownDate - now;

                                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                                document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
                                                    + minutes + "m " + seconds + "s ";

                                                if (distance < 0) {
                                                    clearInterval(x);
                                                    document.getElementById("countdown").innerHTML = "EXPIRED";
                                                }
                                            }, 1000);
                                        </script>


                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <!-- Accordion card -->
                </div>
                <!--/.Accordion wrapper-->
                <br>


                @if($result==NULL)
                    <div class="container">
                        <div class="jumbotron">
                            <div class="row">
                                <div class="col-md-8 offset-2">

                                    <form method="post" action="{{ route('student-submit-submissions', ['courseid' => $course->id,'submissionid' => $submission->id])}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea type="text" class="form-control" id="article-ckeditor" name="description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="attachment">Attachment</label>
                                            <input name="attachment" type="file" class="form-control-file" id="attachment">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="container">
                                <div class="jumbotron">
                                    <div class="row">
                                        <div class="col-md-8 offset-2">
                                            {{--{{dd($submission->id)}}--}}

                                           <form method="post" action="{{ route('edit-student-task', ['courseid' => $course->id,'submissionid' => $result->id])}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" value="{{$result->title}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea type="text" class="form-control" id="article-ckeditor" name="description">{{$result->description}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="attachment">Attachment</label>
                                                    <input name="attachment" type="file" class="form-control-file" id="attachment">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>


                        @endif
                    </div>
@endsection







