@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Sale</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('sales.update', $sale->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="product_id" class="form-label">Select Product</label>
                <select class="form-select" id="product_id" name="product_id" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" @if($product->id == $sale->product_id) selected @endif>{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity_sold" class="form-label">Quantity Sold</label>
                <input type="number" class="form-control" id="quantity_sold" name="quantity_sold" value="{{ $sale->quantity_sold }}" required>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" value="{{ $sale->amount }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Sale</button>
        </form>
    </div>
@endsection