<x-app-layout>
    <div class="">
        <form action="{{ route('categories.update', [$category->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Edit Category Name</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}">
            <button type="submit">Edit Category</button>
        </form>
    </div>
</x-app-layout>
