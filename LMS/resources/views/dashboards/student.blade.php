@section('title')
    Student's Dashboard
@endsection

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Actions
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="{{ route('student-enroll-course') }}" class="list-group-item list-group-item-action">Enroll For Courses</a>
                </div>
            </div>
        </div>
    </div>
</div>