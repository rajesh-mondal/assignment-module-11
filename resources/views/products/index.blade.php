@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 d-flex justify-content-between align-items-center">
            Product List
            <a href="{{ url('/products/create') }}" class="btn btn-primary">Add New Product</a>
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
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ url('/products/edit', ['id' => $product->id]) }}" class="btn btn-primary btn-sm">Edit</a>

                            <form method="POST" action="{{ url('/products/delete', ['id' => $product->id]) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection