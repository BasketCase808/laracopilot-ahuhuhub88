<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Merchant;

class TransactionController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $transactions = Transaction::with('merchant')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        $totalVolume = Transaction::where('status', 'completed')->sum('amount');
        $totalFees = Transaction::where('status', 'completed')->sum('platform_fee');
        
        return view('admin.transactions.index', compact('transactions', 'totalVolume', 'totalFees'));
    }
    
    public function show($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $transaction = Transaction::with('merchant')->findOrFail($id);
        
        return view('admin.transactions.show', compact('transaction'));
    }
}