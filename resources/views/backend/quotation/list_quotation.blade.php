<x-admin-layout>
    <x-header title="Quotations"/>

    <div class="message_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">No.</span>
                <span  class="user-col">Names</span>
                <span class="user-col">Email</span>
                <span class="user-col">Contact</span>
                 <span class="user-col">Collection Name</span>
                <span class="user-col">Action</span>
            </div>
             
            <div id="collectionList">
                @if (empty($quotations))
                    <p>No quotation Found at the moment</p> 
                @else
                    @foreach ($quotations as $quotation)
                        <div class="user_infor searchable">
                            <span class="user-col text-success">{{ $quotation->quotation_no }}</span>
                            <span class="user-col">{{ $quotation->names }}</span>
                            <span class="user-col">{{ $quotation->email }}</span>
                            <span class="user-col">{{ $quotation->contact }}</span>
                            <span class="user-col">{{ $quotation->collection->stock->item_name  }}</span>

                            <span class="action">
                                <a href="{{ route('quotation.edit', ['quotation' => $quotation]) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <a href="{{ route('quotation.generate', ['quotation' => $quotation]) }}">
                                    <i class="fas fa-download"></i>
                                </a>
                            </span>
                        </div>
                    @endforeach
                @endif   
            </div> 

            <div id="noResults" style="display: none; text-align: center; font-size: 1.1em; color: red; margin-top: 1em;">
                No results found.
            </div>  
        </div>
    </div>
</x-admin-layout>