@extends('layouts.app')
@section('title')
    Create announcement
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">

                    {{--!--Accordion wrapper-->--}}
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
                                                {{ $assignment->end_date}} , {{$assignment->end_time}}
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
                                    {{----}}
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card -->
                    </div>
                    <!--/.Accordion wrapper-->
                    <br>

                    <form method="post" action="{{route('student-editAssignmentSubmission',['courseid' => $course->id,'assignmentid' => $assignment->id])}}"enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="{{$result->title}}">{{$assignment->title}}
                        </div>
                        <div class="form-group">
                            <label for="content">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="4" >{{$result->description}}</textarea>
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
    </div>
@endsection