<x-app-layout>
    <x-slot name="header">
        <h2 class="h2_title">Edit FAQ Question</h2>
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            <div class="border">
                <div class="border_text">
                    <form action="{{ route('faq.update', $question->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="question">Question</label>
                            <input type="text" name="question" id="question" value="{{ $question->question }}" required>
                        </div>

                        <div>
                            <label for="answer">Answer</label>
                            <textarea name="answer" id="answer" rows="5" required>{{ $question->answer }}</textarea>
                        </div>

                        <button class="button" type="submit">Update FAQ Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>