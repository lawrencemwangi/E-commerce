<x-app-layout>
    @include('partials.navbar')

    <div class="collection_container">
        <div class="filter_collection">
            <span>
                <a href="{{ route('collection') }}">Collections</a> /
                <p>{{ $category->title }}</p>
            </span>
            <p>There's <strong>{{ $collectionCount }}</strong>  Collection in <span>{{ $category->slug }}</span>category</p>
        </div>

        <div class="main_container">
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
            <div class="service_items">
                @include('partials.list_collection')                  
            </div>
            @endif
        </div>
    </div>

    @include('partials.footer')
</x-app-layout>