<x-app-layout>
    <x-slot name="title">
        Home page
    </x-slot>

    <div class="container_body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

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
                    <div class="border" style=" padding: 1rem;">
                        <h3 style="font-size: 30px">{{ $game['name'] }}</h3>
                        <br>
                        <img src="{{ $game['imageBackground'] }}" alt="{{ $game['name'] }}" style="width: 300px;">
                        <br>
                        @auth
                            <form action="{{ route('library.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $game['id'] }}">
                                <button class="button" type="submit" class="btn btn-primary">Add to Library</button>
                            </form>
                        @endauth
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>