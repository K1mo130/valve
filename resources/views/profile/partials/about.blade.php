<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('About') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update your about information.') }}
        </p>
    </header>

    <form method="post" action="{{ route('update.about') }}" class="mt-6 space-y-6">
        @csrf

        <!-- About Field -->
        <div>
            <label for="about" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('About') }}
            </label>
            <textarea id="about" name="about" class="mt-1 block w-full" required>{{ old('about') ?? $user->about }}</textarea>
            @error('about')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-500 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'about-updated')
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
