@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">{{ $merchant->business_name }}</h1>
            <p class="text-gray-600 mt-1">Merchant ID: {{ $merchant->merchant_id }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.merchants.edit', $merchant->id) }}" class="px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg font-semibold transition-all">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="{{ route('admin.merchants.index') }}" class="px-6 py-3 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg font-semibold transition-all">
                <i class="fas fa-arrow-left mr-2"></i>Back
            </a>
        </div>
    </div>
</div>

@if(session('success'))
<div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-lg mb-6">
    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-lg mb-6">
    <i class="fas fa-exclamation-circle mr-2"></i>{{ $errors->first() }}
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between mb-2">
            <p class="text-gray-500 text-sm font-medium">Total Transactions</p>
            <i class="fas fa-exchange-alt text-blue-500 text-xl"></i>
        </div>
        <p class="text-3xl font-bold text-gray-800">{{ $transactionStats['total'] }}</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between mb-2">
            <p class="text-gray-500 text-sm font-medium">Completed</p>
            <i class="fas fa-check-circle text-green-500 text-xl"></i>
        </div>
        <p class="text-3xl font-bold text-gray-800">{{ $transactionStats['completed'] }}</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between mb-2">
            <p class="text-gray-500 text-sm font-medium">Total Volume</p>
            <i class="fas fa-dollar-sign text-purple-500 text-xl"></i>
        </div>
        <p class="text-3xl font-bold text-gray-800">${{ number_format($transactionStats['total_volume'], 2) }}</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-building text-blue-600 mr-3"></i>Business Information
        </h2>
        <div class="space-y-4">
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-600 font-medium">Business Name:</span>
                <span class="text-gray-800 font-semibold">{{ $merchant->business_name }}</span>
            </div>
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-600 font-medium">Business Email:</span>
                <span class="text-gray-800">{{ $merchant->business_email }}</span>
            </div>
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-600 font-medium">Business Phone:</span>
                <span class="text-gray-800">{{ $merchant->business_phone }}</span>
            </div>
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-600 font-medium">Website:</span>
                <a href="{{ $merchant->business_url }}" target="_blank" class="text-blue-600 hover:underline">{{ $merchant->business_url }}</a>
            </div>
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-600 font-medium">Business Type:</span>
                <span class="text-gray-800 capitalize">{{ $merchant->business_type }}</span>
            </div>
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-600 font-medium">Industry:</span>
                <span class="text-gray-800">{{ $merchant->industry }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600 font-medium">Status:</span>
                <span class="px-3 py-1 rounded-full text-xs font-semibold
                    @if($merchant->status === 'active') bg-green-100 text-green-800
                    @elseif($merchant->status === 'pending') bg-yellow-100 text-yellow-800
                    @elseif($merchant->status === 'suspended') bg-red-100 text-red-800
                    @else bg-gray-100 text-gray-800 @endif">
                    {{ ucfirst($merchant->status) }}
                </span>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-cc-stripe text-blue-600 mr-3"></i>Stripe Connect Integration
        </h2>
        
        @if($merchant->stripeAccount)
        <div class="space-y-4">
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-600 font-medium">Account ID:</span>
                <span class="text-gray-800 font-mono text-sm">{{ $merchant->stripeAccount->stripe_account_id }}</span>
            </div>
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-600 font-medium">Account Type:</span>
                <span class="text-gray-800 capitalize">{{ $merchant->stripeAccount->account_type }}</span>
            </div>
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-600 font-medium">Status:</span>
                <span class="px-3 py-1 rounded-full text-xs font-semibold
                    @if($merchant->stripeAccount->status === 'active') bg-green-100 text-green-800
                    @elseif($merchant->stripeAccount->status === 'revoked') bg-red-100 text-red-800
                    @else bg-gray-100 text-gray-800 @endif">
                    {{ ucfirst($merchant->stripeAccount->status) }}
                </span>
            </div>
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-600 font-medium">Charges Enabled:</span>
                <span class="{{ $merchant->stripeAccount->charges_enabled ? 'text-green-600' : 'text-red-600' }} font-semibold">
                    {{ $merchant->stripeAccount->charges_enabled ? 'Yes' : 'No' }}
                </span>
            </div>
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-600 font-medium">Payouts Enabled:</span>
                <span class="{{ $merchant->stripeAccount->payouts_enabled ? 'text-green-600' : 'text-red-600' }} font-semibold">
                    {{ $merchant->stripeAccount->payouts_enabled ? 'Yes' : 'No' }}
                </span>
            </div>
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-600 font-medium">Publishable Key:</span>
                <span class="text-gray-800 font-mono text-xs">{{ substr($merchant->stripeAccount->publishable_key, 0, 20) }}...</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600 font-medium">Secret Key:</span>
                <span class="text-gray-800 font-mono text-xs">{{ substr($merchant->stripeAccount->secret_key, 0, 20) }}...</span>
            </div>
            
            @if($merchant->stripeAccount->status === 'active')
            <form action="{{ route('admin.stripe.revoke', $merchant->id) }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to revoke Stripe Connect access?')" 
                        class="w-full px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold transition-all">
                    <i class="fas fa-ban mr-2"></i>Revoke Stripe Access
                </button>
            </form>
            @endif
        </div>
        @else
        <div class="text-center py-8">
            <i class="fas fa-plug text-gray-400 text-4xl mb-4"></i>
            <p class="text-gray-600 mb-6">No Stripe Connect integration yet</p>
            <form action="{{ route('admin.stripe.generate', $merchant->id) }}" method="POST">
                @csrf
                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-all shadow-md">
                    <i class="fas fa-key mr-2"></i>Generate Stripe Connect Keys
                </button>
            </form>
        </div>
        @endif
    </div>
</div>

<div class="bg-white rounded-xl shadow-md p-6 mt-6">
    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
        <i class="fas fa-map-marker-alt text-blue-600 mr-3"></i>Business Address
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <p class="text-gray-600 font-medium mb-1">Street Address</p>
            <p class="text-gray-800">{{ $merchant->address_line1 }}</p>
            @if($merchant->address_line2)
            <p class="text-gray-800">{{ $merchant->address_line2 }}</p>
            @endif
        </div>
        <div>
            <p class="text-gray-600 font-medium mb-1">Location</p>
            <p class="text-gray-800">{{ $merchant->city }}, {{ $merchant->state }} {{ $merchant->postal_code }}</p>
            <p class="text-gray-800">{{ $merchant->country }}</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-md p-6 mt-6">
    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
        <i class="fas fa-user text-blue-600 mr-3"></i>Contact Information
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="flex justify-between border-b pb-3">
            <span class="text-gray-600 font-medium">Contact Name:</span>
            <span class="text-gray-800">{{ $merchant->contact_name }}</span>
        </div>
        <div class="flex justify-between border-b pb-3">
            <span class="text-gray-600 font-medium">Contact Email:</span>
            <span class="text-gray-800">{{ $merchant->contact_email }}</span>
        </div>
    </div>
</div>
@endsection
