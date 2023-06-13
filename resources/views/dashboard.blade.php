<x-app-layout>
    <x-slot name="header">
        <h2 class="h2_title">
            {{ __('Valve') }}
        </h2>
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            <div class="border">
                @guest
                <div class="border_text">
                    {{ __("You have to log in or register") }}
                </div>
                @else
                <div class="border_text">
                    {{ __("Welcome, ") . Auth::user()->name }}
                </div>
                @endguest
            </div>

            <div class="border_product">
                @foreach ($games as $game)
                    <div class="border" style="padding: 1rem">
                        <h3>{{ $game['name'] }}</h3>
                        <img src="{{ $game['imageBackground'] }}" alt="{{ $game['name'] }}" style="width: 200px;">

                        @auth
                            <form action="{{ route('library.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $game['id'] }}">
                                <button type="submit" class="btn btn-primary">Add to Library</button>
                            </form>
                        @endauth
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
