<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TiketKonser.com</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-100">

<!-- Responsive Navbar -->
<nav class="bg-white p-4 rounded shadow mb-8">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
        
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-blue-600 hover:text-blue-800 mb-4 md:mb-0 text-center md:text-left">TiketKonser.com</a>
        

        <div class="flex flex-col md:flex-row md:space-x-12 text-center text-lg font-semibold mb-4 md:mb-0">
            <a href="/" class="text-blue-600 hover:text-blue-800">Home</a>
            <a href="/events" class="text-blue-600 hover:text-blue-800">Event</a>
            <a href="/contact" class="text-blue-600 hover:text-blue-800">Contact</a>
            
        </div>

        <div class="flex w-full max-w-lg">
                <input 
                    type="text" 
                    placeholder="Cari konser, artis, lokasi..." 
                    class="flex-grow border rounded-l-xl p-2 focus:outline-none text-sm" 
                />
                <button class="bg-blue-600 text-white px-6 rounded-r-xl hover:bg-blue-700 text-sm">Cari</button>
        </div>

        <!-- Login / User Responsive -->
        <div class="text-center md:text-right text-lg font-medium mt-4 md:mt-0 flex items-center justify-center md:justify-end space-x-2">
            @auth
                <span class="text-gray-700 text-sm">Hi, <span class="font-semibold">{{ Auth::user()->name }}</span></span>
                <a href="/logout" class="ml-2 text-red-500 hover:text-red-700 text-sm">Logout</a>
            @else
                <a href="{{ route('login') }}" 
                class="text-blue-600 border border-blue-600 hover:bg-blue-50 
                        text-sm font-medium py-2 px-4 rounded-full transition duration-200 min-w-[100px] text-center">
                    Login
                </a>
                <a href="{{ route('register') }}" 
                class="bg-blue-600 hover:bg-blue-700 text-white 
                        text-sm font-medium py-2 px-4 rounded-full transition duration-200 min-w-[100px] text-center">
                    Register
                </a>
            @endauth
        </div>


    </div>
</nav>

<!-- Content -->
<div class="max-w-7xl mx-auto p-4">
    @yield('content')
</div>

</body>
</html>
