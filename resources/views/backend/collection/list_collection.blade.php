<x-admin-layout>
    @include('backend.partials.link')
    <x-header title="Collections" addLink="{{ route('collection.create') }}"/>
    
    <div class="container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Title</span>
                <span class="user-col">Category</span>
                <span class="user-col">Price</span>
                <span class="user-col">Visibility</span>
                <span class="user-col">Featured</span>
                <span class="user-col">In Stock</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($collections))
                <p>No Collection Found at the moment</p> 
            @else
                @foreach ($collections as $collection)
                    <div class="user_infor">
                        <span class="user-col">{{ $collection->stock->item_name }}</span>
                        <span class="user-col">{{ $collection->category->title }}</span>
                        <span class="user-col">{{ $collection->price }}</span>
                        <span class="user-col {{ $collection->visibility == 1 ? 'text-success' : 'text-danger' }}">
                            {{ $collection->visibility == 1 ? 'Yes' : 'No' }}
                        </span>
                        <span class="user-col {{ $collection->featured == 1 ? 'text-success' : 'text-danger' }}">
                            {{ $collection->featured == 1 ? 'Active' : 'Inactive' }}
                        </span>
                        <span class="user-col">{{ $collection->in_stock }}</span>
                        
                        <span class="action">
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </span>
                    </div>
                @endforeach
            @endif      
        </div>
    </div>
</x-admin-layout>