<header
  class="sticky top-0 z-20 border-b border-gray-200 bg-white/80 shadow-sm backdrop-blur-sm dark:border-gray-700 dark:bg-gray-800/80">
  <div class="flex items-center justify-between p-4">
    <button id="sidebar-toggle" class="text-gray-500 focus:outline-none md:hidden">
      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
      </svg>
    </button>

    <h1 class="hidden text-2xl font-bold text-gray-800 md:block dark:text-gray-100">
      {{ $title }}
    </h1>

    <div class="flex items-center space-x-4">
      <x-toggle-theme />

      <div class="relative">
        <button class="flex items-center space-x-2">
          <img class="h-9 w-9 rounded-full object-cover"
            src="https://ui-avatars.com/api/?name=Admin&background=22C55E&color=fff" alt="Admin profile picture">
          <span class="hidden font-semibold text-gray-700 sm:block dark:text-gray-200">Admin</span>
        </button>
      </div>
    </div>
  </div>
</header>
