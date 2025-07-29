<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Http\Requests\AssetsRequest;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::all();
        $asset_total = Asset::sum('price');
        return view('backend.assets.list_assets', compact('assets', 'asset_total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.assets.add_assets');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssetsRequest $request)
    {
        Asset::create($request->validated());
        return redirect()->route('assets.index')->with('success',[
            'message' => 'Asset Added Successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        //
    }
}
