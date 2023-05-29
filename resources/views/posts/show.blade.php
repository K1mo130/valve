<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $post->title }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    
                        <small>Gepost door <a href="{{ route('profile.edit', $post->user->name) }}">{{ $post->user->name }}</a> op {{ $post->created_at->format('d/m/y \o\m H:i') }}</small>
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
                                    <input type="submit" value="DELETE POST" style="background-color: red;" onclick="return confirm('Ben je zeker dat je dit post wilt verwijderen?');">
                                </form>
                            @endif
                        @endauth
                        <hr>

                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
