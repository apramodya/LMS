@extends('layouts.app')
@section('title')
    Forum - {{ $forum->course->name }}
@endsection
@section('content')
    <div class="container">

        <div class="mb-4">
            <h5>Questions Asked <span class="badge indigo">3</span></h5>
            <h5>Replies Given <span class="badge indigo">3</span></h5>
        </div>

        <!--Accordion wrapper-->
        <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

            <!-- Accordion card -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header" role="tab" id="headingOne">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="mb-0">Question one <i class="fa fa-angle-down rotate-icon"></i></h5>
                        <h6 class="font-italic">By Pramodya On 2018-1-12 10:10 p.m.</h6>
                    </a>
                </div>
                <!-- Card body -->
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx" >
                    <div class="card-body">
                        <!--Main wrapper-->
                        <div class="comments-list text-justify">
                            <!--First row-->
                            <div class="row mb-4">

                                <!--Content column-->
                                <div class="col-sm-12">

                                    <p class="grey-text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                        sint occaecat cupidatat non proident.</p>
                                    <h6 class="font-italic">By John Doe On 2018-1-12 10:15 p.m.</h6>
                                </div>
                                <!--/.Content column-->
                            </div>
                            <!--/.First row-->
                        </div>
                        <!--/.Main wrapper-->

                    </div>
                </div>
            </div>
            <!-- Accordion card -->
        </div>
        <!--/.Accordion wrapper-->

    </div>

@endsection