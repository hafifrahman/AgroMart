<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title . ' - ' . config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
      body {
        font-family: 'Inter', sans-serif;
      }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
  </head>

  <body>
    <x-layouts.header />

    <main class="min-h-[502px] bg-gray-50 dark:bg-gray-900">
      {{ $slot }}
    </main>

    <x-layouts.footer />

    @livewireScripts
  </body>

</html>
