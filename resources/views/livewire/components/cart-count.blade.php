<a href="{{ route('cart') }}" wire:navigate class="group relative text-gray-600 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-500">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
  </svg>
  @if ($cartCount > 0)
    <span
      class="absolute -right-2 -top-2 flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-xs text-white">
      {{ $cartCount }}
    </span>
  @endif
  <div
    class="absolute left-1/2 top-full mb-2 w-max -translate-x-1/2 transform rounded-md bg-gray-800 px-2 py-1 text-xs text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100 dark:bg-gray-900">
    Keranjang
  </div>
</a>
