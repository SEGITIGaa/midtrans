<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 shadow-lg rounded-lg w-80">
            <h2 class="text-2xl font-bold mb-4">Data diri</h2>
            <form action="/payment" method="GET">
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">nama</label>
                    <input type="text" id="name" name="name" class="border-2 p-2 outline-none rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="border-2 p-2 outline-none rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                </div>
                <div class="mb-4">
                    <label for="nomor" class="block mb-2 text-sm font-medium text-gray-700">nomor</label>
                    <input type="text" id="nomor" name="nomor" class="border-2 p-2 outline-none rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
                </div>
                <div class="flex items-center justify-between mb-4">
                    <label for="remember" class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                </div>
                <div>
                    <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
    @if(session('alert-success'))
    <script>
        alert("{{session('alert-success')}}")
    </script>
    @elseif(session('alert-failed'))
    <script>
        alert("{{session('alert-failed')}}")
    </script>
    @endif
</body>

</html>