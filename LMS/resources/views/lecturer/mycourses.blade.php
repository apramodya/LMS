@extends('layouts.app')
@section('title')
    My Courses
@endsection
@section('content')
    <div class="container">
        @if(!$courses->isEmpty())

            <div class="table-responsive">
                <table class="table table-hover">
                    <caption>List of courses</caption>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Course ID</th>
                        <th scope="col">Enrollment Key</th>
                        <th scope="col">Year</th>
                        <th scope="col">Degree</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <th scope="row">{{ $loop->index + 1}}</th>
                            <td><a href="{{ route('lecturer-course',$course->id) }}"
                                   class="font-weight-bold">{{ $course->name }}</a>
                            </td>
                            <td>{{ $course->course_id }}</td>
                            <td>{{ $course->enrollment_key }}</td>
                            <td>{{ $course->year }}</td>
                            <td>{{ $course->degree }}</td>
                            <td><a class="btn btn-sm btn-outline-danger waves-effect passID" data-toggle="modal"
                                   data-target="#unenrollmodel" data-id="{{ $course->id }}">un enroll</a></td>
                            {{--<td><a href="{{ route('lecturer-unenroll-courses',['id' => $course->id]) }}"--}}
                            {{--class="btn btn-sm btn-outline-danger waves-effect">un enroll</a></td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            {{ 'No Courses Enrolled' }}
        @endif
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

                    <form action="{{ route('lecturer-unenroll-courses') }}" method="get">
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
            $(".modal-footer #course_id").val(id);
        });
    </script>
@endsection
