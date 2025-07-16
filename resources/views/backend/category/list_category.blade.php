<x-admin-layout>
    @include('backend.partials.link')
    <x-header title="Category" addLink="{{ route('category.create') }}"/>
    
    <div class="container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Title</span>
                <span class="user-col">Description</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($categories))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($categories as $category)
                    <div class="user_infor">
                        <span class="user-col">{{ $category->title }}</span>
                        <span class="user-col">{{ $category->slug }}</span>
                        <span class="action">
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form  id="deleteForm_" action="#" method="post">
                                @csrf
                                @method("DELETE")

                                <a href="javascript:void(0)" onclick="deleteItem();" >
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </form>
                        </span>
                    </div>
                @endforeach
            @endif      
        </div>
    </div>
</x-admin-layout>