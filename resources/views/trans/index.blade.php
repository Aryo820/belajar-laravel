@extends('app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="mb-3" align="right">
                        <a href="{{ route('trans.create') }}" class="btn btn-success">Create Order</a>
                    </div>
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>No</th>
                            <th>Order Number</th>
                            <th>Customer</th>
                            <th>Date End</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($datas as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->order_code }}</td>
                                <td>{{ $data->customer->name }}</td>
                                <td>{{ $data->order_end_date }}</td>
                                <td>{{ $data->status_text }}</td>
                                <td>
                                    <a href="{{ route('trans.show', $data->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('trans.destroy', $data->id) }}" method="post"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin Delete ?')"
                                            class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
