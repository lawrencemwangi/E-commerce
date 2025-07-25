<x-admin-layout>
        <x-header title="Stock" addLink="{{ route('stock.create') }}"/>

    <div class="container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Item Names</span>
                <span class="user-col">Quantity</span>
                <span class="user-col">Stock Alert</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($stocks))
                <p>No Stock Found at the moment</p> 
            @else
                @foreach ($stocks as $stock)
                    <div class="user_infor">
                        <span class="user-col">{{ $stock->item_name }}</span>
                        <span class="user-col {{ $stock->quantity <= 10 ? 'text_danger' : 'text-success' }}">
                            {{ $stock->quantity }}
                            <span class="tooltip-text">
                              {{ $stock->quantity <= 10 ? 'Low stock! Restock soon.' : '' }}
                            </span>
                        </span>

                        <span class="user-col">
                            {{ $stock->low_stock_alert }}
                        </span>
                        
                        <span class="action">
                            <a href="{{ route('stock.edit', ['stock' => $stock]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </span>
                    </div>
                @endforeach
            @endif      
        </div>
    </div>
</x-admin-layout>