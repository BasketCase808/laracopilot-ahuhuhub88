<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\StripeAccount;
use Illuminate\Http\Request;

class StripeConnectController extends Controller
{
    public function generateKeys($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $merchant = Merchant::findOrFail($id);
        
        if ($merchant->stripeAccount && $merchant->stripeAccount->stripe_account_id) {
            return back()->withErrors(['error' => 'Merchant already has Stripe Connect keys.']);
        }
        
        // Simulate Stripe Connect account creation
        $stripeAccountId = 'acct_' . strtoupper(uniqid());
        $publishableKey = 'pk_test_' . bin2hex(random_bytes(16));
        $secretKey = 'sk_test_' . bin2hex(random_bytes(16));
        
        StripeAccount::create([
            'merchant_id' => $merchant->id,
            'stripe_account_id' => $stripeAccountId,
            'publishable_key' => $publishableKey,
            'secret_key' => $secretKey,
            'account_type' => 'standard',
            'status' => 'active',
            'capabilities' => json_encode([
                'card_payments' => 'active',
                'transfers' => 'active'
            ]),
            'charges_enabled' => true,
            'payouts_enabled' => true,
            'created_at' => now()
        ]);
        
        $merchant->update(['status' => 'active']);
        
        return redirect()->route('admin.merchants.show', $merchant->id)
            ->with('success', 'Stripe Connect keys generated successfully!');
    }
    
    public function revokeKeys($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $merchant = Merchant::with('stripeAccount')->findOrFail($id);
        
        if (!$merchant->stripeAccount) {
            return back()->withErrors(['error' => 'Merchant does not have Stripe Connect keys.']);
        }
        
        $merchant->stripeAccount->update([
            'status' => 'revoked',
            'charges_enabled' => false,
            'payouts_enabled' => false,
            'revoked_at' => now()
        ]);
        
        $merchant->update(['status' => 'suspended']);
        
        return redirect()->route('admin.merchants.show', $merchant->id)
            ->with('success', 'Stripe Connect keys revoked successfully!');
    }
    
    public function verifyAccount($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $merchant = Merchant::with('stripeAccount')->findOrFail($id);
        
        if (!$merchant->stripeAccount) {
            return back()->withErrors(['error' => 'Merchant does not have a Stripe account.']);
        }
        
        // Simulate account verification check
        $verificationStatus = [
            'verified' => true,
            'requirements' => [],
            'currently_due' => [],
            'past_due' => []
        ];
        
        $merchant->stripeAccount->update([
            'verification_status' => json_encode($verificationStatus),
            'verified_at' => now()
        ]);
        
        return redirect()->route('admin.merchants.show', $merchant->id)
            ->with('success', 'Account verification completed!');
    }
    
    public function updateCapabilities(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $merchant = Merchant::with('stripeAccount')->findOrFail($id);
        
        if (!$merchant->stripeAccount) {
            return back()->withErrors(['error' => 'Merchant does not have a Stripe account.']);
        }
        
        $capabilities = [
            'card_payments' => $request->has('card_payments') ? 'active' : 'inactive',
            'transfers' => $request->has('transfers') ? 'active' : 'inactive'
        ];
        
        $merchant->stripeAccount->update([
            'capabilities' => json_encode($capabilities)
        ]);
        
        return redirect()->route('admin.merchants.show', $merchant->id)
            ->with('success', 'Account capabilities updated successfully!');
    }
}