<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.books.form', compact('categories'));
    }

  public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'publisher' => 'nullable|string|max:255',
        'year' => 'nullable|integer|min:1900|max:2100',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('cover')) {
        $data['cover'] = $request->file('cover')->store('covers', 'public');
    }

    Book::create($data);

    return redirect()->route('admin.books.index')
        ->with('success', 'Buku berhasil ditambahkan.');
}
    

        
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.form', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'publisher' => 'nullable|string|max:255',
        'year' => 'nullable|integer|min:1900|max:2100',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('cover')) {
        if ($book->cover) {
            Storage::disk('public')->delete($book->cover);
        }
        $data['cover'] = $request->file('cover')->store('covers', 'public');
    }

    $book->update($data);

    return redirect()->route('admin.books.index')
        ->with('success', 'Buku berhasil diperbarui.');
}
    
    public function destroy(Book $book)
    {
        $book->delete();
        return back()->with('success', 'Buku berhasil dihapus.');
    }
}