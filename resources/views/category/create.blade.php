<x-app-layout>
    <div class="">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name">
            <button type="submit">Add Category</button>
        </form>
    </div>
</x-app-layout>
