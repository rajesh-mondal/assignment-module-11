<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {
    public function index() {
        return view( 'dashboard' );
    }

    public function create() {
        return view( 'products.create' );
    }

    public function store( Request $request ) {
        DB::table( 'products' )->insert( [
            'name'       => $request->name,
            'quantity'   => $request->quantity,
            'price'      => $request->price,
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        return redirect( '/products' )->with( 'success', 'Product added successfully!' );
    }

    public function edit( $id ) {
        $product = DB::table( 'products' )->find( $id );
        return view( 'products.edit', compact( 'product' ) );
    }

    public function update( Request $request, $id ) {
        DB::table( 'products' )->where( 'id', $id )->update( [
            'name'       => $request->input( 'name' ),
            'quantity'   => $request->input( 'quantity' ),
            'price'      => $request->input( 'price' ),
            'updated_at' => now(),
        ] );

        return redirect( '/products' )->with( 'success', 'Product updated successfully!' );
    }

    public function destroy( $id ) {
        DB::table( 'products' )->where( 'id', $id )->delete();

        return redirect( '/products' )->with( 'success', 'Product deleted successfully!' );
    }

    public function showAll() {
        $products = DB::table( 'products' )->get();
        return view( 'products.index', compact( 'products' ) );
    }

}
