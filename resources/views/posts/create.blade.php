<x-app-layout>
    <x-slot name="header">
        <h2 class="h2_title">Niewe post</h2>
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            <div class="border">
                <div class="border_text">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('posts.store') }}">
                        @csrf

                        <div>
                            <label for="title">title:</label><br>
                            <input name="title" type="text" value="{{ old('title') }}"><br>

                            @error('title')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div><br>

                        <div>
                            <label for="cover_image">Cover Image:</label><br>
                            <input type="file" name="cover_image" id="cover_image"><br>

                            @error('cover_image')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div><br>

                        <div>
                            <label for="content">Content:</label><br>
                            <textarea name="content" cols="30" rows="10">{{ old('content') }}</textarea><br>

                            @error('content')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>

                        <button type="submit" class="button">add Post</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
