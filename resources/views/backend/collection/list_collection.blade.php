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
                <span class="user-col">In Stock</span>
                <span class="user-col">Action</span>
            </div>
             
            {{-- @if (empty($users))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($users as $user) --}}
                    <div class="user_infor">
                        <span class="user-col">#</span>
                        <span class="user-col">#</span>
                        <span class="user-col">#</span>
                        <span class="user-col">#</span>
                        <span class="user-col">#</span>
                        {{-- <span class="user-col"> <strong>{{ $user->user_level  == 1 ? 'Admin' : 'User'}}</strong></span>
                        <span class="user-col {{ $user->status == 1 ? 'text-success' : 'text-danger' }}">
                            {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                        </span> --}}
                        
                        <span class="action">
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </span>
                    </div>
                {{-- @endforeach
            @endif       --}}
        </div>
    </div>
</x-admin-layout>