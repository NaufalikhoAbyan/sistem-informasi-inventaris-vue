<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemIn;
use Illuminate\Http\Request;

class ItemInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('BarangMasuk/Index', [
            'itemIns' => ItemIn::all()->load('item')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('BarangMasuk/Create', [
            'items' => Item::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'in_date' => ['date', 'required'],
            'in_quantity' => ['integer', 'min:0', 'required'],
            'item_id' => ['integer', 'required']
        ]);
        ItemIn::create($data);

        return redirect()->route('item-in.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemIn $item_in)
    {
        return inertia('BarangMasuk/Show', [
            'itemIn' => $item_in->load('item')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemIn $item_in)
    {
        return inertia('BarangMasuk/Edit', [
            'itemIn' => $item_in,
            'items' => Item::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemIn $item_in)
    {
        $data = $request->validate([
            'in_date' => ['date', 'required'],
            'in_quantity' => ['integer', 'min:0', 'required']
        ]);
        $item = Item::find($item_in['item_id']);
        if($item['stock'] - $item_in['in_quantity'] + $data['in_quantity'] < 0){
            return redirect()->back()->withErrors(['error' => 'The value of item quantity will result in less than zero']);
        }
        $item_in->update($data);
        return redirect()->route('item-in.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemIn $item_in)
    {
        $item = $item_in->item;
        if($item['stock'] - $item_in['in_quantity'] < 0){
            return redirect()->back()->withErrors(['error' => 'The value of item quantity will result in less than zero']);
        }
        $item_in->delete();
        return redirect()->route('item-in.index');
    }
}
