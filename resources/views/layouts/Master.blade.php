<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Blog')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <header class="bg-blue-600 text-white shadow-md">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-between h-16">

                <!-- Logo -->
                <a href="/" class="text-2xl font-bold">My Blog</a>

                <!-- Navigation -->
                <nav>
                    <ul class="flex space-x-6">
                        <li>
                            <a href="/" class="hover:text-gray-200 transition @if($page === 'Home') font-bold text-white  @endif">
                                Home
                            </a>
                        </li>
                        <li> 
                            <a href="{{route('post')}}" class="hover:text-gray-200 transition @if($page === 'Post') font-bold text-white  @endif" >
                                Post
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.index') }}" class="hover:text-gray-200 transition @if($page === 'Admin') font-bold text-white  @endif" > 
                                Admin
                            </a>
                        </li>
                        
                    </ul>
                </nav>

            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">@yield('content') </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 mt-10">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; {{ date('Y') }} My Blog. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>