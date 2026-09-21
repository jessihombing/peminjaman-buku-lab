<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'books' => Book::count(),
            'users' => User::where('role', 'user')->count(),
            'loans' => Loan::count(),
            'pending' => Loan::where('status', 'pending')->count(),
        ];

        $recentLoans = Loan::with(['user', 'book'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentLoans'));
    }
}