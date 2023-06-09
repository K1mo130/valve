<x-app-layout>
    <x-slot name="title">
        Edit post
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            <div class="border">
                <div class="border_text">
                    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="title">title:</label><br>
                            <input name="title" type="text" value="{{ $post->title }}"><br>

                            @error('title')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>

                        <div>
                            <label for="cover_image">Cover Image:</label><br>
                            <input type="file" name="cover_image" id="cover_image"><br>
                            @if ($post->cover_image)
                                <img src="{{ asset('storage/' . $post->cover_image) }}" alt="Cover Image" style="max-width: 200px;"><br>
                            @endif
                            @error('cover_image')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div><br>

                        <div>
                            <label for="content">Content</label><br>
                            <textarea name="content" cols="30" rows="10">{{ $post->message }}</textarea><br>

                            @error('content')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>

                        <button type="submit" class="button">Edit News</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
