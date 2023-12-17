<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index()
    {
        // $sales = DB::table('sales')->get();

        // return view('sales.index', compact('sales'));

        $sales = DB::table('sales')
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->select('sales.*', 'products.name as product_name')
            ->get();

        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = DB::table('products')->get();

        return view('sales.create', compact('products'));
    }

    public function sellProduct(Request $request)
    {
         // Validate the request
         $request->validate([
            'product_id' => 'required|numeric',
            'quantity_sold' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);
    
        $productId = $request->input('product_id');
        $quantitySold = $request->input('quantity_sold');
    
        if (is_numeric($quantitySold)) {
            DB::table('products')->where('id', $productId)->decrement('quantity', $quantitySold);
    
            DB::table('sales')->insert([
                'product_id' => $productId,
                'quantity_sold' => $quantitySold,
                'amount' => $request->input('amount'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            return redirect()->route('sales.index')->with('success', 'Product sold successfully!');
        } else {
            return redirect()->back()->with('error', 'Invalid quantity value.');
        }
    }

    public function show($id)
    {
        $sale = DB::table('sales')->find($id);

        return view('sales.show', compact('sale'));
    }

    public function showSales()
    {
        $todaySales = DB::table('sales')->whereDate('created_at', today())->sum('amount');
        $yesterdaySales = DB::table('sales')->whereDate('created_at', today()->subDay())->sum('amount');
        $thisMonthSales = DB::table('sales')->whereMonth('created_at', today())->sum('amount');
        $lastMonthSales = DB::table('sales')->whereMonth('created_at', today()->subMonth())->sum('amount');

        return view('dashboard', compact('todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
    }
}
