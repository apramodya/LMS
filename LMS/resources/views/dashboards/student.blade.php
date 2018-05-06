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
                    <a href="{{ route('student-course-action') }}" class="list-group-item list-group-item-action">Course Actions</a>
                </div>

                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action">Subject Selection</a>
                </div>

                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action">Submit Medicals</a>
                </div>

            </div>

        </div>
    </div>
</div>