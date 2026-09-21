<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::with('category')
            ->when($request->search, function ($q, $s) {
                $q->where('title', 'like', "%$s%")
                  ->orWhere('author', 'like', "%$s%");
            })
            ->when($request->category, function ($q, $c) {
                $q->where('category_id', $c);
            })
            ->latest()
            ->paginate(9);

        $categories = Category::all();

        return view('books.index', compact('books', 'categories'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
}