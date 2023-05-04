<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    private $subcategory;
    private $product;

    public function __construct(Product $product, Subcategory $subcategory)
    {
        $this->subcategory = $subcategory;
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = $this->subcategory->all();
        $products = $this->product->with('subcategory')->get();
        return view('products.index', compact('subcategories', 'products'));
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
    public function store(ProductStoreRequest $request)
    {
        $product = $this->product->create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'subcategory_id' => $request->subcategory_id,
        ]);

        $product = Product::where('id', $product->id)->with('subcategory')->first();
        return view('products.row', compact('product'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return response()->json(['product' => $product, 'success' => true, 'update_route' => route('products.update', $product->id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductStoreRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'subcategory_id' => $request->subcategory_id,

        ]);

        $product = Product::where('id', $product->id)->with('subcategory')->first();
        return view('products.row', compact('product'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['success' => true, 'message' => 'Product deleted successfully']);
    }
}
