<x-app-layout>
    <x-slot name="header">
        <h2 class="h2_title">
            {{ __('FAQ') }}
        </h2>
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            <div class="border">
                <div class="border_text">
                    <h3>Frequently Asked Questions</h3>
                    
                    @foreach ($categories as $category)
                        <h4>{{ $category->name }}</h4>
                        <ul>
                            @foreach ($category->questions as $question)
                                <li>
                                    <strong>{{ $question->question }}</strong>
                                    <p>{{ $question->answer }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
