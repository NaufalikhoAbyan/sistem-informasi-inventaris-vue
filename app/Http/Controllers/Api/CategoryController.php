<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Category::create($request->validate([
            'description' => ['required', 'string'],
            'category' => ['string' , 'required']
        ]));
        if($data){
            return new CategoryResource($data);
        }
        return response()->json(['message' => 'Category not created'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $category->update($request->validate([
            'description' => ['required', 'string'],
            'category' => ['string' , 'required']
        ]));
        if($data){
            return new CategoryResource($data);
        }
        return response()->json(['message' => 'Category not created'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Category deleted']);
    }
}
