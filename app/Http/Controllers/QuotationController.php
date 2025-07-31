<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Http\Requests\QuotationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotations = Quotation::orderBy('created_at' ,'asc')->get();

        return view('backend.quotation.list_quotation', compact('quotations'));
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
     * 
    */
    public function store(QuotationRequest $request)
    {
        $validated = $request->validated();
        $validated['quotation_no'] = 'QUO-' . Str::random(4);
        $quotation = Quotation::create($validated);
    
        return redirect()->route('quotation')->with('success', [
            'message' => 'Quotation send successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quotation $quotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quotation $quotation)
    {
        return view('backend.quotation.update_quotation', compact('quotation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quotation $quotation)
    {
        $validated = $request->validate([
            'price' => ['required', 'numeric', 'min:0'],
            'discount' => ['nullable', 'numeric', 'min:0'],
        ]);

        $price = $validated['price'];
        $discount = $validated['discount'] ?? 0;
        $quantity = $quotation->quantity;

        $subTotal = $price * $quantity;
        $discountAmount = ($discount / 100) * $subTotal;
        $total = $subTotal - $discountAmount;

        $quotation->update([
            'price' => $price,
            'discount' => $discount,
            'total' => $total,
        ]); 

        return redirect()->route('quotation.index')->with('success', [
            'message' => 'Quotation updated successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quotation $quotation)
    {
        //
    }

    public function generateTemplate(Quotation $quotation)
    {
        if (is_null($quotation->price) || is_null($quotation->total)) {
            return redirect()->back()->with('error', [
                'message' => 'Quotation must have price and total before generating.',
                'duration' => $this->alert_message_duration,
            ]);
        }
        return view('backend.quotation.quotation_template', compact('quotation'));
    }
}
