<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Contact us</h2>
    </x-slot>

    <div class="container_body">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        @if (Session::has('message_send'))
                            <div class="alert alert-success" role="alert" style="background-color: green; border: 1px solid darkgreen; color: white; text-aline: center;">
                                {{ Session::get('message_send') }}
                            </div>
                        @endif
                    </div>                    
                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf

                        <div class="mt-4">
                            <label for="name">Name</label>
                            <input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="email">Email</label>
                            <input id="email" class="block mt-1 w-full" type="email" name="email" required />
                        </div>

                        <div class="mt-4">
                            <label for="message">Message</label>
                            <textarea id="message" class="block mt-1 w-full" name="message" required></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded border border-black">
                                {{ __('Send') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
