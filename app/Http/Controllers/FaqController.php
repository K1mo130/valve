<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;


class FaqController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('questions')->get();
        return view('faq', compact('categories'));
    }
}
