<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $merchants = Merchant::with('stripeAccount')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        return view('admin.merchants.index', compact('merchants'));
    }
    
    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        return view('admin.merchants.create');
    }
    
    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'business_email' => 'required|email|unique:merchants,business_email',
            'business_phone' => 'required|string|max:20',
            'business_url' => 'required|url',
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:2',
            'business_type' => 'required|in:individual,company,non_profit',
            'industry' => 'required|string|max:100'
        ]);
        
        $validated['status'] = 'pending';
        $validated['merchant_id'] = 'MER-' . strtoupper(uniqid());
        
        $merchant = Merchant::create($validated);
        
        return redirect()->route('admin.merchants.show', $merchant->id)
            ->with('success', 'Merchant created successfully! Generate Stripe Connect keys to activate.');
    }
    
    public function show($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $merchant = Merchant::with(['stripeAccount', 'transactions'])->findOrFail($id);
        
        $transactionStats = [
            'total' => $merchant->transactions->count(),
            'completed' => $merchant->transactions->where('status', 'completed')->count(),
            'pending' => $merchant->transactions->where('status', 'pending')->count(),
            'failed' => $merchant->transactions->where('status', 'failed')->count(),
            'total_volume' => $merchant->transactions->where('status', 'completed')->sum('amount')
        ];
        
        return view('admin.merchants.show', compact('merchant', 'transactionStats'));
    }
    
    public function edit($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $merchant = Merchant::findOrFail($id);
        return view('admin.merchants.edit', compact('merchant'));
    }
    
    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $merchant = Merchant::findOrFail($id);
        
        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'business_email' => 'required|email|unique:merchants,business_email,' . $id,
            'business_phone' => 'required|string|max:20',
            'business_url' => 'required|url',
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:2',
            'business_type' => 'required|in:individual,company,non_profit',
            'industry' => 'required|string|max:100',
            'status' => 'required|in:pending,active,suspended,inactive'
        ]);
        
        $merchant->update($validated);
        
        return redirect()->route('admin.merchants.show', $merchant->id)
            ->with('success', 'Merchant updated successfully!');
    }
    
    public function destroy($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $merchant = Merchant::findOrFail($id);
        
        if ($merchant->stripeAccount && $merchant->stripeAccount->stripe_account_id) {
            return back()->withErrors(['error' => 'Cannot delete merchant with active Stripe account. Revoke keys first.']);
        }
        
        $merchant->delete();
        
        return redirect()->route('admin.merchants.index')
            ->with('success', 'Merchant deleted successfully!');
    }
}