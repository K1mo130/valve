<x-app-layout>
    <x-slot name="title">
        FAQ
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            @if (session('success'))
                <div class="border" style="padding: 1rem; font-size: 25px">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="border">
                <div class="border_text">
                    <h1 style="font-size: 35px">Frequently Asked Questions</h1>
                    <br>
                    @foreach ($categories as $category)
                        <div class="category">
                            <h4 class="category_title">{{ $category->name }}</h4>
                            <div class="category_actions">
                                @if (Auth::user()->is_admin)
                                    <a href="{{ route('faq.categories.edit', $category->id) }}">Edit Category</a>
                                    <form action="{{ route('faq.categories.destroy', $category->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button" type="submit">Delete Category</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <ul class="faq-list">
                            @foreach ($category->questions as $question)
                                <li class="faq-item">
                                    <div class="question">{{ $question->question }}</div>
                                    <div class="answer">{{ $question->answer }}</div>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach

                    @auth
                        @if (Auth::user()->is_admin)
                            <div class="mt-4">
                                <a href="{{ route('faq.create') }}" class="button">Create FAQ</a>
                            </div>
                        @endif
                    @endauth

                </div>
            </div>

            @if (Auth::user()->is_admin)
                <div class="border" style="padding: 1rem">
                    <table>
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                @foreach ($category->questions as $question)
                                    <tr>
                                        <td>{{ $question->question }}</td>
                                        <td>{{ $question->answer }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('faq.edit', $question->id) }}">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('faq.destroy', $question->id) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>

