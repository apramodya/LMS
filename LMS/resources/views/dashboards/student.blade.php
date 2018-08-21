@section('title')
    Dashboard
@endsection

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Actions
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="{{ route('student-course-action') }}" class="list-group-item list-group-item-action">Course
                        Actions</a>
                </div>
                <div class="list-group">
                    <a href="{{route('student-attendace-excuses')}}" class="list-group-item list-group-item-action">Request
                        Excuses For Attendance</a>
                </div>
                <div class="list-group">
                    <a href="{{ route('student-exam-medicals') }}" class="list-group-item list-group-item-action">Submit
                        Medicals</a>
                </div>
                <div class="list-group">
                    <a href="{{ route('student-results') }}" class="list-group-item list-group-item-action">Check
                        Results</a>
                </div>
                <div class="list-group">
                    <a href="{{ route('student-gpa') }}" class="list-group-item list-group-item-action">Check GPA</a>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Connect
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="{{ route('email-user') }}" class="list-group-item list-group-item-action">Email Users</a>
                </div>

                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action">View Users </a>
                </div>

            </div>

        </div>
    </div>

</div>

