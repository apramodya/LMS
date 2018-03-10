@section('title')
    Admin Dashboard
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
                    <a href="#" class="list-group-item list-group-item-action">...</a>
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
                    <a href="#" class="list-group-item list-group-item-action">Lecturers</a>
                    <a href="#" class="list-group-item list-group-item-action">Students</a>
                </div>
            </div>
        </div>
    </div>
</div>