<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Guild Management</title>

        @fonts

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>

    <body class="min-h-screen bg-background-500">
        <div class="flex min-h-screen">
            @include('partials.sidebar')

            <div class="flex min-w-0 flex-1 flex-col pb-4 pr-0 lg:pr-4">
                @include('partials.topbar')

                <main class="min-w-0 flex-1">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>