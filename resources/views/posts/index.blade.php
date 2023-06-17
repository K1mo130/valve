<x-app-layout>
    <x-slot name="title">
        Last news
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            <div class="border">
                <div class="border_text">
                    <h1 style="font-size: 35px">News</h1>
                    @foreach ($posts as $post)
                        <br>
                        <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2><br>
                        
                        <small>Posted by <a href="{{ route('profile.edit', $post->user->name) }}">{{ $post->user->name }}</a> at {{ $post->created_at->format('d/m/y \o\m H:i') }}</small>
                        
                        <p>{{ $post->content }}</p>
                        
                        <img src="/images/{{ $post->cover_image }}" style="width: 50%">

                        @auth
                            @if (Auth::user()->is_admin)
                                <a href="{{ route('like', $post->id) }}" class="like">Like post</a><br>
                                <a href="{{ route('posts.edit', $post->id) }}" class="edit_link">Edit post</a><br>
                            @else
                                <a href="{{ route('like', $post->id) }}" class="like">Like post</a><br>
                            @endif
                        @endauth

                        Post has {{ $post->likes()->count() }} likes
                        <hr>
                    @endforeach

                    @auth
                        @if (Auth::user()->is_admin)
                            <div class="mt-4">
                                <a href="{{ route('posts.create') }}" class="button">Create News</a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>