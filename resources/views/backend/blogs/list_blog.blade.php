<x-admin-layout>
    @include('backend.partials.header', ['title' => 'Blogs', 'addLink' => '#'])

    <div class="message_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Title</span>
                <span class="user-col">Image</span>
                <span class="user-col">Description</span>
                <span class="user-col">created By</span>
                <span class="user-col">Action</span>
            </div>
             
            {{-- @if (empty($messages))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($messages as $message) --}}
                    <div class="user_infor">
                        <span class="user-col">#</span>
                        <span class="user-col">#</span>
                        <span class="user-col">#</span>
                        <span class="user-col">#</span>
                        <span class="action">
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form   action="#" method="post">
                                @csrf
                                @method("DELETE")

                                <a href="javascript:void(0)" onclick="deleteItem({{}}, '')" >
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </form>
                        </span>
                    </div>
                {{-- @endforeach
            @endif       --}}
        </div>
    </div>
</x-admin-layout>