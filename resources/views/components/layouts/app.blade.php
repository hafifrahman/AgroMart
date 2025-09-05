<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title . ' - ' . config('app.name') }}</title>

    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <script>
      if (
        localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) &&
          window.matchMedia("(prefers-color-scheme: dark)").matches)
      ) {
        document.documentElement.classList.add("dark");
      } else {
        document.documentElement.classList.remove("dark");
      }
    </script>

    <style>
      body {
        font-family: 'Inter', sans-serif;
      }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
  </head>

  <body class="bg-gray-50 antialiased dark:bg-gray-900">
    <x-layouts.header />

    <main class="min-h-[502px]">
      {{ $slot }}
    </main>

    <x-layouts.footer />

    @livewireScripts
  </body>

</html>
