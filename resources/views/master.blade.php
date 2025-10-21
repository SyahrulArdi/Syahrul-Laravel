<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Pegawai')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .accent-purple {
            color: #8B5CF6;
        }
        
        .bg-accent-purple {
            background-color: #8B5CF6;
        }
        
        .border-accent-purple {
            border-color: #8B5CF6;
        }
        
        .hover-accent:hover {
            color: #8B5CF6;
            transition: all 0.3s ease;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1a0b2e 0%, #2d1b69 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .card-gradient {
            background: linear-gradient(145deg, rgba(139, 92, 246, 0.1) 0%, rgba(168, 85, 247, 0.05) 100%);
        }
        
        main {
            flex: 1;
        }
        
        .nav-link {
            position: relative;
            overflow: hidden;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #8B5CF6;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="gradient-bg text-white">

    <nav class="glass-effect shadow-xl sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="font-bold text-xl accent-purple flex items-center hover:scale-105 transition-transform duration-300">
                        <i class="fas fa-users mr-2"></i>App Pegawai
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-6">
                        <a href="{{ route('employees.index') }}" class="text-gray-300 hover:text-white nav-link px-3 py-2 text-sm font-medium transition-all duration-300">
                            <i class="fas fa-user mr-2"></i> Employees
                        </a>
                        <a href="{{ route('departments.index') }}" class="text-gray-300 hover:text-white nav-link px-3 py-2 text-sm font-medium transition-all duration-300">
                            <i class="fas fa-building mr-2"></i> Department
                        </a>
                        <a href="{{ route('positions.index') }}" class="text-gray-300 hover:text-white nav-link px-3 py-2 text-sm font-medium transition-all duration-300">
                            <i class="fas fa-briefcase mr-2"></i> Position
                        </a>
                        <a href="{{ route('attendances.index') }}" class="text-gray-300 hover:text-white nav-link px-3 py-2 text-sm font-medium transition-all duration-300">
                            <i class="fas fa-clock mr-2"></i> Attendance
                        </a>
                        <a href="{{ route('salaries.index') }}" class="text-gray-300 hover:text-white nav-link px-3 py-2 text-sm font-medium transition-all duration-300">
                            <i class="fas fa-money-bill-wave mr-2"></i> Salary
                        </a>
                    </div>
                </div>
                <div class="md:hidden">
                    <button class="text-gray-300 hover:text-white focus:outline-none transition-colors duration-300">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <header class="glass-effect mt-6 mx-4 rounded-2xl shadow-xl border border-white/10">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white">
                @yield('page-title', 'Dashboard')
            </h1>
            <p class="text-gray-300 mt-2">Kelola data pegawai dengan mudah dan efisien</p>
        </div>
    </header>

    <main class="my-6">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="glass-effect rounded-2xl p-6 shadow-xl border border-white/10">
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="glass-effect mt-auto py-4 text-center text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p>&copy; 2025 App Pegawai. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>