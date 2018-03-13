@extends('layouts.app')
@section('title')
    Create announcement
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="post" action="{{ route('create-announcement') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <select class="form-control" id="year" name="year">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="all">All</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="degree">Degree</label>
                                    <select class="form-control" id="degree" name="degree">
                                        <option value="cs">CS</option>
                                        <option value="is">IS</option>
                                        <option value="both">Both</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="4" required></textarea>
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