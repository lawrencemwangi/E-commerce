<x-admin-layout>
    <div class="title">
        <h1> Add Collection</h1>
    </div><br>

    <form action="{{ route('collection.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        

       <div class="input_group">
            <label for="item_id">Item Name</label>
            <select name="item_id" id="item_id" onchange="updateStock(this)">
                <option value="">-- Select Item --</option>
                @foreach ($stocks as $stock)
                    <option value="{{ $stock->id }}" {{ old('item_id') }} data-quantity="{{ $stock->quantity }}">
                        {{ $stock->item_name }}
                    </option>
                @endforeach
            </select>
       </div>

        <div class="group">
            <div class="input_group">
                <label for="category_id">Category Name</label>
                <select name="category_id" id="category_id">
                    <option value="">-- Select Cateogry -- </option>
                    @foreach ($categories as $category)
                        <option value="{{  $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option> 
                    @endforeach
                </select>
                <span class="inline_alert">{{ $errors->first('category_id') }}</span>                         
            </div>

            <div class="input_group">
                <label for="Price">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" placeholder="Enter the Price">
                <span class="inline_alert">{{ $errors->first('Price') }}</span>                         
            </div>
        </div>

        <div class="group">
            <div class="input_group">
                <label for="featured">Featured</label>
                <div class="custom_radio_buttons">
                    <label>
                        <input class="option_radio" type="radio" name="featured" id="active" value="1" {{ old('featured') == '1' ? 'checked' : '' }}>
                        <span>Active</span>
                    </label>

                    <label>
                        <input class="option_radio" type="radio" name="featured" id="inactive" value="0" {{ old('featured') == '0' ? 'checked' : '' }}>
                        <span>Inacitve</span>
                    </label>
                    <span class="inline_alert">{{ $errors->first('featured') }}</span>
                </div>
            </div>

            <div class="input_content">
                <label for="visibility">Visibility</label>
                <div class="custom_radio_buttons">
                    <label>
                        <input class="option_radio" type="radio" name="visibility" id="yes" value="1" {{ old('visibility') == '1' ? 'checked' : '' }}>
                        <span>Yes</span>
                    </label>

                    <label>
                        <input class="option_radio" type="radio" name="visibility" id="no" value="0" {{ old('visibility') == '0' ? 'checked' : '' }}>
                        <span>No</span>
                    </label>
                    <span class="inline_alert">{{ $errors->first('visibility') }}</span>
                </div>
            </div>
        </div>

        <div class="group">
                <div class="input_group">
                    <label for="image">Product Image <strong>(Max is 2Mbs)</strong></label>
                    <input type="file" name="image"  id="image" accept="image/*" value="{{ old('image')}}" multiple>
                    <span class="inline_alert">{{ $errors->first('image') }}</span>
                </div>

                <div class="input_group">
                    <label for="in_stock">Stock Value</label>
                    <input type="number" name="in_stock" id="in_stock" min="1" value="{{ old('in_stock', $stock->quantity) }}" readonly>
                    <span class="inline_alert">{{ $errors->first('in_stock') }}</span> 
                </div>
        </div>

        <div class="input_content">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="7" rows="10" placeholder="Enter the description">{{ old('description') }}</textarea>
        </div>

        <button type="submit">Save</button>
    </form>
</x-admin-layout>

{{-- <script>
    function updateStock(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const quantity = selectedOption.getAttribute('data-quantity');

        document.getElementById('in_stock').value = quantity || 0;
    }
</script> --}}
<script>
    function updateStock(select) {
        const selected = select.options[select.selectedIndex];
        const quantity = selected.getAttribute('data-quantity');
        document.getElementById('in_stock').value = quantity;
        document.getElementById('in_stock_hidden').value = quantity;
    }
</script>