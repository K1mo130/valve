<x-app-layout>
    <x-slot name="title">
        Edit FAQ Category
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            <div class="border">
                <div class="border_text">
                    <form action="{{ route('faq.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name">Category Name</label>
                            <input type="text" name="name" id="name" value="{{ $category->name }}" required>
                        </div>

                        <button class="button" type="submit">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
