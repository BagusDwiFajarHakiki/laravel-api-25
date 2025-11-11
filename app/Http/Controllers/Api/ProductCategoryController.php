<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Usually not used in API
        return response()->json(['message' => 'Not implemented'], 501);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        $productCategory = ProductCategory::create($validatedData);
        return response()->json($productCategory, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productCategory = ProductCategory::find($id);
        if (!$productCategory) {
            return response()->json(['message' => 'Product category not found'], 404);
        }
        return response()->json($productCategory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Usually not used in API
        return response()->json(['message' => 'Not implemented'], 501);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $productCategory = ProductCategory::find($id);
        if (!$productCategory) {
            return response()->json(['message' => 'Product category not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|max:255',
            'description' => 'nullable|string',
        ]);

        $productCategory->update($validatedData);
        return response()->json($productCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productCategory = ProductCategory::find($id);
        if (!$productCategory) {
            return response()->json(['message' => 'Product category not found'], 404);
        }
        $productCategory->delete();
        return response()->json(['message' => 'Product category deleted successfully']);
    }
}
