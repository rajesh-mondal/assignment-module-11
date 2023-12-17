@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <h1 class="mb-4 d-flex justify-content-between align-items-center">
            Sales History
            <a href="{{ url('/sales/create') }}" class="btn btn-primary">Sell Product</a>
        </h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity Sold</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Sale Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <th scope="row">{{ $sale->id }}</th>
                        <td>{{ $sale->product_name }}</td>
                        <td>{{ $sale->quantity_sold }}</td>
                        <td>{{ $sale->amount }}</td>
                        <td>{{ $sale->created_at }}</td>
                        <td>
                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            <a href="{{ route('sales.show', ['id' => $sale->id]) }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
