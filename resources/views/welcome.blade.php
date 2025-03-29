<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Photo GPS API</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="">
        <div class="bg-gray-150 text-gray-600">
            <h1 class="px-8 py-4 font-bold text-5xl">Photo GPS API</h1>
            <p class="px-8 pt-10 pb-2 text-4xl">
                A simple API
            </p>
            <p class="px-8 py-2 text-4xl">
                which returns GPS data of photos
            </p>
            <p class="px-8 pt-2 pb-10 text-4xl">
                from their EXIF data.
            </p>
            <p class="px-8 py-2 text-2xl text-gray-600">
                <a href="/form" class="text-blue-700 hover:text-orange-400 active:text-red-500">
                    ▶ Images can be specified by URLs or by uploading files.
                </a>
            </p>
            <p class="px-8 pt-10 pb-0 text-xl text-gray-600">
                Supported Exif Versions:
                <ul class="px-16 pt-2 text-xl">
                    <li>✔<a href="https://github.com/macocci7/photo-gps-api/blob/main/public/docs/GpsAttrInfo.0300.md" class="text-blue-600 hover:text-orange-400 active:text-red-500">3.0</a></li>
                    <li>✔<a href="https://github.com/macocci7/photo-gps-api/blob/main/public/docs/GpsAttrInfo.0232.md" class="text-blue-600 hover:text-orange-400 active:text-red-500">2.32</a></li>
                    <li>✔<a href="https://github.com/macocci7/photo-gps-api/blob/main/public/docs/GpsAttrInfo.0231.md"  class="text-blue-600 hover:text-orange-400 active:text-red-500">2.31</a></li>
                    <li>✔<a href="https://github.com/macocci7/photo-gps-api/blob/main/public/docs/GpsAttrInfo.0230.md"  class="text-blue-600 hover:text-orange-400 active:text-red-500">2.3</a></li>
                    <li>✔<a href="https://github.com/macocci7/photo-gps-api/blob/main/public/docs/GpsAttrInfo.0221.md"  class="text-blue-600 hover:text-orange-400 active:text-red-500">2.21</a></li>
                    <li>✔<a href="https://github.com/macocci7/photo-gps-api/blob/main/public/docs/GpsAttrInfo.0220.md"  class="text-blue-600 hover:text-orange-400 active:text-red-500">2.2</a></li>
                    <li>✔<a href="https://github.com/macocci7/photo-gps-api/blob/main/public/docs/GpsAttrInfo.0210.md"  class="text-blue-600 hover:text-orange-400 active:text-red-500">2.1</a></li>
                </ul>
            </p>
            <p class="px-8 pt-6 pb-2 text-lg">
                <a href="https://github.com/macocci7/photo-gps-api/blob/main/README.md" class="text-blue-600 hover:text-orange-400 active:text-red-500">Learn more...</a>
            </p>
            <p class="px-8 py-4 text-base flex items-center">
                Copyright 2024 - 2025 <a href="https://github.com/macocci7" class="ml-2 text-blue-700 hover:text-orange-400 active:text-red-500">macocci7</a>.
                <a href="https://github.com/macocci7/photo-gps-api"><img src="/img/github-mark.png" width="40" height="40" class="ml-2" /></a>
            </p>
        </div>
    </body>
</html>
