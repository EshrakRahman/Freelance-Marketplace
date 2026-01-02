<x-app-layout>

    <div class="flex justify-center flex-col items-center mt-10 ">
        <h2 class=" text-xl">Catogries page</h2>
        <ul>
            @foreach ($categories as $category)
                <li class=" my-8">
                    <a href="{{ route('categories.show', [$category->id]) }}">
                        {{ $category->name }}
                    </a>

                    <form action="{{ route('categories.edit', [$category->id]) }}" method="GET">
                        @csrf
                        <button type="submit">Edit</button>
                    </form>
                    <form action="{{ route('categories.destroy', [$category->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>

    </div>

</x-app-layout>
