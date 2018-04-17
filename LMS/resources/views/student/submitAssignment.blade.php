@extends('layouts.app')
@section('title')
    Submit Assignment
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
                                            {{--<li class="list-group-item"><strong>{{ $course->name }}</strong>--}}
                                            {{--| {{ $course->course_id }}</li>--}}
                                        </ul>
                                    </dd>
                                </dl>
                                <hr class="bg-dark">
                                <dl class="row">
                                    <dt class="col-md-3">Submission Status</dt>
                                    <dd class="col-md-8">
                                        <ul>

                                        </ul>
                                    </dd>
                                </dl>
                                <hr class="bg-dark">
                                <dl class="row">
                                    <dt class="col-md-3">Time</dt>
                                    <dd class="col-md-8">
                                        <ul>

                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <!-- Accordion card -->
                </div>
                <!--/.Accordion wrapper-->


                <br>

                <div class="container">
                    <div class="jumbotron">
                        <div class="row">
                            <div class="col-md-8 offset-2">
                                <form method="post" action="{{ route('student-submitAssignment', ['id' => $course->id,'id1' => $assignment->id])}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control" id="description" name="description" required></textarea>
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


