<x-admin-layout>
    <div class="title">
        <h1>Update Collection</h1>
    </div><br>

    <form action="{{ route('collection.update' , ['collection' => $collection]) }}" method="post">
        @csrf
        @method('PATCh')
        
        <div class="input_group">
            <label for="item_id">Title</label>
            <input type="text" name="item_id" id="item_id" value="{{ old('item_id', $collection->stock->item_name) }}">
            <span class="inline_alert">{{ $errors->first('item_id') }}</span>
        </div>

        <div class="group">
            <div class="input_group">
                <label for="category_id">Category Name</label>
                <select name="category_id" id="category_id">
                    <option value="">-- Select Cateogry -- </option>
                    @foreach ($categories as $category)
                        <option value="{{  $category->id }}" {{ old('category_id', $collection->category_id) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option> 
                    @endforeach
                </select>
                <span class="inline_alert">{{ $errors->first('category_id') }}</span>                         
            </div>

            <div class="input_group">
                <label for="item_id">Title</label>
                <input type="text" name="item_id" id="item_id" value="{{ old('item_id', $collection->stock->item_name) }}">
                <span class="inline_alert">{{ $errors->first('item_id') }}</span>
            </div>
        </div>
        <button type="submit">Update</button>
    </form>
</x-admin-layout>