<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Birthday') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update your birthday.') }}
        </p>
    </header>

    <form method="post" action="{{ route('update.birthday') }}" class="mt-6 space-y-6">
        @csrf

        <!-- Birthday Field -->
        <div>
            <label for="birthday" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Birthday') }}
            </label>
            <input type="date" id="birthday" name="birthday" class="mt-1 block w-full" value="{{ old('birthday') ?? $user->birthday }}" required />
            @error('birthday')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-500 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'birthday-updated')
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
