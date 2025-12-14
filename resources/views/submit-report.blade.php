<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKSYON - Submit Report</title>
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

        .card-3d {
            background: white;
            border-radius: 24px;
            box-shadow: 
                0 2px 4px rgba(0, 0, 0, 0.02),
                0 8px 16px rgba(0, 0, 0, 0.04),
                0 16px 32px rgba(0, 0, 0, 0.04);
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

        .upload-area {
            border: 2px dashed #3b82f6;
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .upload-area:hover {
            border-color: #2563eb;
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            transform: scale(1.01);
        }

        .upload-area.dragover {
            border-color: #1e40af;
            background: linear-gradient(135deg, #bfdbfe 0%, #93c5fd 100%);
            transform: scale(1.02);
        }

        .upload-icon {
            background: linear-gradient(135deg, #2c5f8d 0%, #1e4163 100%);
            box-shadow: 0 8px 20px rgba(44, 95, 141, 0.3);
        }

        .form-input, .form-select, .form-textarea {
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: #2c5f8d;
            outline: none;
            box-shadow: 0 0 0 3px rgba(44, 95, 141, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #2c5f8d 0%, #1e4163 100%);
            box-shadow: 0 4px 15px rgba(44, 95, 141, 0.4);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(44, 95, 141, 0.5);
        }

        .btn-secondary {
            background: white;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #f9fafb;
            border-color: #d1d5db;
        }

        .location-btn {
            border: 2px solid #2c5f8d;
            color: #2c5f8d;
            transition: all 0.3s ease;
        }

        .location-btn:hover {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        }

        .category-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .description-card {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-in {
            animation: slideIn 0.5s ease-out;
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
                <a href="{{ route('user.auth.logout') }}" class="text-gray-600 hover:text-red-500 transition-all hover:scale-110">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </a>
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
                <a href="#" class="sidebar-item active flex items-center space-x-3 px-4 py-3.5 rounded-xl">
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
                <a href="{{ route('my.reports') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3.5 rounded-xl text-gray-600 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="font-semibold">My Reports</span>
                </a>
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
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Left Column - Photo Upload -->
                    <div class="lg:col-span-2 space-y-6">
                        <div class="card-3d p-8 animate-slide-in">
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">Submit New Report</h1>
                            <p class="text-gray-600 mb-8">Report an infrastructure issue in your community</p>
                            
                            <div>
                                <label class="block text-gray-700 font-semibold mb-3">Photo Upload</label>
                                <div class="upload-area rounded-2xl p-12 text-center cursor-pointer" id="uploadArea">
                                    <input type="file" id="fileInput" class="hidden" accept="image/png, image/jpeg" multiple>
                                    @csrf
                                    <div class="upload-icon w-24 h-24 mx-auto rounded-full flex items-center justify-center mb-6">
                                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-700 text-lg mb-2">
                                        Drop your photo here, or <span class="text-blue-600 font-semibold">browse</span>
                                    </p>
                                    <p class="text-gray-400 text-sm">PNG, JPEG up to 10MB</p>
                                </div>
                                <div id="previewContainer" class="mt-4 grid grid-cols-3 gap-4"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Location & Category -->
                    <div class="space-y-6">
                        <!-- Location -->
                        <div class="card-3d p-6 animate-slide-in" style="animation-delay: 0.1s">
                            <label class="block text-gray-700 font-semibold mb-4">Location</label>
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <div>
                                    <label class="block text-sm text-gray-600 mb-2">Latitude</label>
                                    <input type="text" class="form-input w-full px-4 py-3 rounded-xl" placeholder="14.5995" id="latitude">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-2">Longitude</label>
                                    <input type="text" class="form-input w-full px-4 py-3 rounded-xl" placeholder="120.9842" id="longitude">
                                </div>
                            </div>
                            <button class="location-btn w-full px-4 py-3 rounded-xl font-semibold flex items-center justify-center space-x-2" onclick="getCurrentLocation()">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>Use my Current Location</span>
                            </button>
                        </div>

                        <!-- Category -->
                        <div class="category-card p-6 animate-slide-in" style="animation-delay: 0.2s">
                            <label class="block text-gray-700 font-semibold mb-4">Category</label>
                            <div class="relative">
                                <select class="form-select w-full px-4 py-3 rounded-xl appearance-none cursor-pointer">
                                    <option value="road-damage">Road Damage</option>
                                    <option value="street-light">Street Light</option>
                                    <option value="drainage">Drainage Issue</option>
                                    <option value="waste">Waste Management</option>
                                    <option value="traffic">Traffic Signs</option>
                                    <option value="other">Other</option>
                                </select>
                                <svg class="absolute right-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-blue-600 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-6 description-card p-8 animate-slide-in" style="animation-delay: 0.3s">
                    <label class="block text-gray-700 font-semibold mb-4">Description</label>
                    <div class="relative">
                        <svg class="absolute left-4 top-4 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        <textarea class="form-textarea w-full pl-12 pr-4 py-4 rounded-xl resize-none" rows="6" placeholder="Describe the issue in detail"></textarea>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex justify-end space-x-4 animate-slide-in" style="animation-delay: 0.4s">
                    <button class="btn-secondary px-8 py-3 rounded-xl font-semibold text-gray-700">
                        Cancel
                    </button>
                    <button class="btn-primary px-8 py-3 rounded-xl font-semibold text-white">
                        Submit
                    </button>
                </div>
            </div>
        </main>
    </div>

    <script>
        // File upload handling
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const previewContainer = document.getElementById('previewContainer');

        uploadArea.addEventListener('click', () => fileInput.click());

        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            const files = e.dataTransfer.files;
            handleFiles(files);
        });

        fileInput.addEventListener('change', (e) => {
            handleFiles(e.target.files);
        });

        function handleFiles(files) {
            previewContainer.innerHTML = '';
            Array.from(files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const preview = document.createElement('div');
                        preview.className = 'relative group';
                        preview.innerHTML = `
                            <img src="${e.target.result}" class="w-full h-32 object-cover rounded-xl shadow-md">
                            <button class="absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition-opacity" onclick="this.parentElement.remove()">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        `;
                        previewContainer.appendChild(preview);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Get current location
        function getCurrentLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        document.getElementById('latitude').value = position.coords.latitude.toFixed(4);
                        document.getElementById('longitude').value = position.coords.longitude.toFixed(4);
                    },
                    (error) => {
                        alert('Unable to retrieve your location');
                    }
                );
            } else {
                alert('Geolocation is not supported by your browser');
            }
        }
    </script>
</body>
</html>
