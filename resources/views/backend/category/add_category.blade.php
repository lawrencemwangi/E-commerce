<x-admin-layout>
    <div class="title">
        <h1>Add Category</h1>
    </div>
    
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        
        <div class="input_group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Enter the title">
            <span class="inline_alert">{{ $errors->first('title') }}</span>                         
        </div>

        <button type="submit">Add</button>
    </form>
</x-admin-layout>
