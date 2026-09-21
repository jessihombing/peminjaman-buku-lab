<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['user', 'book'])->latest()->paginate(10);
        return view('admin.loans.index', compact('loans'));
    }

    public function approve(Loan $loan)
    {
        if ($loan->status !== 'pending') {
            return back()->with('error', 'Peminjaman ini sudah diproses.');
        }

        if ($loan->book->stock < 1) {
            return back()->with('error', 'Stok buku habis.');
        }

        $loan->update(['status' => 'approved']);
        $loan->book->decrement('stock');

        return back()->with('success', 'Peminjaman disetujui.');
    }

    public function reject(Loan $loan)
    {
        if ($loan->status !== 'pending') {
            return back()->with('error', 'Peminjaman ini sudah diproses.');
        }

        $loan->update(['status' => 'rejected']);
        return back()->with('success', 'Peminjaman ditolak.');
    }
}