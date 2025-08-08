<x-admin-layout>
    <div class="title">
        <h1>Update Category</h1>
    </div>

    <form action="{{ route('category.update' , ['category' => $category]) }}" method="post">
        @csrf
        @method('PATCh')
        
        <div class="input_group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $category->title) }}" placeholder="Enter the title">
            <span class="inline_alert">{{ $errors->first('title') }}</span>
        </div>
        <button type="submit">Update</button>
    </form>
</x-admin-layout>