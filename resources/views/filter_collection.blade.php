<x-app-layout>
    @include('partials.navbar')

    <div class="collection_container main_container">
        <div class="filter_collection">
            <a href="{{ route('collection') }}">Collections</a> /
            <p>There's <strong>{{ $collectionCount }}</strong> Collection in <span>{{ $category->slug }}</span> category</p>
        </div>

        @if ($collections->isempty())
            <p>No Collection found under this category.</p>
        @else
        <div class="collection_infor">
            @include('partials.list_collection')                  
        </div>
        @endif
    </div>

    @include('partials.footer')
</x-app-layout>