<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Auth;

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
        
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Only admins can create faq.');
        }

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
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Only admins can edit faq.');
        }

        return view('faq.edit', compact('question'));
    }

    public function update(Request $request, FaqQuestion $question) {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $question->update($validatedData);

        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can update faq.');
        }

        return redirect()->route('faq.index')->with('success', 'FAQ question updated successfully.');
    }

    public function destroy(FaqQuestion $question) {
        $question->delete();

        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can delete faq.');
        }

        return redirect()->route('faq.index')->with('success', 'Question deleted successfully.');
    }

    public function editCategory($id) {
        $category = FaqCategory::findOrFail($id);

        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can edit category.');
        }

        return view('faq.edit-category', compact('category'));
    }

    public function updateCategory(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can update category.');
        }

        $category = FaqCategory::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('faq.index')->with('success', 'FAQ category updated successfully.');
    }

    public function destroyCategory(FaqCategory $category) {
        $category->delete();

        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can update category.');
        }

        return redirect()->route('faq.index')->with('success', 'Category deleted successfully.');
    }
}

