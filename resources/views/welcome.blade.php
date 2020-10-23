<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sprucewire</title>

    <livewire:styles />
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        [x-cloak] {
            display: none;
        }

    </style>
    @stack('styles')

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="antialiased">
    <livewire:main />
    <livewire:scripts />
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/spruce@2.6.3/dist/spruce.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@joshhanley/sprucewire@0.1.0/dist/sprucewire.umd.js"></script>
    @stack('scripts')
</body>

</html>
