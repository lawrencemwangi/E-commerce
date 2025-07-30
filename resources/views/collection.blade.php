<x-app-layout>
    @include('partials.navbar')
    
    <div class="collection_container main_container">
        <h1>our collection</h1>
        
        <div class="collection_infromation">
            <div class="category_items">
                @foreach ($categories as $category)
                    <div class="category">
                        <ul>
                            <li>
                                <a href="{{ route('byCategory', ['category_slug' => $category->slug]) }}">
                                    {{ $category->title }}
                                </a>
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>

            @if ($collections->isempty())
                <p>No Collection found under this category.</p>
            @else
            <div class="collection_infor">
                @include('partials.list_collection')
            </div>
            @endif
        </div>        
    </div>
    @include('partials.footer')
</x-app-layout>