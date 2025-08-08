<x-admin-layout>
    @include('backend.partials.link')
    <x-header title="Category" addLink="{{ route('category.create') }}"/>
    
    <div class="container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Title</span>
                <span class="user-col">Slug</span>
                <span class="user-col">Action</span>
            </div>
             
            <div id="collectionList">
                @if (empty($categories))
                    <p>No User Found at the moment</p> 
                @else
                    @foreach ($categories as $category)
                        <div class="user_infor searchable">
                            <span class="user-col">{{ $category->title }}</span>
                            <span class="user-col">{{ $category->slug }}</span>
                            <span class="action">
                                <a href="{{ route('category.edit' , ['category' => $category]) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form  id="deleteForm_{{ $category->id }}" action="{{ route('category.destroy', ['category' => $category->id]) }}" method="post">
                                    @csrf
                                    @method("DELETE")

                                    <a href="javascript:void(0)" onclick="deleteItem({{ $category->id }}, 'categories');" >
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </form>
                            </span>
                        </div>
                    @endforeach
                @endif 
            </div>  
            
            <div id="noResults" style="display: none; text-align: center; color: red; margin-top: 1em;">
                No results found.
            </div> 
        </div>
    </div>
</x-admin-layout>