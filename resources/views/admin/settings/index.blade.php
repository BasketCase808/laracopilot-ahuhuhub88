@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Platform Settings</h1>
    <p class="text-gray-600 mt-1">Configure your Stripe Connect platform settings</p>
</div>

@if(session('success'))
<div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-lg mb-6">
    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
</div>
@endif

<div class="bg-white rounded-xl shadow-md p-8 max-w-3xl">
    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="border-b pb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">General Settings</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Platform Name</label>
                    <input type="text" name="platform_name" value="{{ old('platform_name', $settings->platform_name ?? 'Stripe Connect Platform') }}" required 
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('platform_name') border-red-500 @enderror">
                    @error('platform_name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        
        <div class="border-b pb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Stripe Configuration</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Stripe Mode</label>
                    <select name="stripe_mode" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="test" {{ old('stripe_mode', $settings->stripe_mode ?? 'test') === 'test' ? 'selected' : '' }}>Test Mode</option>
                        <option value="live" {{ old('stripe_mode', $settings->stripe_mode ?? 'test') === 'live' ? 'selected' : '' }}>Live Mode</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="border-b pb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Fee Settings</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Platform Fee Percentage</label>
                    <div class="flex items-center">
                        <input type="number" step="0.01" min="0" max="100" name="platform_fee_percentage" 
                               value="{{ old('platform_fee_percentage', $settings->platform_fee_percentage ?? 2.50) }}" required 
                               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('platform_fee_percentage') border-red-500 @enderror">
                        <span class="ml-3 text-gray-700 font-medium">%</span>
                    </div>
                    @error('platform_fee_percentage')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    <p class="text-sm text-gray-600 mt-2">This percentage will be deducted from each transaction as your platform fee</p>
                </div>
            </div>
        </div>
        
        <div>
            <h2 class="text-xl font-bold text-gray-800 mb-4">Merchant Management</h2>
            <div class="space-y-4">
                <div class="flex items-center">
                    <input type="checkbox" name="auto_approve_merchants" id="auto_approve" 
                           {{ old('auto_approve_merchants', $settings->auto_approve_merchants ?? false) ? 'checked' : '' }}
                           class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="auto_approve" class="ml-3 text-gray-700 font-medium">Auto-approve new merchants</label>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" name="require_verification" id="require_verification" 
                           {{ old('require_verification', $settings->require_verification ?? true) ? 'checked' : '' }}
                           class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="require_verification" class="ml-3 text-gray-700 font-medium">Require identity verification before generating keys</label>
                </div>
            </div>
        </div>
        
        <div class="flex justify-end space-x-4 pt-6">
            <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-all shadow-md">
                <i class="fas fa-save mr-2"></i>Save Settings
            </button>
        </div>
    </form>
</div>

<div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mt-6 max-w-3xl">
    <h3 class="text-lg font-bold text-blue-900 mb-3">
        <i class="fas fa-info-circle mr-2"></i>Important Information
    </h3>
    <ul class="space-y-2 text-sm text-blue-800">
        <li><i class="fas fa-check mr-2"></i>Platform fees are automatically calculated on each transaction</li>
        <li><i class="fas fa-check mr-2"></i>Test mode uses simulated Stripe keys for development</li>
        <li><i class="fas fa-check mr-2"></i>Live mode requires valid Stripe API credentials</li>
        <li><i class="fas fa-check mr-2"></i>Auto-approval bypasses manual merchant review</li>
    </ul>
</div>
@endsection
