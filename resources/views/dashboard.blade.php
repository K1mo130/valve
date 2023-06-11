<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Valve') }}
        </h2>
    </x-slot>

    <div class="container_body">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @guest
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You have to log in or register") }}
                </div>
                @else
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome, ") . Auth::user()->name }}
                </div>
                @endguest
            </div>

            <div class="flex justify-center">
                <div class="w-1/2 mx-2 my-4">
                    @foreach ($games as $game)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                            <h3>{{ $game['name'] }}</h3>
                            <img src="{{ $game['imageBackground'] }}" alt="{{ $game['name'] }}" style="width: 200px;">
                        </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
