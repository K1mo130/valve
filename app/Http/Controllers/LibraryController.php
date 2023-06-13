<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;

class LibraryController extends Controller
{
    public function store(Request $request) {
        $productId = $request->input('product_id');
        $userId = auth()->user()->id;

        Library::create([
            'user_id' => $userId,
            'product_id' => $productId,
        ]);

        return redirect()->back()->with('success', 'Product added to library.');
    }

    public function index() {
        $userId = auth()->user()->id;
        $libraries = Library::where('user_id', $userId)->with('product')->get();

        return view('library.index', ['libraries' => $libraries]);
    }
}
