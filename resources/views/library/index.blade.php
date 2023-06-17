<x-app-layout>
    <x-slot name="title">
        Your Library
    </x-slot>

    <div class="container_body">
        @if (session('success'))
        <div class="border" style="padding: 1rem">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
        @endif

        <div class="container_main">
            <div class="border_product">
                @if ($libraries->isEmpty())
                <p>Your library is empty.</p>
                @else
                    @foreach ($libraries as $library)
                        <div class="border" style="padding: 1rem;">
                            <p>{{ $library->product->name }}</p>
                            <img src="{{ $library->product->image }}" style="width: 200px;">
                            <form action="{{ route('library.confirm-delete', $library->id) }}" method="GET">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
