@section('title')
    Exam Department's Dashboard
@endsection

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Actions
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="{{ route('add-results') }}" class="list-group-item list-group-item-action">Add Results Manually</a>
                    <a href="{{ route('add-results') }}" class="list-group-item list-group-item-action">Add Results Using CSV</a>
                </div>
            </div>
        </div>
    </div>
</div>