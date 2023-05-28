<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Niewe post</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('posts.store') }}">
                        @csrf

                        <label for="title">title:</label><br>
                        <input type="text" value="{{ old('title') }}"><br>

                        <label for="message">Content</label><br>
                        <textarea name="message" cols="30" rows="10">{{ old('message') }}</textarea><br>

                        <input type="button" value="submit">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
