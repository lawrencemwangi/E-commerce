<x-admin-layout>

    <div class="quotation_container main_container">
        <h1>Add Quotation</h1><br>

        <div class="custom_form">
            <form action="{{ route('quotation.store') }}" method="post">
                @csrf

                <div class="input_group">
                    <label for="names">Names</label>
                    <input type="text" name="names" id="names" value="{{ old('names') }}" placeholder="Enter the Names">
                    <div class="inline_alert">{{ $errors->first('names') }}</div>
                </div>

                <div class="group">
                    <div class="input_group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter the email address">
                        <div class="inline_alert">{{ $errors->first('email') }}</div>
                    </div>

                    <div class="input_group">
                        <label for="contact">Contact <strong>(Whatapp one)</strong></label>
                        <input type="number" name="contact" id="contact" value="{{ old('contact') }}" placeholder="Enter the contact details">
                        <div class="inline_alert">{{ $errors->first('contact') }}</div>
                    </div>
                </div>

                <div class="group">
                    <div class="input_group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}"  min="1" placeholder="Enter the contact details">
                        <div class="inline_alert">{{ $errors->first('quantity') }}</div>
                    </div>

                    <div class="input_group">
                        <label for="collection_id">Collection Name</label>
                        <select name="collection_id" id="collection_id">
                            <option value="">-- Select Collection -- </option>
                            @foreach ($collections as $collection)
                                <option value="{{  $collection->id }}" {{ old('collection_id') == $collection->id ? 'selected' : '' }}>
                                    {{ $collection->stock->item_name }}
                                </option> 
                            @endforeach
                        </select>
                        <span class="inline_alert">{{ $errors->first('collection') }}</span>                         
                    </div>
                </div>

                <div class="group">
                    <div class="input_group">
                        <label for="color">Colors <strong>(3 max)</strong></label>
                        <input type="text" name="color" id="color" value="{{ old('color') }}" placeholder="Example: blue, white, Green">
                        <div class="inline_alert">{{ $errors->first('color') }}</div>
                    </div>

                    <div class="input_group">
                        <label for="size">Size <strong>(Specify)</strong></label>
                        <input type="text" name="size" id="size" value="{{ old('size') }}" placeholder="Example: 15&quot; * 15&quot;">
                        <div class="inline_alert">{{ $errors->first('size') }}</div>
                    </div>
                </div>
                <div class="input_group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="10" rows="7" placeholder="Write any other specification">{{ old('description') }}</textarea>
                </div>

                <button type="submit">Get Quotation</button>
            </form>
        </div>
    </div>
</x-admin-layout>