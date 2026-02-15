<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Connect Admin - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-slate-800 to-slate-900 text-white flex flex-col">
            <div class="p-6">
                <h1 class="text-2xl font-bold">Stripe Connect</h1>
                <p class="text-slate-400 text-sm mt-1">Platform Admin</p>
            </div>
            
            <nav class="flex-1 px-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-700 transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-slate-700' : '' }}">
                    <i class="fas fa-home w-5"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
                <a href="{{ route('admin.merchants.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-700 transition-all {{ request()->routeIs('admin.merchants.*') ? 'bg-slate-700' : '' }}">
                    <i class="fas fa-store w-5"></i>
                    <span class="ml-3">Merchants</span>
                </a>
                <a href="{{ route('admin.transactions.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-700 transition-all {{ request()->routeIs('admin.transactions.*') ? 'bg-slate-700' : '' }}">
                    <i class="fas fa-credit-card w-5"></i>
                    <span class="ml-3">Transactions</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-700 transition-all {{ request()->routeIs('admin.settings.*') ? 'bg-slate-700' : '' }}">
                    <i class="fas fa-cog w-5"></i>
                    <span class="ml-3">Settings</span>
                </a>
            </nav>
            
            <div class="p-4 border-t border-slate-700">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <p class="font-medium">{{ session('admin_user') }}</p>
                        <p class="text-xs text-slate-400">{{ session('admin_email') }}</p>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg transition-all">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </button>
                </form>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
