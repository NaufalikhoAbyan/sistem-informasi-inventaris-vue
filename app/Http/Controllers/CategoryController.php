<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = [
            'A' => $request->boolean('A'),
            'M' => $request->boolean('M'),
            'BHP' => $request->boolean('BHP'),
            'BTHP' => $request->boolean('BTHP'),
            'search' => $request->string('search'),
        ];
        return inertia( 'Kategori/Index', [
            'categories' => Category::filters($filters)->get(),
            'filters' => $filters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Kategori/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            Category::create($request->validate([
                'description' => ['string', 'required'],
                'category' => ['string', 'required']
            ]));
        } catch(Exception $e){
            DB::Rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        DB::commit();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return inertia('Kategori/Show', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return inertia('Kategori/Edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'description' => ['string', 'required'],
            'category' => ['string', 'required']
        ]);
        $category->update($data);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();
        } catch(Exception $e){
            return redirect()->route('category.index')->withErrors(['error' => 'Data tidak dapat dihapus karena sedang digunakan oleh data lain']);
        }
        return redirect()->route('category.index');
    }
}
