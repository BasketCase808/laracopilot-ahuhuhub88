@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Merchants</h1>
        <p class="text-gray-600 mt-1">Manage your merchant accounts and Stripe Connect integrations</p>
    </div>
    <a href="{{ route('admin.merchants.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-all shadow-md">
        <i class="fas fa-plus mr-2"></i>Add Merchant
    </a>
</div>

@if(session('success'))
<div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-lg mb-6">
    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
</div>
@endif

<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Business</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Industry</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Stripe Status</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Created</th>
                <th class="px-6 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($merchants as $merchant)
            <tr class="hover:bg-gray-50 transition-all">
                <td class="px-6 py-4">
                    <div>
                        <p class="font-semibold text-gray-800">{{ $merchant->business_name }}</p>
                        <p class="text-sm text-gray-600">{{ $merchant->business_email }}</p>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-700">{{ $merchant->industry }}</td>
                <td class="px-6 py-4">
                    @if($merchant->stripeAccount)
                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                            @if($merchant->stripeAccount->status === 'active') bg-green-100 text-green-800
                            @elseif($merchant->stripeAccount->status === 'revoked') bg-red-100 text-red-800
                            @else bg-gray-100 text-gray-800 @endif">
                            <i class="fas fa-cc-stripe mr-1"></i>{{ ucfirst($merchant->stripeAccount->status) }}
                        </span>
                    @else
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                            <i class="fas fa-times-circle mr-1"></i>Not Connected
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                        @if($merchant->status === 'active') bg-green-100 text-green-800
                        @elseif($merchant->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($merchant->status === 'suspended') bg-red-100 text-red-800
                        @else bg-gray-100 text-gray-800 @endif">
                        {{ ucfirst($merchant->status) }}
                    </span>
                </td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ $merchant->created_at->format('M d, Y') }}</td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.merchants.show', $merchant->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.merchants.edit', $merchant->id) }}" class="text-yellow-600 hover:text-yellow-800 font-medium">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                    <i class="fas fa-store text-4xl mb-4 text-gray-400"></i>
                    <p class="text-lg font-medium">No merchants found</p>
                    <p class="text-sm mt-2">Add your first merchant to get started</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $merchants->links() }}
</div>
@endsection
