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
                    <a href="{{ route('add-results-manually') }}" class="list-group-item list-group-item-action">Add
                        Results Manually</a>
                    <a href="{{ route('add-results-using-csv') }}" class="list-group-item list-group-item-action">Add
                        Results Using CSV</a>
                    <a href="{{ route('check-results') }}" class="list-group-item list-group-item-action">Check
                        Results</a>
                    <a href="{{ route('apply-grades') }}" class="list-group-item list-group-item-action">Apply Grades</a>
                </div>
            </div>
        </div>
    </div>
</div>