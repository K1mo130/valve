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
                        <h2>{{ $post->title }}</h2><br>
                        <p>{{ $post->message }}</p><br>
                        <small>Gepost door {{ $post->user->name }} op {{ $post->created_at->format('d/m/y \o\m H:i') }}</small>
                        @if ($post->user_id == Auth::user()->id)
                            Edit link
                        @endif
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
