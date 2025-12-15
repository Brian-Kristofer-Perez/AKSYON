<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKSYON - My Reports</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #2c5f8d 0%, #1e4163 100%);
            background-attachment: fixed;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 4px 0 30px rgba(0, 0, 0, 0.08);
        }

        .sidebar-item {
            position: relative;
            transition: all 0.3s ease;
        }

        .sidebar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 0;
            background: linear-gradient(180deg, #2c5f8d 0%, #1e4163 100%);
            border-radius: 0 4px 4px 0;
            transition: height 0.3s ease;
        }

        .sidebar-item:hover::before {
            height: 70%;
        }

        .sidebar-item.active::before {
            height: 100%;
        }

        .sidebar-item.active {
            background: linear-gradient(135deg, #2c5f8d 0%, #1e4163 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(44, 95, 141, 0.4);
        }

        .profile-circle {
            background: linear-gradient(135deg, #2c5f8d 0%, #1e4163 100%);
            box-shadow: 
                0 4px 12px rgba(44, 95, 141, 0.3),
                inset 0 2px 4px rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .profile-circle:hover {
            transform: scale(1.1);
            box-shadow: 
                0 6px 16px rgba(44, 95, 141, 0.4),
                inset 0 2px 4px rgba(255, 255, 255, 0.2);
        }

        .stat-card {
            position: relative;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
        }

        .stat-card-purple {
            background: linear-gradient(135deg, #a855f7 0%, #7c3aed 100%);
            box-shadow: 0 10px 30px rgba(168, 85, 247, 0.3);
        }

        .stat-card-amber {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            box-shadow: 0 10px 30px rgba(251, 191, 36, 0.3);
        }

        .stat-card-cyan {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            box-shadow: 0 10px 30px rgba(6, 182, 212, 0.3);
        }

        .stat-card-green {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
        }

        .shimmer {
            position: relative;
            overflow: hidden;
        }

        .shimmer::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            100% { left: 100%; }
        }

        .view-toggle {
            background: white;
            border-radius: 12px;
            padding: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .view-toggle button {
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .view-toggle button.active {
            background: linear-gradient(135deg, #2c5f8d 0%, #1e4163 100%);
            color: white;
        }

        .status-badge {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
        }

        .report-item {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .report-item:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .card-3d {
            background: white;
            border-radius: 24px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card-3d:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .empty-state {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 24px;
            border: 2px dashed #cbd5e1;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #2c5f8d 0%, #1e4163 100%);
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(44, 95, 141, 0.4);
        }
    </style>
</head>
<body>
    <!-- Top Navigation -->
    <nav class="glass-nav px-6 py-4 fixed top-0 w-full z-50">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                </div>
                <span class="text-2xl font-bold bg-gradient-to-r from-blue-700 to-blue-900 bg-clip-text text-transparent">A.K.S.Y.O.N</span>
            </div>
            <div class="flex items-center space-x-6">
                <button class="relative text-gray-600 hover:text-blue-600 transition-all hover:scale-110">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <span class="absolute -top-1 -right-1 w-5 h-5 bg-gradient-to-br from-red-500 to-pink-500 rounded-full text-white text-xs flex items-center justify-center shadow-lg">3</span>
                </button>
                <button class="text-gray-600 hover:text-blue-600 transition-all hover:scale-110">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="profile-circle w-11 h-11 rounded-full flex items-center justify-center text-white font-bold text-sm cursor-pointer">
                    {{ 
                        substr(
                            Auth::guard('admin')->check() 
                                ? Auth::guard('admin')->user()->email 
                                : Auth::guard('web')->user()->name, 
                            0, 
                            2
                        )
                    }}
                </div>
                <form action="{{ route('user.auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-red-500 transition-all hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="flex pt-16">
        <!-- Sidebar -->
        <aside class="sidebar w-64 h-screen fixed left-0">
            <div class="p-6 space-y-2">
                <a href="{{ route('home') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3.5 rounded-xl text-gray-600 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-semibold">Home</span>
                </a>
                <a href="{{ route('submit.report') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3.5 rounded-xl text-gray-600 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="font-semibold">Submit Report</span>
                </a>
                <a href="{{ route('map.view') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3.5 rounded-xl text-gray-600 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                    <span class="font-semibold">Map View</span>
                </a>
                <a href="{{ route('my.reports') }}" class="sidebar-item active flex items-center space-x-3 px-4 py-3.5 rounded-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="font-semibold">My Reports</span>
                </a>
                @if(Auth::guard('admin')->check())
                <a href="{{ route('admin.dashboard') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3.5 rounded-xl text-gray-600 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="font-semibold">Admin Panel</span>
                </a>
                @endif
            </div>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 flex-1 p-8">
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Reports -->
                <div class="stat-card stat-card-purple p-6 rounded-2xl shimmer">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <p class="text-white/80 font-medium text-sm mb-1">My Reports</p>
                            <p class="text-5xl font-bold text-white">3</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white icon-glow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center text-white/90 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"></path>
                        </svg>
                        <span>All submissions</span>
                    </div>
                </div>

                <!-- Pending -->
                <div class="stat-card stat-card-amber p-6 rounded-2xl shimmer">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <p class="text-white/80 font-medium text-sm mb-1">Pending</p>
                            <p class="text-5xl font-bold text-white">1</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white icon-glow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center text-white/90 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Awaiting review</span>
                    </div>
                </div>

                <!-- In Progress -->
                <div class="stat-card stat-card-cyan p-6 rounded-2xl shimmer">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <p class="text-white/80 font-medium text-sm mb-1">In Progress</p>
                            <p class="text-5xl font-bold text-white">1</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white icon-glow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center text-white/90 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd"></path>
                        </svg>
                        <span>In progress</span>
                    </div>
                </div>

                <!-- Resolved -->
                <div class="stat-card stat-card-green p-6 rounded-2xl shimmer">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <p class="text-white/80 font-medium text-sm mb-1">Resolved</p>
                            <p class="text-5xl font-bold text-white">1</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white icon-glow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center text-white/90 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Completed</span>
                    </div>
                </div>
            </div>

            <!-- My Reports Section -->
            <div class="card-3d p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">My Reports</h2>
                    <div class="flex items-center space-x-4">
                        <select class="px-4 py-2 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none">
                            <option>All Status</option>
                            <option>Pending</option>
                            <option>In Progress</option>
                            <option>Resolved</option>
                        </select>
                        <div class="view-toggle flex ml-4">
                        <button id="gridViewBtn" class="active" onclick="toggleView('grid')">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM13 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2h-2z"></path>
                            </svg>
                        </button>
                        <button id="listViewBtn" onclick="toggleView('list')">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    </div>
                </div>

                <div id="myReportsContainer">
                    <!-- Reports will be loaded here -->
                </div>
            </div>
        </main>
    </div>

    <script>
        // View state
        let currentView = 'grid'; // 'grid' or 'list'
        
        // View toggle function
        function toggleView(view) {
            currentView = view;
            updateViewButtons();
            renderMyReports(myReports);
        }
        
        function updateViewButtons() {
            const gridBtn = document.getElementById('gridViewBtn');
            const listBtn = document.getElementById('listViewBtn');
            
            if (currentView === 'grid') {
                gridBtn.classList.add('active');
                listBtn.classList.remove('active');
            } else {
                gridBtn.classList.remove('active');
                listBtn.classList.add('active');
            }
        }
        
        // Sample reports data
        const myReports = [
            {
                id: 1,
                title: "Road Damage",
                location: "40727, -34567",
                date: "Nov 17, 2025",
                status: "pending",
                image: "https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=100&h=100&fit=crop"
            },
            {
                id: 2,
                title: "Street Light",
                location: "41234, -35123",
                date: "Nov 15, 2025",
                status: "ongoing",
                image: "https://images.unsplash.com/photo-1593941707882-a5bac686a2d5?w=100&h=100&fit=crop"
            },
            {
                id: 3,
                title: "Waste Management",
                location: "41876, -34987",
                date: "Nov 10, 2025",
                status: "resolved",
                image: "https://images.unsplash.com/photo-1605600654924-04d9a119a5bd?w=100&h=100&fit=crop"
            }
        ];

        const statusColors = {
            resolved: 'bg-green-500',
            ongoing: 'bg-blue-500',
            pending: 'bg-amber-500'
        };

        const statusLabels = {
            resolved: 'Resolved',
            ongoing: 'In Progress',
            pending: 'Pending'
        };

        function renderMyReports(reports) {
            const container = document.getElementById('myReportsContainer');
            
            if (reports.length === 0) {
                container.innerHTML = `
                    <div class="empty-state text-center py-16">
                        <div class="w-32 h-32 mx-auto bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-6 shadow-inner">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-700 mb-3">No Reports Found</h3>
                        <p class="text-gray-500 mb-8 max-w-sm mx-auto">You haven't submitted any reports yet. Start making a difference in your community today!</p>
                        <button class="btn-gradient text-white px-8 py-4 rounded-xl font-semibold inline-flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span>Submit Your First Report</span>
                        </button>
                    </div>
                `;
                return;
            }

            if (currentView === 'list') {
                // List view (table style)
                container.innerHTML = `
                    <div class="overflow-x-auto rounded-xl border border-gray-200">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Report</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                ${reports.map(report => `
                                    <tr class="hover:bg-gray-50 cursor-pointer transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <img src="${report.image}" alt="${report.title}" class="w-10 h-10 rounded-lg object-cover mr-3">
                                                <div class="text-sm font-medium text-gray-900">${report.title}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${report.location}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${report.date}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full ${
                                                report.status === 'resolved' ? 'bg-green-100 text-green-700' :
                                                report.status === 'ongoing' ? 'bg-blue-100 text-blue-700' :
                                                'bg-amber-100 text-amber-700'
                                            }">${statusLabels[report.status]}</span>
                                        </td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>
                `;
            } else {
                // Grid view (card style)
                container.innerHTML = `
                    <div class="grid grid-cols-3 gap-6">
                        ${reports.map(report => `
                            <div class="report-card overflow-hidden">
                                <img src="${report.image}" alt="${report.title}" class="w-full h-48 object-cover">
                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <span class="text-lg font-bold text-blue-600">${report.title}</span>
                                        <span class="px-3 py-1 ${
                                            report.status === 'resolved' ? 'bg-green-100 text-green-700' :
                                            report.status === 'ongoing' ? 'bg-cyan-100 text-cyan-700' :
                                            'bg-amber-100 text-amber-700'
                                        } text-sm font-semibold rounded-full">${statusLabels[report.status]}</span>
                                    </div>
                                    <div class="space-y-2 text-sm text-gray-600">
                                        <p>${report.location}</p>
                                        <p>${report.date}</p>
                                    </div>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                `;
            }
        }

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            renderMyReports(myReports);
        });
    </script>
</body>
</html>
