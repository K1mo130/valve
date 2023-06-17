<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Avatar') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Upload and save your avatar image.') }}
        </p>
    </header>

    <form method="post" action="{{ route('update.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <!-- Avatar Field -->
        <div>
            <label for="avatar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Avatar') }}
            </label>
            <img src="{{ Storage::url('avatars/' . Auth::user()->avatar) }}" width="100px" alt="Avatar" class="w-8 h-8 rounded-full">
            <input type="file" id="avatar" name="avatar" class="mt-1 block w-full" required />
            @error('avatar')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    
        <!-- Submit Button -->
        <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-500 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500">
                {{ __('Save') }}
            </button>
    
            @if (session('status') === 'avatar-updated')
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>    
</section>
