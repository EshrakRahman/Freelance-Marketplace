<x-app-layout>

    <div class="">
        <h2>Edit service</h2>
        <form action="{{ route('services.update', $service) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('name', $service->title) }}">
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description"
                    value="{{ old('description', $service->description) }}">
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price', $service->price) }}">
            </div>
            <div>
                <label for="category_id">Choose Category</label>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit">Edit service</button>
                <a href="{{ route('services.index') }}" type="submit">Go back</a>
            </div>

        </form>
    </div>
</x-app-layout>
