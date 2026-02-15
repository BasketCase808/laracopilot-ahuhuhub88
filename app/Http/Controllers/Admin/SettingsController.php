<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlatformSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $settings = PlatformSetting::first() ?? new PlatformSetting();
        
        return view('admin.settings.index', compact('settings'));
    }
    
    public function update(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $validated = $request->validate([
            'platform_name' => 'required|string|max:255',
            'platform_fee_percentage' => 'required|numeric|min:0|max:100',
            'stripe_mode' => 'required|in:test,live',
            'auto_approve_merchants' => 'boolean',
            'require_verification' => 'boolean'
        ]);
        
        $settings = PlatformSetting::first();
        
        if ($settings) {
            $settings->update($validated);
        } else {
            PlatformSetting::create($validated);
        }
        
        return redirect()->route('admin.settings.index')
            ->with('success', 'Platform settings updated successfully!');
    }
}