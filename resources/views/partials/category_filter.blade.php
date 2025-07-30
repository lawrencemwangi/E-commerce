<div class="filter_collection">
    <span>
        <a href="{{ route('collection') }}">Service</a>
        <p>{{ $category->title }}</p>
    </span>
    <p>There's <strong>{{ $collectionCount }}</strong>  Service in <span>{{ $category->slug }}</span>category</p>
</div>