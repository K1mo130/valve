<x-app-layout>
    <x-slot name="header">
        <h2 class="h2_title">Library</h2>
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            <div class="border">
                <div class="border_text">
                    
                    
                    <div class="container">
                        <h2>Your Library</h2>
                        <div class="border_product">
                            @if ($libraries->isEmpty())
                                <p>Your library is empty.</p>
                            @else
                                <ul>
                                    @foreach ($libraries as $library)
                                        <li>{{ $library->product->name }}</li>
                                        <img src="{{ $library->product->image }}" style="width: 200px;">
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>