@extends('layouts.app')
@section('title')
    Send Emails
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form action="{{ route('email-user') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="from"><strong>From: </strong></label>
                                    <input type="text" class="form-control" id="from" name="from" disabled value="{{ $sender }}">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="to"><strong>To: </strong></label>
                                    <input type="text" class="form-control" id="to" name="to" required placeholder="Receiver's Index Number">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title"><strong>Title: </strong></label>
                                    <input type="text" class="form-control" id="title" name="title" required>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="body"><strong>Body: </strong></label>
                                    <textarea type="text" class="form-control" id="body" name="body" required> </textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

