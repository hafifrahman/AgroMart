<nav
  class="sticky top-0 z-50 border-b border-gray-200 bg-white shadow-md dark:border-gray-700 dark:bg-gray-800 dark:shadow-lg dark:shadow-gray-900/20">
  <div class="container mx-auto flex items-center justify-between px-6 py-3">
    <div class="flex items-center">
      <button id="hamburger-button" type="button"
        class="mr-4 inline-flex cursor-pointer items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-gray-400 md:hidden"
        aria-controls="mobile-menu" aria-expanded="false">
        <span class="sr-only">Buka menu utama</span>

        <svg id="hamburger-icon" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>

        <svg id="close-icon" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      <a href="{{ route('home') }}" wire:navigate class="flex flex-shrink-0 items-center space-x-2">
        <svg width="40" height="40" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          <path fill="#22C55E"
            d="M100 0C44.8 0 0 44.8 0 100s44.8 100 100 100 100-44.8 100-100S155.2 0 100 0zM85 150c-2.8 0-5-2.2-5-5V80c0-13.8 11.2-25 25-25s25 11.2 25 25v15c0 2.8-2.2 5-5 5s-5-2.2-5-5V80c-8.3 0-15 6.7-15 15v55c0 2.8-2.2 5-5 5z" />
          <path fill="#16A34A"
            d="M115 55c-13.8 0-25 11.2-25 25v70c0 2.8 2.2 5 5 5s5-2.2 5-5V80c8.3 0 15-6.7 15-15V55z" />
        </svg>
        <span class="text-2xl font-bold text-green-600 dark:text-green-500">AgroMart</span>
      </a>
    </div>

    <div class="hidden items-center space-x-6 md:flex">
      <a href="{{ route('home') }}" wire:navigate
        class="text-gray-600 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-500">Beranda</a>
      <a href="{{ route('product') }}" wire:navigate
        class="text-gray-600 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-500">Produk</a>
      <a href="{{ route('about') }}" wire:navigate
        class="text-gray-600 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-500">Tentang Kami</a>
      <a href="{{ route('contact') }}" wire:navigate
        class="text-gray-600 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-500">Kontak</a>
    </div>

    <div class="hidden items-center space-x-4 md:flex">
      @auth
        <a href="{{ route('my.orders') }}" wire:navigate
          class="group relative text-gray-600 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-500">

          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>

          <div
            class="absolute top-full left-1/2 mb-2 w-max -translate-x-1/2 transform rounded-md bg-gray-800 px-2 py-1 text-xs text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100 dark:bg-gray-900">
            Pesanan Saya
          </div>
        </a>
      @endauth

      <livewire:components.cart-count />

      <x-toggle-theme />

      @auth
        <a href="@if (Auth::user()->role === 'admin') {{ route('admin.dashboard') }} @else # @endif" wire:navigate
          class="flex items-center space-x-2 border-l pl-4 dark:border-gray-600">
          <div
            class="flex h-9 w-9 items-center justify-center rounded-full bg-green-200 font-bold text-green-700 dark:bg-green-900 dark:text-green-200">
            @php
              function getInitials($name)
              {
                  $words = explode(' ', $name);

                  if (count($words) >= 2) {
                      return strtoupper(mb_substr($words[0], 0, 1) . mb_substr($words[1], 0, 1));
                  }

                  return strtoupper(mb_substr($name, 0, 2));
              }
            @endphp
            <span class="text-lg font-bold">{{ getInitials(Auth::user()->name) }}</span>
          </div>
          <span
            class="hidden text-sm font-semibold text-gray-700 lg:block dark:text-gray-200">{{ Auth::user()->name }}</span>
        </a>

        <form action="{{ route('logout') }}" method="post" wire:confirm>
          @csrf
          <button type="submit"
            class="cursor-pointer rounded-md bg-red-500 px-3 py-2 text-sm text-white hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700">
            Logout
          </button>
        </form>
      @else
        <a href="{{ route('login') }}" wire:navigate
          class="text-gray-600 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-500">Login</a>
      @endauth
    </div>

    {{-- Tombol Hamburger (Mobile) --}}
    <div class="flex items-center space-x-4 md:hidden">
      <livewire:components.cart-count />
      <x-toggle-theme />
      @auth
        <form action="{{ route('logout') }}" method="post" wire:confirm>
          @csrf
          <button type="submit"
            class="w-full rounded-md bg-red-500 px-3 py-2 text-left text-base font-medium text-white hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700">
            Logout
          </button>
        </form>
      @else
        <a href="{{ route('login') }}" wire:navigate
          class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-green-600 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-green-500">Login</a>
      @endauth
    </div>
  </div>

  {{-- Panel Menu Mobile diberi ID dan kelas 'hidden' --}}
  <div class="hidden border-t border-gray-200 md:hidden dark:border-gray-700" id="mobile-menu">
    <div class="space-y-1 px-4 pb-3 pt-2">
      <a href="{{ route('home') }}" wire:navigate
        class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-green-600 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-green-500">Beranda</a>
      <a href="{{ route('product') }}" wire:navigate
        class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-green-600 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-green-500">Produk</a>
      <a href="{{ route('about') }}" wire:navigate
        class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-green-600 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-green-500">Tentang
        Kami</a>
      <a href="{{ route('contact') }}" wire:navigate
        class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-green-600 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-green-500">Kontak</a>
    </div>

    {{-- Info User & Logout (Mobile) --}}
    <div class="border-t border-gray-200 px-4 py-3 dark:border-gray-700">
      @auth
        <div class="flex items-center space-x-3">
          <div
            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-green-200 font-bold text-green-700 dark:bg-green-900 dark:text-green-200">
            <span class="text-lg font-bold">{{ getInitials(Auth::user()->name) }}</span>
          </div>
          <div>
            <div class="text-base font-medium text-gray-800 dark:text-white">{{ Auth::user()->name }}</div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
          </div>
        </div>
      @endauth
    </div>
  </div>
</nav>
