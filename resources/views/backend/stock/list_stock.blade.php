<x-admin-layout>
    <div class="container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Full Names</span>
                <span class="user-col">Email</span>
                <span class="user-col">Contact</span>
                <span class="user-col">User Level</span>
                <span class="user-col">Status</span>
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
                        <span class="user-col"> <strong>#</strong></span>
                        <span class="user-col">
                            #
                        </span>
                        
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