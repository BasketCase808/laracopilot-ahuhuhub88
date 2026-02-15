@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-600 mt-1">Welcome back, {{ session('admin_user') }}! Here's your platform overview.</p>
</div>

<!-- KPI Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Merchants</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalMerchants }}</p>
            </div>
            <div class="bg-blue-100 rounded-full p-4">
                <i class="fas fa-store text-blue-600 text-2xl"></i>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Active Merchants</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $activeMerchants }}</p>
            </div>
            <div class="bg-green-100 rounded-full p-4">
                <i class="fas fa-check-circle text-green-600 text-2xl"></i>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Pending Approval</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $pendingMerchants }}</p>
            </div>
            <div class="bg-yellow-100 rounded-full p-4">
                <i class="fas fa-clock text-yellow-600 text-2xl"></i>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Volume</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">${{ number_format($totalVolume, 2) }}</p>
            </div>
            <div class="bg-purple-100 rounded-full p-4">
                <i class="fas fa-dollar-sign text-purple-600 text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Charts and Stats -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Merchant Status Distribution</h2>
        <div class="space-y-3">
            @foreach($merchantsByStatus as $status)
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-sm font-medium text-gray-700 capitalize">{{ $status->status }}</span>
                    <span class="text-sm font-medium text-gray-700">{{ $status->count }}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ ($status->count / $totalMerchants) * 100 }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Transaction Overview</h2>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                <div>
                    <p class="text-sm text-gray-600">Total Transactions</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalTransactions }}</p>
                </div>
                <i class="fas fa-exchange-alt text-blue-600 text-3xl"></i>
            </div>
            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                <div>
                    <p class="text-sm text-gray-600">Monthly Volume</p>
                    <p class="text-2xl font-bold text-gray-800">${{ number_format($monthlyVolume, 2) }}</p>
                </div>
                <i class="fas fa-chart-line text-green-600 text-3xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Recent Merchants</h2>
        <div class="space-y-3">
            @forelse($recentMerchants as $merchant)
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all">
                <div class="flex items-center">
                    <div class="bg-blue-100 rounded-full p-3 mr-4">
                        <i class="fas fa-building text-blue-600"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">{{ $merchant->business_name }}</p>
                        <p class="text-sm text-gray-600">{{ $merchant->industry }}</p>
                    </div>
                </div>
                <span class="px-3 py-1 rounded-full text-xs font-semibold
                    @if($merchant->status === 'active') bg-green-100 text-green-800
                    @elseif($merchant->status === 'pending') bg-yellow-100 text-yellow-800
                    @else bg-gray-100 text-gray-800 @endif">
                    {{ ucfirst($merchant->status) }}
                </span>
            </div>
            @empty
            <p class="text-gray-500 text-center py-8">No merchants yet</p>
            @endforelse
        </div>
        <a href="{{ route('admin.merchants.index') }}" class="block text-center mt-4 text-blue-600 hover:text-blue-800 font-medium">
            View All Merchants →
        </a>
    </div>
    
    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Recent Transactions</h2>
        <div class="space-y-3">
            @forelse($recentTransactions->take(5) as $transaction)
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all">
                <div class="flex items-center">
                    <div class="bg-green-100 rounded-full p-3 mr-4">
                        <i class="fas fa-dollar-sign text-green-600"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">${{ number_format($transaction->amount, 2) }}</p>
                        <p class="text-sm text-gray-600">{{ $transaction->merchant->business_name }}</p>
                    </div>
                </div>
                <span class="px-3 py-1 rounded-full text-xs font-semibold
                    @if($transaction->status === 'completed') bg-green-100 text-green-800
                    @elseif($transaction->status === 'pending') bg-yellow-100 text-yellow-800
                    @else bg-red-100 text-red-800 @endif">
                    {{ ucfirst($transaction->status) }}
                </span>
            </div>
            @empty
            <p class="text-gray-500 text-center py-8">No transactions yet</p>
            @endforelse
        </div>
        <a href="{{ route('admin.transactions.index') }}" class="block text-center mt-4 text-blue-600 hover:text-blue-800 font-medium">
            View All Transactions →
        </a>
    </div>
</div>
@endsection
