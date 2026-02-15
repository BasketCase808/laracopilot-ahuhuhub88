<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Stripe Connect Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-700 to-slate-900 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Stripe Connect</h1>
                <p class="text-gray-600 mt-2">Platform Admin Login</p>
            </div>
            
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <p class="font-medium">{{ $errors->first() }}</p>
                </div>
            @endif
            
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <p class="text-sm font-semibold text-blue-800 mb-2">Test Credentials:</p>
                <div class="space-y-1 text-sm text-blue-700">
                    <p><strong>Admin:</strong> admin@stripeplatform.com / admin123</p>
                    <p><strong>Manager:</strong> manager@stripeplatform.com / manager123</p>
                    <p><strong>Support:</strong> support@stripeplatform.com / support123</p>
                </div>
            </div>
            
            <form action="/admin/login" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" id="password" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-all">
                </div>
                
                <button type="submit" class="w-full bg-gradient-to-r from-slate-700 to-slate-900 text-white py-3 rounded-lg font-semibold hover:from-slate-800 hover:to-black transition-all shadow-lg">
                    Sign In
                </button>
            </form>
        </div>
        
        <p class="text-center text-white text-sm mt-6">
            Secure access to Stripe Connect management platform
        </p>
    </div>
</body>
</html>
