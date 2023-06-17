<x-app-layout>
    <x-slot name="title">
        Create FAQ Question
    </x-slot>

    <div class="container_body">
        <div class="container_main">
            <div class="border">
                <div class="border_text">
                    <form action="{{ route('faq.store') }}" method="POST">
                        @csrf

                        <div>
                            <label for="category">Category</label>
                            <select name="faq_category_id" id="category">
                                <option value="">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                <option value="new_category">Create New Category</option>
                            </select>
                        </div>
                        

                        <div id="new-category-container" style="display: none;">
                            <label for="new-category">New Category</label>
                            <input type="text" name="new_category" id="new-category">
                        </div>

                        <div>
                            <label for="question">Question</label>
                            <input type="text" name="question" id="question" required>
                        </div>

                        <div>
                            <label for="answer">Answer</label>
                            <textarea name="answer" id="answer" rows="5" required></textarea>
                        </div>

                        <button class="button" type="submit">Create FAQ Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var categorySelect = document.getElementById('category');
            var newCategoryContainer = document.getElementById('new-category-container');
            var newCategoryInput = document.getElementById('new-category');

            categorySelect.addEventListener('change', function() {
                if (categorySelect.value === 'new_category') {
                    newCategoryContainer.style.display = 'block';
                    newCategoryInput.setAttribute('required', 'required');
                } else {
                    newCategoryContainer.style.display = 'none';
                    newCategoryInput.removeAttribute('required');
                }
            });
        });
    </script>
</x-app-layout>
