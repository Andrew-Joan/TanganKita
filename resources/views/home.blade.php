<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TanganKita</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <header class="flex items-center justify-between px-10 py-5 bg-white shadow">
        <div class="text-xl font-bold text-blue-500">tangankita</div>
        <nav class="space-x-6">
            <a href="#" class="text-gray-600 hover:text-blue-500">Home</a>
            <a href="#" class="text-gray-600 hover:text-blue-500">About</a>
            <a href="#" class="text-gray-600 hover:text-blue-500">Donation</a>
            <a href="#" class="text-gray-600 hover:text-blue-500">Blog</a>
            <a href="#" class="text-gray-600 hover:text-blue-500">Contact</a>
        </nav>
        <div class="space-x-4">
            <button class="px-5 py-2 text-blue-500 border border-blue-500 rounded-full hover:bg-blue-100">Sign in</button>
            <button class="px-5 py-2 text-white bg-blue-500 rounded-full hover:bg-blue-600">Sign up</button>
        </div>
    </header>
    <main class="px-10 py-20">
        <section class="flex items-center mx-auto my-14 max-w-7xl">
            <div class="w-1/2 px-10 mr-40 space-y-6">
                <h1 class="text-5xl font-bold text-gray-900">
                    Donasi adalah tentang membuat <span class="text-blue-500">perubahan.</span>
                </h1>
                <p class="text-lg text-gray-600">
                    Setiap kontribusi, sekecil apa pun, memiliki kekuatan untuk mengubah hidup seseorang.
                    Dengan memberikan, kita menjadi bagian dari solusi dan harapan bagi mereka yang membutuhkan.
                </p>
                <button class="px-6 py-3 text-lg text-white bg-blue-500 rounded hover:bg-blue-600">
                    Donasi Sekarang
                </button>
            </div>
            <div class="w-1/3 p-8 space-y-6 bg-white rounded shadow-lg">
                <h2 class="text-xl font-bold text-gray-900">Jumlah Donasi</h2>
                <div class="flex items-center space-x-4">
                    <button class="w-1/2 px-4 py-2 text-white bg-blue-500 rounded">One-time</button>
                    <button class="w-1/2 px-4 py-2 text-blue-500 border border-blue-500 rounded">Weekly</button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <button class="px-4 py-2 text-gray-800 bg-gray-100 rounded hover:bg-blue-100">500 Ks</button>
                    <button class="px-4 py-2 text-gray-800 bg-gray-100 rounded hover:bg-blue-100">1000 Ks</button>
                    <button class="px-4 py-2 text-gray-800 bg-gray-100 rounded hover:bg-blue-100">2000 Ks</button>
                    <button class="px-4 py-2 text-gray-800 bg-gray-100 rounded hover:bg-blue-100">5000 Ks</button>
                    <button class="px-4 py-2 text-gray-800 bg-gray-100 rounded hover:bg-blue-100">10000 Ks</button>
                    <button class="px-4 py-2 text-gray-800 bg-gray-100 rounded hover:bg-blue-100">50000 Ks</button>
                </div>
                <input type="text" placeholder="Custom Amount" class="w-full px-4 py-2 border rounded">
                <button class="w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Donasi Sekarang</button>
            </div>
        </section>
    </main>
</body>
</html>
