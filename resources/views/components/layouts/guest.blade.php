<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title . ' - ' . config('app.name') }}</title>

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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
  </head>

  <body class="bg-gray-50 dark:bg-gray-900">
    <div class="flex min-h-screen items-center justify-center">
      <div class="w-full max-w-md rounded-lg bg-white p-8 shadow-md dark:bg-gray-800">
        <div class="mb-6 flex justify-center">
          <a href="{{ route('home') }}" class="flex items-center space-x-2">
            <svg width="40" height="40" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
              <path fill="#22C55E"
                d="M100 0C44.8 0 0 44.8 0 100s44.8 100 100 100 100-44.8 100-100S155.2 0 100 0zM85 150c-2.8 0-5-2.2-5-5V80c0-13.8 11.2-25 25-25s25 11.2 25 25v15c0 2.8-2.2 5-5 5s-5-2.2-5-5V80c-8.3 0-15 6.7-15 15v55c0 2.8-2.2 5-5 5z" />
              <path fill="#16A34A"
                d="M115 55c-13.8 0-25 11.2-25 25v70c0 2.8 2.2 5 5 5s5-2.2 5-5V80c8.3 0 15-6.7 15-15V55z" />
            </svg>
            <span class="text-2xl font-bold text-green-600 dark:text-green-500">AgroMart</span>
          </a>
        </div>
        {{ $slot }}
      </div>
    </div>

    @livewireScripts
  </body>

</html>
