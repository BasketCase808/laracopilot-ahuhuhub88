<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Connect Platform - Merchant Payment Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <i class="fas fa-credit-card text-blue-600 text-3xl mr-3"></i>
                <h1 class="text-2xl font-bold text-gray-800">Stripe Connect Platform</h1>
            </div>
            <a href="{{ route('admin.login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition-all">
                Admin Login
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-600 to-blue-800 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-5xl font-bold mb-6">Streamline Your Merchant Payment Processing</h2>
            <p class="text-xl mb-8 text-blue-100">Powerful Stripe Connect integration for managing multiple merchant accounts with automated key generation and comprehensive transaction monitoring</p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('admin.login') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-bold text-lg hover:bg-blue-50 transition-all shadow-lg">
                    Get Started
                </a>
                <a href="#features" class="bg-blue-700 text-white px-8 py-3 rounded-lg font-bold text-lg hover:bg-blue-800 transition-all border-2 border-white">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Powerful Features for Payment Management</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all">
                    <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mb-6">
                        <i class="fas fa-key text-blue-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Automated Key Generation</h3>
                    <p class="text-gray-600">Generate Stripe Connect API keys instantly for each merchant. Secure, automated, and compliant with Stripe's best practices.</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all">
                    <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mb-6">
                        <i class="fas fa-store text-green-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Merchant Onboarding</h3>
                    <p class="text-gray-600">Complete merchant management system with business verification, status tracking, and comprehensive merchant profiles.</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all">
                    <div class="bg-purple-100 rounded-full w-16 h-16 flex items-center justify-center mb-6">
                        <i class="fas fa-chart-line text-purple-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Transaction Monitoring</h3>
                    <p class="text-gray-600">Real-time transaction tracking with detailed analytics, fee calculations, and merchant payout management.</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all">
                    <div class="bg-yellow-100 rounded-full w-16 h-16 flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-yellow-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Security & Compliance</h3>
                    <p class="text-gray-600">Built-in security features with merchant verification, key revocation capabilities, and compliance tracking.</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all">
                    <div class="bg-red-100 rounded-full w-16 h-16 flex items-center justify-center mb-6">
                        <i class="fas fa-cog text-red-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Platform Configuration</h3>
                    <p class="text-gray-600">Flexible platform settings with customizable fee structures, merchant approval workflows, and operational controls.</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all">
                    <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mb-6">
                        <i class="fas fa-tachometer-alt text-indigo-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Admin Dashboard</h3>
                    <p class="text-gray-600">Comprehensive admin interface with KPI tracking, merchant status overview, and activity monitoring.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Enterprise-Grade Payment Platform</h2>
                    <p class="text-gray-600 text-lg mb-4">
                        Our Stripe Connect management platform provides businesses with everything needed to onboard merchants, manage payment processing, and monitor transactions at scale.
                    </p>
                    <p class="text-gray-600 text-lg mb-4">
                        Built for payment service providers, marketplaces, and platforms that need to facilitate payments for multiple businesses while maintaining control and compliance.
                    </p>
                    <p class="text-gray-600 text-lg">
                        Automated workflows, real-time analytics, and comprehensive merchant management make it easy to scale your payment operations.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl p-12">
                    <div class="space-y-6">
                        <div class="flex items-center">
                            <div class="bg-blue-600 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                                <i class="fas fa-check text-white text-xl"></i>
                            </div>
                            <p class="text-gray-800 font-semibold text-lg">Instant Stripe Connect Integration</p>
                        </div>
                        <div class="flex items-center">
                            <div class="bg-blue-600 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                                <i class="fas fa-check text-white text-xl"></i>
                            </div>
                            <p class="text-gray-800 font-semibold text-lg">Automated Key Management</p>
                        </div>
                        <div class="flex items-center">
                            <div class="bg-blue-600 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                                <i class="fas fa-check text-white text-xl"></i>
                            </div>
                            <p class="text-gray-800 font-semibold text-lg">Real-Time Transaction Tracking</p>
                        </div>
                        <div class="flex items-center">
                            <div class="bg-blue-600 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                                <i class="fas fa-check text-white text-xl"></i>
                            </div>
                            <p class="text-gray-800 font-semibold text-lg">Comprehensive Admin Controls</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Use Cases Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Perfect for Payment Platforms</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-xl shadow-md p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4"><i class="fas fa-shopping-cart text-blue-600 mr-3"></i>E-commerce Marketplaces</h3>
                    <p class="text-gray-600">Enable multiple vendors to accept payments through your platform while you manage keys, fees, and payouts centrally.</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4"><i class="fas fa-handshake text-green-600 mr-3"></i>Payment Service Providers</h3>
                    <p class="text-gray-600">Offer payment processing services to businesses with automated onboarding and Stripe Connect integration management.</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4"><i class="fas fa-users text-purple-600 mr-3"></i>SaaS Platforms</h3>
                    <p class="text-gray-600">Allow your SaaS customers to accept payments from their end-users while you maintain platform-level oversight.</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4"><i class="fas fa-network-wired text-red-600 mr-3"></i>Multi-Tenant Systems</h3>
                    <p class="text-gray-600">Manage payment processing for multiple business entities with isolated merchant accounts and comprehensive tracking.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">Stripe Connect Platform</h3>
                <p class="text-gray-400">Enterprise payment management and merchant onboarding solution powered by Stripe Connect.</p>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold mb-4">Features</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#" class="hover:text-white">Key Generation</a></li>
                    <li><a href="#" class="hover:text-white">Merchant Management</a></li>
                    <li><a href="#" class="hover:text-white">Transaction Monitoring</a></li>
                    <li><a href="#" class="hover:text-white">Platform Settings</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold mb-4">Resources</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#" class="hover:text-white">Documentation</a></li>
                    <li><a href="#" class="hover:text-white">API Reference</a></li>
                    <li><a href="#" class="hover:text-white">Support</a></li>
                    <li><a href="#" class="hover:text-white">Status</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><i class="fas fa-envelope mr-2"></i>support@stripeplatform.com</li>
                    <li><i class="fas fa-phone mr-2"></i>1-800-STRIPE-01</li>
                    <li><i class="fas fa-map-marker-alt mr-2"></i>San Francisco, CA</li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
            <p class="text-gray-400">© {{ date('Y') }} Stripe Connect Platform. All rights reserved.</p>
            <p class="text-gray-500 mt-2">Made with ❤️ by <a href="https://laracopilot.com/" target="_blank" class="text-blue-400 hover:underline">LaraCopilot</a></p>
        </div>
    </footer>
</body>
</html>
