<x-app-layout>
    <x-slot name="header">
        <h2 class="h2_title">Contact us</h2>
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="border_text">
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
                            <button type="submit" class="button">
                                {{ __('Send') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
