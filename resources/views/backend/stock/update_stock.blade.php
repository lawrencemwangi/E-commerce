<x-admin-layout>
    <div class="title">
        <h1>Add Stock</h1>
    </div><br>

    <form action="{{ route('stock.update',['stock' => $stock]) }}" method="post">
        @csrf
        @method('PATCH')

        <div class="input_group">
            <label for="item_name">Item name</label>
            <input type="text" name="item_name" id="item_name" value="{{ old('item_name', $stock->item_name) }}" placeholder="Enter the item name">
            <span class="inline_alert">{{ $errors->first('item_name') }}</span>                         
        </div>

        <div class="group">
            <div class="input_group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity',$stock->quantity) }}" placeholder="Enter the quantity">
                <span class="inline_alert">{{ $errors->first('quantity') }}</span>                         
            </div>

            <div class="input_group">
                <label for="low_stock_alert">Stock Alert</label>
                <input type="number" name="low_stock_alert" id="low_stock_alert" value="{{ old('low_stock_alert', $stock->low_stock_alert) }}" placeholder="Enter the stock alert value">
                <span class="inline_alert">{{ $errors->first('low_stock_alert') }}</span>                         
            </div>
        </div>

         <div class="input_group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="10" rows="7" placeholder="Enter the description">{{ old('description', $stock->description) }}</textarea>
            <span class="inline_alert">{{ $errors->first('title') }}</span>                         
        </div>


        <button type="submit">Update</button>
    </form>
</x-admin-layout>