@foreach ($collections as $collection)
    <div class="collection_contents">
        <div class="image">
            <img src="{{ $collection->getImage() }}" alt="Image Name">
        </div>

        <div class="collection_items">
            <div class="item_content">
                <h2>{{ $collection->stock->item_name }}</h2>
            </div>

            <div class="item_content">
            <p class="cat">{{ $collection->category->title }}</p>
            </div>
        </div>

        <p>{{ \Illuminate\Support\Str::limit($collection->description, 62) }}</p>

        <div class="collection_items">
            <div class="item_content">
                <p><span>Kshs. {{ number_format($collection->price) }}</span></p>
            </div>
            
            <div class="item_content">
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
    </div> 
@endforeach
