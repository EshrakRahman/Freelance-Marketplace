<x-app-layout>

    <div class="">
        <h2>Add new service</h2>
        <form action="{{ route('services.store') }}" method="POST">
            @csrf

            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('name') }}">
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description">
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" name="price" id="price">
            </div>
            <div>
                <label for="category_id">Choose Category</label>
                <select name="category_id" id="category_id">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit">Add new service</button>
                <a href="{{ route('services.index') }}" type="submit">Go back</a>
            </div>

        </form>
    </div>
</x-app-layout>
do the tailwind css v4
