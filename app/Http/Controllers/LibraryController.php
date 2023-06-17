<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class LibraryController extends Controller
{
    public function store(Request $request) {
        $productId = $request->input('product_id');
        $userId = auth()->user()->id;
    
        // Check if the game is already in the library
        $existingLibrary = Library::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
    
        if ($existingLibrary) {
            return redirect()->back()->with('error', 'Game is already in your library.');
        }
    
        Library::create([
            'user_id' => $userId,
            'product_id' => $productId,
        ]);
    
        return redirect()->back()->with('success', 'Game added to library.');
    }

    public function index() {
        $userId = auth()->user()->id;
        $libraries = Library::where('user_id', $userId)->with('product')->get();
        return view('library.index', compact('libraries'));
    }

    public function confirmDelete($id) {
        $library = Library::findOrFail($id);
        return view('library.confirm-delete', compact('library'));
    }
    
    public function destroy($id) {
        $library = Library::findOrFail($id);
    
        // Delete the library record
        $library->delete();
    
        session()->flash('success', 'Game has been removed from your library.');
        return redirect()->route('library.index');;
    }

    public function delete($id) {
        $library = Library::findOrFail($id);
        $library->delete();
        
        session()->flash('success', 'Game has been removed from your library.');
        return redirect()->route('library.index');
    }

}
