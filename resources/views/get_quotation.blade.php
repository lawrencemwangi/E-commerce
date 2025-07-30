<x-app-layout>
    @include('partials.navbar')

    <div class="quotation_container main_container">
        <h1>Get Quotation</h1><br>

        <div class="custom_form">
            <form action="#" method="post">
                @csrf

                <div class="group">
                    <div class="input_group">
                        <label for="names">Names</label>
                        <input type="text" name="names" id="names" value="{{ old('names') }}" placeholder="Enter the Names">
                        <div class="inline_alert">{{ $errors->first('names') }}</div>
                    </div>

                    <div class="input_group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter the email address">
                        <div class="inline_alert">{{ $errors->first('email') }}</div>
                    </div>
                </div>

                <div class="group">
                    <div class="input_group">
                        <label for="contact">Contact <strong>(Whatapp one)</strong></label>
                        <input type="number" name="contact" id="contact" value="{{ old('contact') }}" placeholder="Enter the contact details">
                        <div class="inline_alert">{{ $errors->first('contact') }}</div>
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
                        <label for="Color">Colors <strong>(3 max)</strong></label>
                        <input type="text" name="Color" id="Color" value="{{ old('Color') }}" placeholder="Example: blue, white, Green">
                        <div class="inline_alert">{{ $errors->first('Color') }}</div>
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
    @include('partials.footer')
</x-app-layout>