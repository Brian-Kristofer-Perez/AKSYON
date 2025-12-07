<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKSYON - Infrastructure Project Reporting</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes pulse-marker {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        .marker {
            animation: pulse-marker 2s ease-in-out infinite;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 via-blue-50 to-gray-100 min-h-screen">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 glass-effect shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    <span class="text-2xl font-bold text-blue-900">A.K.S.Y.O.N</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('user.login') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">LOG IN</a>
                    <a href="{{ route('user.register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-all duration-200 transform hover:scale-105 shadow-md">REGISTER</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="pt-32 pb-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-8 fade-in-up">
                    <div class="space-y-4">
                        <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                            Mapping Problems,<br/>
                            <span class="gradient-text">Tracking Progress.</span>
                        </h1>
                        <div class="w-50 h-1 bg-gradient-to-r from-blue-600 to-blue-400 rounded-full"></div>
                    </div>
                    
                    <p class="text-xl text-gray-600 leading-relaxed">
                        AKSYON is an Infrastructure project reporting and monitoring platform that allows the people to coordinate and communicate with local government units.
                    </p>
                    
                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href={{ route('user.login') }} class="group inline-flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <span>Get Started</span>
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                        
                    </div>
                </div>

                <!-- Right Content - Interactive Map -->
                 <div class="relative float-animation">
                    <div class="glass-effect rounded-3xl p-4 shadow-2xl" style="height: 100%;">
                        <div class="relative rounded-2xl overflow-hidden" style="height: 500px;">
                            <!-- Map Background -->
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-100 via-green-50 to-blue-50">
                                <!-- River -->
                                <svg class="absolute inset-0 w-full h-full" viewBox="0 0 400 500">
                                    <path d="M 150 0 Q 120 100 140 200 T 120 400 L 120 500 L 180 500 L 180 400 Q 160 300 180 200 T 150 0 Z" 
                                          fill="#7dd3fc" opacity="0.6"/>
                                </svg>
                                
                                
                                <!-- Streets Grid -->
                                <svg class="absolute inset-0 w-full h-full" viewBox="0 0 400 500">
                                    <g stroke="#cbd5e1" stroke-width="1" opacity="0.4">
                                        <line x1="0" y1="100" x2="400" y2="100"/>
                                        <line x1="0" y1="200" x2="400" y2="200"/>
                                        <line x1="0" y1="300" x2="400" y2="300"/>
                                        <line x1="0" y1="400" x2="400" y2="400"/>
                                        <line x1="100" y1="0" x2="100" y2="500"/>
                                        <line x1="200" y1="0" x2="200" y2="500"/>
                                        <line x1="300" y1="0" x2="300" y2="500"/>
                                    </g>
                                </svg>
                                
                                <!-- Parks -->
                                <circle cx="320" cy="150" r="40" fill="#86efac" opacity="0.5"/>
                                <circle cx="80" cy="350" r="35" fill="#86efac" opacity="0.5"/>
                            </div>

                            
                            <!-- Animated Markers -->
                            <div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 marker">
                                <div class="relative">
                                    <svg class="w-12 h-12 text-blue-600 drop-shadow-lg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                    </svg>
                                    <div class="absolute -inset-2 bg-blue-400 rounded-full opacity-30 animate-ping"></div>
                                </div>
                            </div>
                            
                            <div class="absolute top-1/2 left-1/4 marker" style="animation-delay: 0.5s">
                                <div class="relative">
                                    <svg class="w-12 h-12 text-red-500 drop-shadow-lg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                    </svg>
                                    <div class="absolute -inset-2 bg-red-400 rounded-full opacity-30 animate-ping"></div>
                                </div>
                            </div>
                            
                            <div class="absolute top-2/3 right-1/4 marker" style="animation-delay: 1s">
                                <div class="relative">
                                    <svg class="w-12 h-12 text-green-500 drop-shadow-lg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                    </svg>
                                    <div class="absolute -inset-2 bg-green-400 rounded-full opacity-30 animate-ping"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Info Cards -->
                    <div class="absolute -bottom-6 -left-6 glass-effect rounded-xl p-4 shadow-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm font-semibold text-gray-900">Real-time Updates</div>
                                <div class="text-xs text-gray-600">Track progress live</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="learn-more" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Why Choose AKSYON?</h2>
                <p class="text-xl text-gray-600">Empowering communities through transparent infrastructure monitoring</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="group p-8 rounded-2xl bg-gradient-to-br from-blue-50 to-white hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Interactive Mapping</h3>
                    <p class="text-gray-600">Visualize infrastructure projects on an interactive map with real-time location tracking and status updates.</p>
                </div>
                
                <div class="group p-8 rounded-2xl bg-gradient-to-br from-green-50 to-white hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-green-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Direct Communication</h3>
                    <p class="text-gray-600">Connect directly with local government units to report issues and track resolution progress efficiently.</p>
                </div>
                
                <div class="group p-8 rounded-2xl bg-gradient-to-br from-purple-50 to-white hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Progress Tracking</h3>
                    <p class="text-gray-600">Monitor project milestones, timelines, and completion status with detailed analytics and reporting tools.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                        <span class="text-xl font-bold">A.K.S.Y.O.N</span>
                    </div>
                    <p class="text-gray-400 text-sm">Empowering communities through transparent infrastructure monitoring and reporting.</p>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Features</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Support</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Documentation</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Connect</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-sm text-gray-400">
                <p>&copy; 2025 AKSYON. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>