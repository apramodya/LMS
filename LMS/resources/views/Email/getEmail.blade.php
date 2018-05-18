
@extends('layouts.app')
@section('title')
    Send Emails
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                 @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="fname"><strong>From: </strong></label>
                                <input type="text" class="form-control" id="fname" name="fname">

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="fname"><strong>To: </strong></label>
                                <input type="text" class="form-control" id="fname" name="fname">

                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="fname"><strong>Title: </strong></label>
                                <input type="text" class="form-control" id="fname" name="fname">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="fname"><strong>Body: </strong></label>
                                <textarea type="text" class="form-control" id="fname" name="fname"> </textarea>
                    </div>
                     </div>
                    </div>


                    <a href=""><button class="btn btn-primary">Send</button></a>


                </div>
            </div>
        </div>
    </div>
@endsection

