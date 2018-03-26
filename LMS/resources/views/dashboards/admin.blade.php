@section('title')
    Admin's Dashboard
@endsection

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Actions
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="{{ route('create-announcement') }}" class="list-group-item list-group-item-action">Post Announcement</a>
                    <a href="{{ route('register') }}" class="list-group-item list-group-item-action">Register User</a>
                    <a href="{{ route('add-course') }}" class="list-group-item list-group-item-action">Add Course</a>
                    <a href="{{ route('enroll-course') }}" class="list-group-item list-group-item-action">Enroll Course</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Check
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="{{ route('announcements') }}" class="list-group-item list-group-item-action">Announcements</a>
                    <a href="{{ route('admin-lectures') }}" class="list-group-item list-group-item-action">Lecturers</a>
                    <a href="{{ route('admin-students') }}" class="list-group-item list-group-item-action">Students</a>
                    <a href="{{ route('admin-courses') }}" class="list-group-item list-group-item-action">Courses</a>
                </div>
            </div>
        </div>
    </div>
</div>