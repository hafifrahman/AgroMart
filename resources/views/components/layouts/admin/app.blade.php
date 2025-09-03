<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title . ' - ' . config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
      body {
        font-family: 'Inter', sans-serif;
      }

      /* Custom scrollbar for webkit browsers */
      ::-webkit-scrollbar {
        width: 8px;
      }

      ::-webkit-scrollbar-track {
        background: transparent;
      }

      ::-webkit-scrollbar-thumb {
        background: #4a5568;
        border-radius: 4px;
      }

      ::-webkit-scrollbar-thumb:hover {
        background: #2d3748;
      }

      .dark ::-webkit-scrollbar-thumb {
        background: #718096;
      }

      .dark ::-webkit-scrollbar-thumb:hover {
        background: #a0aec0;
      }

      /* Sidebar transition */
      #sidebar {
        transition: transform 0.3s ease-in-out;
      }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
  </head>

  <body class="bg-gray-100 dark:bg-gray-900">
    <div class="flex h-screen overflow-hidden">

      <x-layouts.admin.sidebar />

      <div class="flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
        <x-layouts.admin.header :title="$title" />

        <main class="flex-1 p-6 md:p-8">
          {{ $slot }}
        </main>
      </div>
    </div>

    @livewireScripts
  </body>

</html>
