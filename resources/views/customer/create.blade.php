@extends('app')
@section('content')
    <div class="row">
        <div class="col-12">
            <di class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        {{ $title }}
                    </h3>
                    <form action="{{ route('customer.store') }}" method="post">
                        @csrf
                        <label for="" class="form-lable">Name</label>
                        <input type="text" class="form-control" name="name" required>

                        <label for="" class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" required>

                        <label for="" class="form-label">Address</label>
                        <textarea name="address" class="form-control" cols="30" rows="5"></textarea>

                        <button type="submit" class="btn btn-primary mt-2">Create</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">Back</a>
                    </form>
                </div>
            </di>
        </div>
    </div>
@endsection
