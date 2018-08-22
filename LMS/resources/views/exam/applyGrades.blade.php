@extends('layouts.app')
@section('title')
    Apply Grades
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('apply-grades') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="a"><strong>A+</strong></label>
                                        <input type="text" class="form-control" id="a" name="aplus"
                                               value="{{ $grades['aplus'] }}" autofocus>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="a"><strong>A</strong></label>
                                        <input type="text" class="form-control" id="a" name="a"
                                               value="{{ $grades['a'] }}">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="a"><strong>A-</strong></label>
                                        <input type="text" class="form-control" id="a" name="amin"
                                               value="{{ $grades['amin'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="a"><strong>B+</strong></label>
                                        <input type="text" class="form-control" id="a" name="bplus"
                                               value="{{ $grades['bplus'] }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="a"><strong>B</strong></label>
                                        <input type="text" class="form-control" id="a" name="b"
                                               value="{{ $grades['b'] }}">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="a"><strong>B-</strong></label>
                                        <input type="text" class="form-control" id="a" name="bmin"
                                               value="{{ $grades['bmin'] }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="a"><strong>C+</strong></label>
                                        <input type="text" class="form-control" id="a" name="cplus"
                                               value="{{ $grades['cplus'] }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="a"><strong>C</strong></label>
                                        <input type="text" class="form-control" id="a" name="c"
                                               value="{{ $grades['c'] }}">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="a"><strong>C-</strong></label>
                                        <input type="text" class="form-control" id="a" name="cmin"
                                               value="{{ $grades['cmin'] }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="a"><strong>D+</strong></label>
                                        <input type="text" class="form-control" id="a" name="dplus"
                                               value="{{ $grades['dplus'] }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="a"><strong>D</strong></label>
                                        <input type="text" class="form-control" id="a" name="d"
                                               value="{{ $grades['d'] }}">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="a"><strong>D-</strong></label>
                                        <input type="text" class="form-control" id="a" name="dmin"
                                               value="{{ $grades['dmin'] }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4 offset-4">
                                    <div class="form-group">
                                        <label for="a"><strong>E</strong></label>
                                        <input type="text" class="form-control" id="a" name="e"
                                               value="{{ $grades['e'] }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mx-md-auto">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection