<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;

class FaqController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('questions')->get();
        return view('faq.index', compact('categories'));
    }

    public function create()
    {
        $categories = FaqCategory::all();
        return view('faq.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'faq_category_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);

        if ($validatedData['faq_category_id'] === 'new_category') {
            $category = FaqCategory::firstOrCreate(['name' => $request->input('new_category')]);
            $validatedData['faq_category_id'] = $category->id;
        }

        FaqQuestion::create($validatedData);

        return redirect()->route('faq.index')->with('success', 'FAQ question created successfully.');
    }

    public function edit(FaqQuestion $question) {
        return view('faq.edit', compact('question'));
    }

    public function update(Request $request, FaqQuestion $question) {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $question->update($validatedData);

        return redirect()->route('faq.index')->with('success', 'FAQ question updated successfully.');
    }

    public function destroy(FaqQuestion $question) {
        $question->delete();

        return redirect()->route('faq.index')->with('success', 'Question deleted successfully.');
    }

    public function editCategory($id) {
        $category = FaqCategory::findOrFail($id);
        return view('faq.edit-category', compact('category'));
    }

    public function updateCategory(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $category = FaqCategory::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('faq.index')->with('success', 'FAQ category updated successfully.');
    }

    public function destroyCategory(FaqCategory $category) {
        $category->delete();

        return redirect()->route('faq.index')->with('success', 'Category deleted successfully.');
    }
}

