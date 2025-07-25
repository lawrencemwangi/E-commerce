<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Requests\CollectionRequest;
use Illuminate\Support\Str;


class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.collection.list_collection');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $stocks = Stock::all();
        return view('backend.collection.add_collection', compact('categories', 'stocks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollectionRequest $request)
    {
        $collection = Collection::create($request->validated());
         
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(5) . '.' . $image->getClientOriginalExtension();            
            $imagePath = $image->storeAs('collection', $imageName, 'public');
            $collection->image = $imageName;        
        }

        return redirect()->route('collection.index')->with('success', [
            'message' => 'collection added successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
