@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $title }}</h3>
                    <form action="{{ route('level.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Level Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Insert Level Name"
                                required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
