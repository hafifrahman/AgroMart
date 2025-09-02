<nav class="sticky top-0 z-50 bg-white shadow-md dark:bg-gray-800 dark:shadow-lg dark:shadow-gray-900/20">
  <div class="container mx-auto flex items-center justify-between px-6 py-3">
    <a href="{{ route('home') }}" wire:navigate class="flex items-center space-x-2">
      <svg width="40" height="40" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path fill="#22C55E"
          d="M100 0C44.8 0 0 44.8 0 100s44.8 100 100 100 100-44.8 100-100S155.2 0 100 0zM85 150c-2.8 0-5-2.2-5-5V80c0-13.8 11.2-25 25-25s25 11.2 25 25v15c0 2.8-2.2 5-5 5s-5-2.2-5-5V80c-8.3 0-15 6.7-15 15v55c0 2.8-2.2 5-5 5z" />
        <path fill="#16A34A" d="M115 55c-13.8 0-25 11.2-25 25v70c0 2.8 2.2 5 5 5s5-2.2 5-5V80c8.3 0 15-6.7 15-15V55z" />
      </svg>
      <span class="text-2xl font-bold text-green-600 dark:text-green-500">AgroMart</span>
    </a>

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

    <div class="flex items-center space-x-4">
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
  </div>
</nav>
