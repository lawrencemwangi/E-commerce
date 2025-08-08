@props(['title', 'addLink' => null])

<div class="headers {{ !$addLink ? 'no-btn' : '' }}">
    <h1>{{ $title }}</h1>

    <div class="search">
        <input  type="text" name="search" id="myInput" onkeyup="searchFunction()" placeholder="Search anything here...">
        {{-- <span><i class="fas fa-search"></i></span> --}}
    </div>
    
    @if ($addLink)
        <div class="btn">
            <button><a href="{{ $addLink }}">Add New</a></button>
        </div>
    @endif
</div>
