<x-app-layout>
    <x-slot name="title">
       {{ $post->title }}
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            <div class="border">
                <div class="border_text">
                    
                    
                        <small>Posted by <a href="{{ route('profile.edit', $post->user->name) }}">{{ $post->user->name }}</a> op {{ $post->created_at->format('d/m/y \o\m H:i') }}</small>
                        <br>
                        <br>
                        {{ $post->message }}
                        
                        @auth
                            @if ($post->user_id == Auth::user()->id)
                            <a href="{{ route('posts.edit', $post->id) }}">Edit post</a><br>
                            @else
                            <a href="{{ route('like', $post->id) }}">Like post</a><br>
                            @endif
                            
                        @endauth
                        <br>
                        Post heeft {{ $post->likes()->count() }} likes
                        
                        @auth
                            @if (Auth::user()->is_admin)
                                <br><br>
                                <form method="post" href="{{ route('posts.destroy', $post->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="DELETE NEWS" style="background-color: red; padding: 0.5rem;" onclick="return confirm('Are you sure that you want to delete this news?');">
                                </form>
                            @endif
                        @endauth
                        <hr>

                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
