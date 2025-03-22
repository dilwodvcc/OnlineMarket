<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Volume;
use Illuminate\Routing\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $categories = Category::query()
            ->orderBy('id', 'desc')
            ->with(['images', 'parent'])
            ->get();
        $parentCategories = Category::query()
            ->whereNull('parent_id')
            ->orderBy('id', 'desc')
            ->limit(4)
            ->with('categories')
            ->get();
        $filters = request()->input('filters');
        $products = Product::query()
            ->orderBy('id', 'desc')
            ->with(['category', 'volume']) // Added 'volume' to eager load the relationship
            ->limit(10)
            ->get();
        return view('product-filter', [
            'products' => $products,
            'categories' => $categories,
            'parentCategories' => $parentCategories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $products)
    {
        //
    }
}
