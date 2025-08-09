<x-admin-layout>
    <div class="title">
        <h1>Update Asset</h1>
    </div>

    <form action="{{ route('assets.update' , ['asset' => $asset]) }}" method="post">
        @csrf
        @method('PATCh')
        
        <div class="input_group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $asset->title) }}" >
            <span class="inline_alert">{{ $errors->first('title') }}</span>
        </div>
        
        <div class="group">
            <div class="input_group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $asset->quantity) }}" >
                <span class="inline_alert">{{ $errors->first('quantity') }}</span>
            </div>

            <div class="input_group">
                <label for="price">price</label>
                <input type="number" name="price" id="price" value="{{ old('price', $asset->price) }}">
                <span class="inline_alert">{{ $errors->first('price') }}</span>
            </div>
        </div>
        <button type="submit">Update</button>
    </form>
</x-admin-layout>