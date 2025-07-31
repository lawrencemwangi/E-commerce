<x-admin-layout>
    <div class="title">
        <h1>Generate Quotation</h1>
    </div>

    <div class="quotation_container user_container">
       <form action="{{ route('quotation.update',['quotation' => $quotation]) }}" method="post">
            @csrf
            @method('PATCH')

            <ul>
                <li>Quotation Number: - <span class="text-success">{{ $quotation->quotation_no }}</span></li>
                <li>Client Names: - <span>{{ $quotation->names }}</span></li>
                <li>Client Email: - <span>{{ $quotation->email }}</span></li>
                <li>Client Contact: - <span>{{ $quotation->contact }}</span></li>
                <li>Collection Item: - <span>{{ $quotation->collection->stock->item_name }}</span></li>
                <li>Color: - <span>{{ $quotation->color }}</span></li>
                <li>Size: - <span>{{ $quotation->size }}</span></li>
                <li>Quantity: - <span>{{ $quotation->quantity }}</span></li>
                <li>Description: - <span>{{ $quotation->description ?? 'N/A' }}</span></li>
            </ul>

            <div class="group">
                <div class="input_group">
                    <label for="discount">Discount</label>
                    <input type="number" name="discount" id="discount" value="{{ old('discount') }}" placeholder="Example:- 10%">
                    <span class="inline_alert">{{ $errors->first('discount') }}</span>                
                </div>

                <div class="input_group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" placeholder="Example:- 10,000">
                    <span class="inline_alert">{{ $errors->first('price') }}</span>                
                </div>
            </div><br>

            <button type="submit">Generate</button>
       </form>
    </div>
</x-admin-layout>