@props([
    'title' => 'My Laravel App',
])
<!doctype html>
<html class="h-full bg-[#1c3056]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head> 
<body class="h-full font-sans antialiased text-white">

    <nav class="bg-[#142442] border-b border-gray-700 shadow-xl py-6 px-8">
        <div class="max-w-7xl mx-auto flex items-center justify-start space-x-10">
            <a href="/" class="text-xl font-bold hover:text-blue-400 transition">Home</a>
            <a href="/about" class="text-xl font-bold hover:text-blue-400 transition">About</a>
            <a href="/contact" class="text-xl font-bold hover:text-blue-400 transition">Contact</a>
            <a href="/formtest" class="text-xl font-bold text-blue-400 border-b-2 border-blue-400 pb-1">Form Test</a>
        </div>
    </nav>

    <main class="flex flex-col items-center justify-start min-h-screen pt-12 px-4">
        <div class="w-full max-w-5xl">
            {{ $slot }}
        </div>
    </main>

</body>
</html>