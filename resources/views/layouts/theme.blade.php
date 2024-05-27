<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SITERNAKS</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.4.2/dist/cdn.min.js" defer></script>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>

<body>
    <div>
        @include('components.header')
    </div>
    <div>

        @include('components.sidebar')
    </div>
    <div class="flex justify-center">
        <div class="container mx-auto">
            @yield('content')
        </div>
    </div>
</body>

</html>
