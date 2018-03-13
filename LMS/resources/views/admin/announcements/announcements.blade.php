@extends('layouts.app')
@section('title')
    Announcements
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            @if($announcements)
                @foreach($announcements as $announcement)
                    <div class="card">
                        <div class="card-header text-capitalize">
                            <strong>{{ $announcement->title }}</strong>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-3">Description</dt>
                                <dd class="col-sm-9">{{ $announcement->content }}</dd>

                                <dt class="col-sm-3">Year</dt>
                                <dd class="col-sm-9">{{ $announcement->year }}</dd>

                                <dt class="col-sm-3">Degree</dt>
                                <dd class="col-sm-9">{{ $announcement->degree }}</dd>

                                <dt class="col-sm-3">Published</dt>
                                <dd class="col-sm-9">{{ $announcement->created_at }}</dd>
                            </dl>
                            @if(($announcement->attachment) != null)
                                <a href="{{ $announcement->attachment }}" class="btn btn-primary">Download</a>
                            @endif
                        </div>
                    </div>
                    <br>
                @endforeach
            @else
                <div class="card">
                    <div class="card-body">
                        Empty
                    </div>
                </div>
            @endif
            </div>
        </div>
@endsection