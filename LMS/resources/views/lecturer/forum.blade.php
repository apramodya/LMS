@extends('layouts.app')
@section('title')
    Forum - {{ $forum->course->name }}
@endsection
@section('content')
    <div class="container">
        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-4">
                <div class="" style="padding-top: 70px">
                    <pre>Questions Asked <span class="badge indigo">3</span></pre>
                    <pre>Replies Given   <span class="badge indigo">3</span></pre>
                </div>
            </div>
            <div class="col-md-8">
                <form action="" method="post">
                    @csrf
                    <div class="md-form">
                        <textarea type="text" id="question" class="form-control md-textarea" rows="1"></textarea>
                        <label for="question">Your Question</label>
                    </div>
                    <div class="pull-right">
                        <a href="" class="btn btn-primary btn-sm">Ask</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

            <!-- Accordion card -->
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h4 class="mb-0">Question one <i class="fa fa-angle-down rotate-icon"></i></h4>
                    </a>
                    <div style="padding-top: 20px">
                        <h5 class="mb-0">Ut enim ad minim veniam, quis nostrud exercitation ullamco</h5>
                        <p class="font-italic">By Pramodya On 2018-1-12 10:10 p.m.</p>
                    </div>
                </div>
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
                     data-parent="#accordionEx">
                    <div class="card-body">
                        <!--Main wrapper-->
                        <div class="comments-list text-justify">
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <p class="grey-text">reply 1</p>
                                    <h6 class="font-italic">By John Doe On 2018-1-12 10:15 p.m.</h6>
                                </div>
                            </div>
                        </div>
                        <form action="" method="post">
                            @csrf
                            <div class="md-form">
                                <textarea type="text" id="question" class="form-control md-textarea"
                                          rows="1"></textarea>
                                <label for="question">Your Reply</label>
                            </div>
                            <div class="pull-right">
                                <a href="" class="btn btn-primary btn-sm">Reply</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection