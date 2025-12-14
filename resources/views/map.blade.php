<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKSYON - Map View</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Leaflet CSS and Javavoy :) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

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

        .map-placeholder {
            background: 
                linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
            border-radius: 24px;
            box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .map-marker {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .fab-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #2c5f8d 0%, #1e4163 100%);
            border-radius: 50%;
            box-shadow: 0 8px 24px rgba(44, 95, 141, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .fab-button:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 32px rgba(44, 95, 141, 0.5);
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
                    {{ substr(auth()->user()->name, 0, 2) }}
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
                <a href="{{ route('map.view') }}" class="sidebar-item active flex items-center space-x-3 px-4 py-3.5 rounded-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                    <span class="font-semibold">Map View</span>
                </a>
                <a href="{{ route('my.reports') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3.5 rounded-xl text-gray-600 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="font-semibold">My Reports</span>
                </a>
                @if(auth()->user()->is_admin ?? false)
                <a href="{{ route('admin.dashboard') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3.5 rounded-xl text-gray-600 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="font-semibold">Admin Dashboard</span>
                </a>
                @endif
            </div>
            
            <div class="absolute bottom-0 left-0 w-full p-6">
                <a href="#" class="sidebar-item flex items-center space-x-3 px-4 py-3.5 rounded-xl text-gray-600 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="font-semibold">Settings</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 flex-1 p-8">
            <!-- Map Container -->
            <div class="relative">
                <!-- Map Placeholder -->
                <div class="map-placeholder z-0" id="" style="height: calc(100vh - 120px); position: relative;">
                    <div id="map" class="w-full h-full rounded-3xl flex items-center justify-center text-gray-500">
                        <div class="text-center">
                            <svg class="w-24 h-24 mx-auto mb-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                            </svg>
                            <p class="text-xl font-semibold text-gray-600">Map will be loaded here</p>
                            <p class="text-sm text-gray-400 mt-2">Integrate with Google Maps, Mapbox, or Leaflet</p>
                        </div>
                    </div>
                </div>

                <script>
                    let map = L.map('map').setView([14.5995, 120.9842], 13)

                    // OpenStreetMaps source image :))
                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);
                </script>

                <!-- Legend -->
                <div class="z-20 absolute top-6 right-6 bg-white p-6 rounded-2xl shadow-lg">
                    <div class="space-y-3">
                        <div class="legend-item">
                            <div class="map-marker bg-yellow-500"></div>
                            <span class="text-sm font-medium">Pending</span>
                        </div>
                        <div class="legend-item">
                            <div class="map-marker bg-blue-500"></div>
                            <span class="text-sm font-medium">In Progress</span>
                        </div>
                        <div class="legend-item">
                            <div class="map-marker bg-green-500"></div>
                            <span class="text-sm font-medium">Resolved</span>
                        </div>
                    </div>
                </div>

                <!-- Filter Panel -->
                <div class="z-20 absolute bottom-6 left-6 bg-white p-6 rounded-2xl shadow-lg" style="width: 300px;">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                            <select class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none">
                                <option>All Categories</option>
                                <option>Road Damage</option>
                                <option>Street Light</option>
                                <option>Waste</option>
                                <option>Drainage</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                            <select class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none">
                                <option>All Statuses</option>
                                <option>Pending</option>
                                <option>In Progress</option>
                                <option>Resolved</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- FAB Button -->
                <button class="fab-button" onclick="window.location.href='{{ route('submit.report') }}'">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </button>
            </div>
        </main>
    </div>
</body>
</html>
