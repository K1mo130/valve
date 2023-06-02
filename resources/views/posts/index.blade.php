<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Alle posten</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($posts as $post)
                        <br>
                        <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2><br>
                        <small>Gepost door <a href="{{ route('profile.edit', $post->user->name) }}">{{ $post->user->name }}</a> op {{ $post->created_at->format('d/m/y \o\m H:i') }}</small>
                        @auth
                            @if ($post->user_id == Auth::user()->id)
                            <a href="{{ route('posts.edit', $post->id) }}">Edit post</a><br>
                            @else
                            <a href="{{ route('like', $post->id) }}">Like post</a><br>
                            @endif
                            
                        @endauth
                        Post heeft {{ $post->likes()->count() }} likes
                        <hr>
                    @endforeach

                    @auth
                        <div class="mt-4">
                            <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded border border-black">Create Post</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
