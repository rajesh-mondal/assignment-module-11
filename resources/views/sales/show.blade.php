<!-- resources/views/sales/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Sale Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Product: {{ $sale->product_id }}</h5>
                <p class="card-text">Quantity Sold: {{ $sale->quantity_sold }}</p>
                <p class="card-text">Amount: {{ $sale->amount }}</p>
                <p class="card-text">Sale Date: {{ $sale->created_at }}</p>
            </div>
        </div>
    </div>
@endsection
