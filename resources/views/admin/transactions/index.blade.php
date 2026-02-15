@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Transactions</h1>
    <p class="text-gray-600 mt-1">Monitor all payment transactions across your platform</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Volume</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">${{ number_format($totalVolume, 2) }}</p>
            </div>
            <div class="bg-green-100 rounded-full p-4">
                <i class="fas fa-dollar-sign text-green-600 text-2xl"></i>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Platform Fees Collected</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">${{ number_format($totalFees, 2) }}</p>
            </div>
            <div class="bg-purple-100 rounded-full p-4">
                <i class="fas fa-chart-line text-purple-600 text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Transaction ID</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Merchant</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Customer</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Amount</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Platform Fee</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($transactions as $transaction)
            <tr class="hover:bg-gray-50 transition-all">
                <td class="px-6 py-4">
                    <span class="font-mono text-sm text-gray-800">{{ $transaction->transaction_id }}</span>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.merchants.show', $transaction->merchant->id) }}" class="text-blue-600 hover:underline font-medium">
                        {{ $transaction->merchant->business_name }}
                    </a>
                </td>
                <td class="px-6 py-4 text-gray-700">{{ $transaction->customer_email }}</td>
                <td class="px-6 py-4">
                    <span class="font-semibold text-gray-800">${{ number_format($transaction->amount, 2) }}</span>
                </td>
                <td class="px-6 py-4">
                    <span class="text-purple-600 font-medium">${{ number_format($transaction->platform_fee, 2) }}</span>
                </td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                        @if($transaction->status === 'completed') bg-green-100 text-green-800
                        @elseif($transaction->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($transaction->status === 'failed') bg-red-100 text-red-800
                        @else bg-blue-100 text-blue-800 @endif">
                        {{ ucfirst($transaction->status) }}
                    </span>
                </td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ $transaction->created_at->format('M d, Y H:i') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                    <i class="fas fa-receipt text-4xl mb-4 text-gray-400"></i>
                    <p class="text-lg font-medium">No transactions found</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $transactions->links() }}
</div>
@endsection
