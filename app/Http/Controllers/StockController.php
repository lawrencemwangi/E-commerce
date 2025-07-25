<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Requests\StockRequest;


class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::orderBy('created_at', 'asc')->get();
        return view('backend.stock.list_stock', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.stock.add_stock');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StockRequest $request)
    {
        Stock::create($request->validated());

        return redirect()->route('stock.index')->with('success',[
            'message' => 'Stock Item added sucessfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        return view('backend.stock.update_stock', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StockRequest $request, Stock $stock)
    {
        $stock->update($request->validated());

        return redirect()->route('stock.index')->with('success',[
            'message' => 'Stock Item Updated sucessfully',
            'duration' => $this->alert_message_duration,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
