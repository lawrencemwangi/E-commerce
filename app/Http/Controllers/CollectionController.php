<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Requests\CollectionRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Collection::all();
        return view('backend.collection.list_collection', compact('collections'));
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
            $collection->save();      
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
        $categories = Category::all();
        return view('backend.collection.update_collection', compact('collection','categories' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollectionRequest $request, Collection $collection)
    {
        $collection = update($request->validated());

        if ($request->hasFile('image')) {

            if ($collection->image && Storage::disk('public')->exists('collection/' . $collection->image)) {
                Storage::disk('public')->delete('collection/' . $collection->image);
            }

            $image = $request->file('image');
            $imageName = Str::random(5) . '.' . $image->getClientOriginalExtension();            
            $imagePath = $image->storeAs('collection', $imageName, 'public');

            $collection->update(['image' => $imageName]);
        }

        return redirect()->route('collection.index')->with('success', [
            'message' => 'collection Updated successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        $colection->delete();

        return redirect()->route('collection.index')->with('success', [
            'message' => 'collection Deleted successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }


    public function filter_collection($category_slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $category_slug)->firstOrFail();

        $collections = $category->collection ?? collect();
        $collectionCount = $collections->count();

        return view('filter_collection', compact('collections', 'category', 'categories', 'collectionCount'));
    }
}
