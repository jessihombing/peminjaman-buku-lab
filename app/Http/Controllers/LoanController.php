<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with('book')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('loans.index', compact('loans'));
    }

    public function store(Book $book)
    {
        if ($book->stock < 1) {
            return back()->with('error', 'Stok buku habis.');
        }

        // Cek apakah user sudah pernah pinjam buku ini dan belum dikembalikan
        $existing = Loan::where('user_id', auth()->id())
            ->where('book_id', $book->id)
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($existing) {
            return back()->with('error', 'Kamu sudah meminjam buku ini.');
        }

        Loan::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'loan_date' => now(),
            'due_date' => now()->addDays(7),
            'status' => 'pending',
        ]);

        return back()->with('success', 'Peminjaman berhasil diajukan! Tunggu approval admin.');
    }

    public function return(Loan $loan)
    {
        if ($loan->user_id !== auth()->id()) {
            abort(403);
        }

        if ($loan->status !== 'approved') {
            return back()->with('error', 'Peminjaman belum disetujui admin.');
        }

        $loan->update([
            'status' => 'returned',
            'return_date' => now(),
        ]);

        $loan->book->increment('stock');

        return back()->with('success', 'Buku berhasil dikembalikan.');
    }
}