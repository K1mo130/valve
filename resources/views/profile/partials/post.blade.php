<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Recent Post') }}
        </h2>
    </header>
    <form method="get" action="profiel/post" class="mt-6 space-y-6">

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Created News</h2>
                @foreach ($user->posts as $post)
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a><br>
                @endforeach
                <hr>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Liked News</h2>
                @foreach ($user->likes as $like)
                    <a href="{{ route('posts.show', $like->post_id) }}">{{ $like->post->title }}</a><br>
                @endforeach
                <hr>
    </form>
</section>