<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $totalMerchants = Merchant::count();
        $activeMerchants = Merchant::where('status', 'active')->count();
        $pendingMerchants = Merchant::where('status', 'pending')->count();
        $suspendedMerchants = Merchant::where('status', 'suspended')->count();
        
        $totalTransactions = Transaction::count();
        $totalVolume = Transaction::where('status', 'completed')->sum('amount');
        $monthlyVolume = Transaction::where('status', 'completed')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->sum('amount');
        
        $recentMerchants = Merchant::with('stripeAccount')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        $recentTransactions = Transaction::with('merchant')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        
        $merchantsByStatus = Merchant::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();
        
        return view('admin.dashboard', compact(
            'totalMerchants',
            'activeMerchants',
            'pendingMerchants',
            'suspendedMerchants',
            'totalTransactions',
            'totalVolume',
            'monthlyVolume',
            'recentMerchants',
            'recentTransactions',
            'merchantsByStatus'
        ));
    }
}