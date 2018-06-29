@extends('layouts.app')
@section('title')
    {{ $course->name }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <!--Accordion wrapper-->
                <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                    <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingOne">
                            <a data-toggle="collapse" data-parent="#accordionEx" href="#info" aria-expanded="true"
                               aria-controls="collapseOne">
                                <h5 class="mb-0">
                                    Course Details <i class="fa fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="info" class="collapse " role="tabpanel" aria-labelledby="headingOne"
                             data-parent="#accordionEx">
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-md-3">Course Details</dt>
                                    <dd class="col-md-8">
                                        <ul>
                                            <li class="list-group-item"><strong>{{ $course->name }}</strong>
                                                | {{ $course->course_id }}</li>
                                        </ul>
                                    </dd>
                                </dl>
                                <hr class="bg-dark">
                                <dl class="row">
                                    <dt class="col-md-3">Lecturers Assigned</dt>
                                    <dd class="col-md-8">
                                        <ul>
                                            @if(countLecturers($course->course_id) >= 1)
                                                @foreach($course->lecturers as $lecturer)
                                                    @if(($lecturer->position_id) < 5)
                                                        <li class="list-group-item text-capitalize">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</li>
                                                    @endif
                                                @endforeach
                                            @else
                                                <li class="list-group-item text-capitalize">No Lecturers Assigned Yet</li>
                                            @endif
                                        </ul>
                                    </dd>
                                </dl>
                                <hr class="bg-dark">
                                <dl class="row">
                                    <dt class="col-md-3">Instructors Assigned</dt>
                                    <dd class="col-md-8">
                                        <ul>
                                            @if(countInstructors($course->course_id) >= 1)
                                                @foreach($course->lecturers as $lecturer)
                                                    @if(($lecturer->position_id) == 5)
                                                        <li class="list-group-item text-capitalize">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</li>
                                                    @endif
                                                @endforeach
                                            @else
                                                <li class="list-group-item text-capitalize">No Instructors Assigned
                                                    Yet
                                                </li>
                                            @endif
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <!-- Accordion card -->

                    <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingTwo">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo"
                               aria-expanded="false" aria-controls="collapseTwo">
                                <h5 class="mb-0">
                                    Actions <i class="fa fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo"
                             data-parent="#accordionEx">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10 offset-1">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                            <a href="{{ route('lecturer-addLectureNotes',$course->id) }}"
                                               class="btn btn-primary">Add Lecture Notes</a>
                                            <a href="{{ route('lecturer-addAssignment',$course->id) }}"
                                               class="btn btn-primary">Add Assignment</a>
                                            <a href="{{ route('lecturer-addSubmission',$course->id) }}"
                                               class="btn btn-primary">Add Submission</a>
                                            <a href="{{ route('lecturer-addQuiz',$course->id) }}"
                                               class="btn btn-primary">Add Quiz</a>
                                            <a href="{{ route('lecturer-addNotice',$course->id) }}"
                                               class="btn btn-primary">Add Notice</a>
                                            <a href="{{ route('lecturer-forum',$course->id) }}"
                                               class="btn btn-primary">Forum</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Accordion card -->
                </div>
                <!--/.Accordion wrapper-->

            </div>
        </div>
        <hr class="black">
        <div class="row">
            <div class="col-md-10 offset-1">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#notices" role="tab">Notices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#notes" role="tab">Lecture Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#assignments" role="tab">Assignments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#submissions" role="tab">Submissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#quizzes" role="tab">Quizzes</a>
                    </li>
                </ul>
                <!-- Tab panels -->
                <div class="tab-content card">
                    <!--Panel 1-->
                    <div class="tab-pane fade in show active" id="notices" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            @foreach($course->notices as $notice)
                                <li class="list-group-item">
                                    <strong>{{ $notice->title }}</strong>
                                    <p>{{ $notice->description }}</p>
                                    <a href="{{ route('lecturer-downnotice',['id' => $course->id, 'id1' => $notice->id]) }}"
                                       class="btn btn-outline-primary btn-sm">Download</a>
                                    <a href="{{ route('lecturer-editNotice',['id' => $course->id, 'id1' => $notice->id]) }}"
                                       class="btn btn-outline-primary btn-sm">Edit</a>
                                    <a class="btn btn-outline-danger btn-sm noticeID" data-toggle="modal"
                                       data-target="#deleteNotice-{{ $notice->id }}"
                                       data-id="{{ $notice->id }}">Delete</a>
                                    <p class="font-italic">Published on {{ $notice->created_at }}</p>
                                </li>
                                {{--delete notice modal--}}
                                <div class="modal fade" id="deleteNotice-{{ $notice->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-notify modal-danger" role="document">
                                        <!--Content-->
                                        <div class="modal-content">
                                            <!--Header-->
                                            <div class="modal-header">
                                                <p class="heading lead">Delete</p>

                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true" class="white-text">&times;</span>
                                                </button>
                                            </div>

                                            <!--Body-->
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <i class="fas fa-question fa-4x animated rotateInDownLeft"></i>
                                                    <p>Are you sure you want to delete this notice?</p>
                                                </div>
                                            </div>

                                            <!--Footer-->
                                            <div class="modal-footer justify-content-center">

                                                <form action="{{ route('lecturer-deleteNotice',['id' => $course->id, 'id1' => $notice->id]) }}"
                                                      method="get">
                                                    <input type="hidden" name="notice_id" id="notice_id" value=""/>
                                                    <button type="submit" class="btn btn-outline-danger waves-effect">
                                                        Yes
                                                    </button>
                                                    <a class="btn btn-outline-green waves-effect" data-dismiss="modal">No</a>
                                                </form>

                                            </div>
                                        </div>
                                        <!--/.Content-->
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                    <!--/.Panel 1-->
                    <!--Panel 2-->
                    <div class="tab-pane fade" id="notes" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            @foreach($course->lecturenotes as $lecturenote)
                                <li class="list-group-item">
                                    <strong>{{ $lecturenote->title }}</strong>
                                    <p>{{ $lecturenote->description }}</p>
                                    <a href="{{ route('lecturer-downlecturenote',['id' => $course->id, 'id1' => $lecturenote->id]) }}"
                                       class="btn btn-outline-primary btn-sm">Download</a>
                                    <a href="{{ route('lecturer-editLectureNotes',['id' => $course->id, 'id1' => $lecturenote->id]) }}"
                                       class="btn btn-outline-primary btn-sm">Edit</a>
                                    <a class="btn btn-outline-danger btn-sm lectureNoteID" data-toggle="modal"
                                       data-target="#deleteLectureNote-{{ $lecturenote->id }}"
                                       data-id="{{ $lecturenote->id }}">Delete</a>
                                    <p class="font-italic">Published on {{ $lecturenote->created_at }}</p>
                                </li>
                                {{--delete notice modal--}}
                                <div class="modal fade" id="deleteLectureNote-{{ $lecturenote->id }}" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="myModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-notify modal-danger" role="document">
                                        <!--Content-->
                                        <div class="modal-content">
                                            <!--Header-->
                                            <div class="modal-header">
                                                <p class="heading lead">Delete</p>

                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true" class="white-text">&times;</span>
                                                </button>
                                            </div>

                                            <!--Body-->
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <i class="fas fa-question fa-4x animated rotateInDownLeft"></i>
                                                    <p>Are you sure you want to delete this lecture note?</p>
                                                </div>
                                            </div>

                                            <!--Footer-->
                                            <div class="modal-footer justify-content-center">

                                                <form action="{{ route('lecturer-deleteLectureNote',['id' => $course->id, 'id1' => $lecturenote->id]) }}"
                                                      method="get">
                                                    <input type="hidden" name="lecture_note_id" id="lecture_note_id"
                                                           value=""/>
                                                    <button type="submit" class="btn btn-outline-danger waves-effect">
                                                        Yes
                                                    </button>
                                                    <a class="btn btn-outline-green waves-effect" data-dismiss="modal">No</a>
                                                </form>

                                            </div>
                                        </div>
                                        <!--/.Content-->
                                    </div>
                                </div>
                            @endforeach
                        </ul>

                    </div>
                    <!--/.Panel 2-->
                    <!--Panel 3-->
                    <div class="tab-pane fade" id="assignments" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            @foreach($course->assignments as $assignment)
                                <li class="list-group-item">
                                    <strong>{{ $assignment->assignment_id }}</strong>
                                    <p>{{ $assignment->description }}</p>
                                    <a href="{{ route('lecturer-downAssignment',['id' => $course->id, 'id1' => $assignment->id]) }}"
                                       class="btn btn-outline-primary btn-sm">Download Info</a>
                                    <a href="{{ route('lecturer-editAssignment',['id' => $course->id, 'id1' => $assignment->id]) }}"
                                       class="btn btn-outline-primary btn-sm">Edit</a>
                                    <a class="btn btn-outline-danger btn-sm assignmentID" data-toggle="modal"
                                       data-target="#deleteAssignment-{{ $assignment->id }}"
                                       data-id="{{ $assignment->id }}">Delete</a>
                                    <a href="{{ route('lecturer-viewAssignmentSubmissions',['id' => $course->id, 'id1' => $assignment->id]) }}"
                                       class="btn btn-outline-primary btn-sm">View Submissions</a>
                                    <p class="font-italic">Published
                                        on {{ $assignment->start_date }} {{ $assignment->start_time }}</p>
                                    <p class="font-italic">Deadline <span
                                                class="red-text">{{ $assignment->end_date }} {{ $assignment->end_time }}</span>
                                    </p>
                                </li>
                                {{--delete assignment modal--}}
                                <div class="modal fade" id="deleteAssignment-{{ $assignment->id }}" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="myModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-notify modal-danger" role="document">
                                        <!--Content-->
                                        <div class="modal-content">
                                            <!--Header-->
                                            <div class="modal-header">
                                                <p class="heading lead">Delete</p>

                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true" class="white-text">&times;</span>
                                                </button>
                                            </div>

                                            <!--Body-->
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <i class="fas fa-question fa-4x animated rotateInDownLeft"></i>
                                                    <p>Are you sure you want to delete this assignment?</p>
                                                </div>
                                            </div>

                                            <!--Footer-->
                                            <div class="modal-footer justify-content-center">

                                                <form action="{{ route('lecturer-deleteAssignment',['id' => $course->id, 'id1' => $assignment->id]) }}"
                                                      method="get">
                                                    <input type="hidden" name="assignment_id" id="assignment_id"
                                                           value=""/>
                                                    <button type="submit" class="btn btn-outline-danger waves-effect">
                                                        Yes
                                                    </button>
                                                    <a class="btn btn-outline-green waves-effect" data-dismiss="modal">No</a>
                                                </form>

                                            </div>
                                        </div>
                                        <!--/.Content-->
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                    <!--/.Panel 3-->
                    <!--Panel 4-->
                    <div class="tab-pane fade" id="submissions" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            @foreach($course->submissions as $submission)
                                <li class="list-group-item">
                                    <strong>{{ $submission->title }}</strong>
                                    <p>{{ $submission->description }}</p>
                                    <a href="{{ route('lecturer-downSubmission',['id' => $course->id, 'id1' => $submission->id]) }}"
                                       class="btn btn-outline-primary btn-sm">Download Info</a>
                                    <a href="{{ route('lecturer-editSubmission',['id' => $course->id, 'id1' => $submission->id]) }}"
                                       class="btn btn-outline-primary btn-sm">Edit</a>
                                    <a class="btn btn-outline-danger btn-sm submissionID" data-toggle="modal"
                                       data-target="#deleteSubmission-{{ $submission->id }}"
                                       data-id1="{{ $submission->id }}" data-id="{{ $course->id }}">Delete</a>
                                    <p class="font-italic">Published
                                        on {{ $submission->start_date }} {{ $submission->start_time }}</p>
                                    <p class="font-italic">Deadline <span
                                                class="red-text">{{ $submission->end_date }} {{ $submission->end_time }}</span>
                                    </p>
                                </li>
                                {{--delete submission modal--}}
                                <div class="modal fade" id="deleteSubmission-{{ $submission->id }}" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="myModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-notify modal-danger" role="document">
                                        <!--Content-->
                                        <div class="modal-content">
                                            <!--Header-->
                                            <div class="modal-header">
                                                <p class="heading lead">Delete</p>

                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true" class="white-text">&times;</span>
                                                </button>
                                            </div>

                                            <!--Body-->
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <i class="fas fa-question fa-4x animated rotateInDownLeft"></i>
                                                    <p>Are you sure you want to delete this submission?</p>
                                                </div>
                                            </div>

                                            <!--Footer-->
                                            <div class="modal-footer justify-content-center">

                                                <form action="{{ route('lecturer-deleteSubmission',['id' => $course->id, 'id1' => $submission->id]) }}"
                                                      method="get">
                                                    <input type="hidden" name="submission_id" id="submission_id"
                                                           value=""/>
                                                    <input type="hidden" name="course_id" id="course_id" value=""/>
                                                    <button type="submit" class="btn btn-outline-danger waves-effect">
                                                        Yes
                                                    </button>
                                                    <a class="btn btn-outline-green waves-effect" data-dismiss="modal">No</a>
                                                </form>

                                            </div>
                                        </div>
                                        <!--/.Content-->
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                    <!--/.Panel 4-->
                    <!--Panel 5-->
                    <div class="tab-pane fade" id="quizzes" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            @foreach($course->quizzes as $quiz)
                            <li class="list-group-item">
                                <strong>{{ $quiz->quiz_name }}</strong>
                                <br>
                                <a href="{{ route('view-quiz', [$course->id, $quiz->id]) }}" class="btn btn-outline-primary btn-sm">Go to</a>
                                <a href="#" class="btn btn-outline-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                <p class="font-italic">Published on {{ now() }}</p>
                                <p class="font-italic">Deadline <span class="red-text">{{ now() }}</span></p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--/.Panel 5-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on("click", ".noticeID", function () {
            var id = $(this).data('id');
            console.log(id);
            $(".modal-footer #notice_id").val(id);
        });
        $(document).on("click", ".lectureNoteID", function () {
            var id = $(this).data('id');
            console.log(id);
            $(".modal-footer #lecture_note_id").val(id);
        });
        $(document).on("click", ".assignmentID", function () {
            var id = $(this).data('id');
            console.log(id);
            $(".modal-footer #assignment_id").val(id);
        });
        $(document).on("click", ".submissionID", function () {
            var id1 = $(this).data('id1');
            var id = $(this).data('id');
            console.log(id1);
            console.log(id);
            $(".modal-footer #submission_id").val(id1);
            $(".modal-footer #course_id").val(id);
        });
    </script>
@endsection