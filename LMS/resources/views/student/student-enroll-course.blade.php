{{--@extends('layouts.app')--}}
{{--@section('title')--}}
    {{--Enroll Course--}}
{{--@endsection--}}
{{--@section('content')--}}
    {{--<div class="container">--}}
        {{--<div class="jumbotron">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-8 offset-2">--}}
                    {{--<form method="post" action="{{ route('student-enroll-course') }}">--}}
                        {{--@csrf--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="course">Course</label>--}}
                                    {{--<select class="form-control" id="course" name="course_id">--}}
                                        {{--<option>Choose Course</option>--}}
                                        {{--@foreach($courses as $course)--}}
                                            {{--<option value="{{ $course->id }}">{{ $course->name }} | {{ $course->course_id }}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-4 offset-4">--}}
                                {{--<button type="submit" class="btn btn-sm btn-primary">Enroll Course</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}

@extends('layouts.app')
@section('title')
   Course Actions
@endsection
@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Year</th>
                    <th scope="col">Enroll</th>
                    <th scope="col">UnEnroll</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td scope="row">{{ $loop->index + 1}}</td>
                        <td class="font-weight-bold">{{ $course->name }}</td>
                        <td class="font-weight-bold">{{ $course->course_id }}</td>
                        <td class="font-weight-bold">{{ $course->year }}</td>
                        <td> <a href="{{route('student-enroll-course',['id'=>$course->id])}}" class="btn btn-blue">Enroll</a></td>
                        <td><a class="btn btn red" data-toggle="modal"
                               data-target="#unenrollmodel">unenroll</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Central Modal Medium Danger -->
    <div class="modal fade" id="unenrollmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Un Enroll ?</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-question fa-4x animated rotateInDownLeft"></i>
                        <p>Are you sure you want to un enroll this course?</p>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">

                    <form action="{{ route('student-unenroll-course') }}" method="get">
                        <input type="hidden" name="course_id" id="course_id" value=""/>
                        <button type="submit" class="btn btn-outline-danger waves-effect">Yes</button>
                        {{--<a href="{{ route('lecturer-unenroll-courses') }}" class="btn btn-outline-danger waves-effect">Yes</a>--}}
                        <a class="btn btn-outline-green waves-effect" data-dismiss="modal">No</a>
                    </form>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Danger-->
@endsection

@section('scripts')
    <script>
        $(document).on("click", ".passID", function () {
            var id = $(this).data('id');
            console.log(id);
            $(".modal-footer #course_id").val( id );
        });
    </script>
@endsection