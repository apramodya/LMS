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
                    <a href="{{ route('lecturer-check-resultsLecturer') }}" class="list-group-item list-group-item-action">View Results</a>
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
                    <a href="{{ route('lecturer-check-enrolledStudents') }}" class="list-group-item list-group-item-action">Enrolled Students</a>
                </div>
            </div>
        </div>
    </div>
</div>