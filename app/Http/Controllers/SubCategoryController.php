<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;

class SubCategoryController extends Controller
{
    private $category;
    private $subcategory;

    public function __construct(Subcategory $subcategory, Category $category)
    {
        $this->subcategory = $subcategory;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = $this->subcategory->all();
        $categories = $this->category->all();
        return view('subcategories.index', compact('subcategories', 'categories'));
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
    public function store(CategoryStoreRequest $request)
    {
        $subcategory = $this->subcategory->create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        $subcategory = Subcategory::where('id', $subcategory->id)->with('category')->first();
        return view('subcategories.row', compact('subcategory'));
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
    public function edit(Subcategory $subcategory)
    {
        return response()->json(['subcategory' => $subcategory, 'success' => true, 'update_route' => route('subcategories.update', $subcategory->id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryStoreRequest $request, Subcategory $subcategory)
    {
        $subcategory->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return view('subcategories.row', compact('subcategory'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return response()->json(['success' => true, 'message' => 'Subcategory deleted successfully']);
    }
}
