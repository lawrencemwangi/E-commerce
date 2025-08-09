<x-admin-layout>
    <x-header title="Assets" addLink="{{ route('assets.create') }}"/>
    
    <div class="container user_container">
        <p>The total asset value As of <strong>{{ date('F j, Y') }} </strong> is <strong>{{ number_format($asset_total, 2) }}</strong></p><br>

        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Item</span>
                <span class="user-col">Quantity</span>
                <span class="user-col">Price</span>
                <span class="user-col">Action</span>
            </div>
             
            <div id="collectionList">
                @if (empty($assets))
                    <p>No Assets Found at the moment</p> 
                @else
                    @foreach ($assets as $asset)
                        <div class="user_infor searchable">
                            <span class="user-col">{{ $asset->title }}</span>
                            <span class="user-col">{{ $asset->quantity }}</span>
                            <span class="user-col">{{ $asset->price }}</span> 
                            <span class="action">
                                <a href="{{ route('assets.edit', ['asset' => $asset]) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form  id="deleteForm_{{ $asset->id }}" action="{{ route('assets.destroy', ['asset' => $asset->id]) }}" method="post">
                                    @csrf
                                    @method("DELETE")

                                    <a href="javascript:void(0)" onclick="deleteItem({{ $asset->id }}, 'assets');" >
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