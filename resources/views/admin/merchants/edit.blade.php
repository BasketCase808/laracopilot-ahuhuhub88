@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Edit Merchant</h1>
    <p class="text-gray-600 mt-1">Update merchant account information</p>
</div>

<div class="bg-white rounded-xl shadow-md p-8 max-w-4xl">
    <form action="{{ route('admin.merchants.update', $merchant->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="border-b pb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Business Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Business Name *</label>
                    <input type="text" name="business_name" value="{{ old('business_name', $merchant->business_name) }}" required 
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('business_name') border-red-500 @enderror">
                    @error('business_name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Business Email *</label>
                    <input type="email" name="business_email" value="{{ old('business_email', $merchant->business_email) }}" required 
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('business_email') border-red-500 @enderror">
                    @error('business_email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Business Phone *</label>
                    <input type="text" name="business_phone" value="{{ old('business_phone', $merchant->business_phone) }}" required 
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('business_phone') border-red-500 @enderror">
                    @error('business_phone')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Business Website *</label>
                    <input type="url" name="business_url" value="{{ old('business_url', $merchant->business_url) }}" required 
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('business_url') border-red-500 @enderror">
                    @error('business_url')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Business Type *</label>
                    <select name="business_type" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('business_type') border-red-500 @enderror">
                        <option value="individual" {{ old('business_type', $merchant->business_type) === 'individual' ? 'selected' : '' }}>Individual</option>
                        <option value="company" {{ old('business_type', $merchant->business_type) === 'company' ? 'selected' : '' }}>Company</option>
                        <option value="non_profit" {{ old('business_type', $merchant->business_type) === 'non_profit' ? 'selected' : '' }}>Non-Profit</option>
                    </select>
                    @error('business_type')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Industry *</label>
                    <input type="text" name="industry" value="{{ old('industry', $merchant->industry) }}" required 
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('industry') border-red-500 @enderror">
                    @error('industry')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        
        <div class="border-b pb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Contact Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Contact Name *</label>
                    <input type="text" name="contact_name" value="{{ old('contact_name', $merchant->contact_name) }}" required 
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('contact_name') border-red-500 @enderror">
                    @error('contact_name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Contact Email *</label>
                    <input type="email" name="contact_email" value="{{ old('contact_email', $merchant->contact_email) }}" required 
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('contact_email') border-red-500 @enderror">
                    @error('contact_email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        
        <div class="border-b pb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Business Address</h2>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Address Line 1 *</label>
                    <input type="text" name="address_line1" value="{{ old('address_line1', $merchant->address_line1) }}" required 
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('address_line1') border-red-500 @enderror">
                    @error('address_line1')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Address Line 2</label>
                    <input type="text" name="address_line2" value="{{ old('address_line2', $merchant->address_line2) }}" 
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">City *</label>
                        <input type="text" name="city" value="{{ old('city', $merchant->city) }}" required 
                               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('city') border-red-500 @enderror">
                        @error('city')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">State *</label>
                        <input type="text" name="state" value="{{ old('state', $merchant->state) }}" required 
                               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('state') border-red-500 @enderror">
                        @error('state')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">ZIP Code *</label>
                        <input type="text" name="postal_code" value="{{ old('postal_code', $merchant->postal_code) }}" required 
                               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 @error('postal_code') border-red-500 @enderror">
                        @error('postal_code')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Country *</label>
                    <select name="country" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="US" {{ old('country', $merchant->country) === 'US' ? 'selected' : '' }}>United States</option>
                        <option value="CA" {{ old('country', $merchant->country) === 'CA' ? 'selected' : '' }}>Canada</option>
                        <option value="GB" {{ old('country', $merchant->country) === 'GB' ? 'selected' : '' }}>United Kingdom</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div>
            <h2 class="text-xl font-bold text-gray-800 mb-4">Account Status</h2>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                <select name="status" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="pending" {{ old('status', $merchant->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="active" {{ old('status', $merchant->status) === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="suspended" {{ old('status', $merchant->status) === 'suspended' ? 'selected' : '' }}>Suspended</option>
                    <option value="inactive" {{ old('status', $merchant->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>
        
        <div class="flex justify-end space-x-4 pt-6">
            <a href="{{ route('admin.merchants.show', $merchant->id) }}" class="px-6 py-3 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg font-semibold transition-all">
                Cancel
            </a>
            <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-all shadow-md">
                <i class="fas fa-save mr-2"></i>Update Merchant
            </button>
        </div>
    </form>
</div>
@endsection
