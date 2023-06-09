<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Last news</h2>
    </x-slot>

    <div class="container_body">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($posts as $post)
                        <br>
                        <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2><br>
                        
                        <small>Posted by <a href="{{ route('profile.edit', $post->user->name) }}">{{ $post->user->name }}</a> at {{ $post->created_at->format('d/m/y \o\m H:i') }}</small>
                        
                        <p>{{ $post->content }}</p>
                        
                        <img src="/images/{{ $post->cover_image }}" style="width: 50%">

                        @auth
                            @if (Auth::user()->is_admin)
                                <a href="{{ route('like', $post->id) }}" class="text-green-500 hover:text-green-700">Like post</a><br>
                                <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-500 hover:text-yellow-700">Edit post</a><br>
                            @else
                                <a href="{{ route('like', $post->id) }}" class="text-green-500 hover:text-green-700">Like post</a><br>
                            @endif
                        @endauth

                        Post has {{ $post->likes()->count() }} likes
                        <hr>
                    @endforeach

                    @auth
                        @if (Auth::user()->is_admin)
                            <div class="mt-4">
                                <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded border border-black">Create Post</a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Include your CSS and JavaScript files -->
<link href="/css/style.css" rel="stylesheet" />
<script src="/js/script.js"></script>
