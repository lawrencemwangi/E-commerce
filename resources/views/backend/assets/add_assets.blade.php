<x-admin-layout>
    <div class="title">
        <h1>Add Assets</h1>
    </div><br>
    
    <form action="{{ route('assets.store') }}" method="post">
        @csrf
        
        <div class="input_group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Enter the title">
            <span class="inline_alert">{{ $errors->first('title') }}</span>                         
        </div>

        <div class="group">
            <div class="input_group">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" value="{{ old('quantity') }}" placeholder="Enter the quantity">
                <span class="inline_alert">{{ $errors->first('quantity') }}</span>                         
            </div>
            
            <div class="input_group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" placeholder="Enter the price">
                <span class="inline_alert">{{ $errors->first('price') }}</span>                         
            </div>
        </div><br>

        <button type="submit">Add</button>
    </form>

</x-admin-layout>