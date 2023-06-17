<x-app-layout>
    <x-slot name="title">
        Confirm Delete
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            <div class="border_product">
                <h3>Are you sure you want to remove <strong>{{ $library->product->name }}</strong> from your library?</h3>
                    <form action="{{ route('library.destroy', $library->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes</button>
                        <button type="button" class="btn btn-danger" onclick="cancelDelete()">No</button>
                    </form>
            </div>
        </div>
    </div>
    <script>
        function cancelDelete() {
            window.history.back(); // Go back to the previous page
        }
    </script>
</x-app-layout>
