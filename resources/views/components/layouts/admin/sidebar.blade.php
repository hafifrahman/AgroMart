<aside id="sidebar"
  class="fixed inset-y-0 left-0 z-40 w-64 -translate-x-full transform overflow-y-auto bg-white p-4 shadow-lg transition-transform duration-300 ease-in-out md:relative md:block md:translate-x-0 dark:bg-gray-800">
  <div class="mb-10 flex items-center space-x-2">
    <svg width="40" height="40" viewBox="0 0 200 200" xmlns="http://www.w.w3.org/2000/svg">
      <path fill="#22C55E"
        d="M100 0C44.8 0 0 44.8 0 100s44.8 100 100 100 100-44.8 100-100S155.2 0 100 0zM85 150c-2.8 0-5-2.2-5-5V80c0-13.8 11.2-25 25-25s25 11.2 25 25v15c0 2.8-2.2 5-5 5s-5-2.2-5-5V80c-8.3 0-15 6.7-15 15v55c0 2.8-2.2 5-5 5z" />
      <path fill="#16A34A" d="M115 55c-13.8 0-25 11.2-25 25v70c0 2.8 2.2 5 5 5s5-2.2 5-5V80c8.3 0 15-6.7 15-15V55z" />
    </svg>
    <span class="text-2xl font-bold text-green-600 dark:text-green-500">AgroMart</span>
  </div>
  <nav class="flex-1 space-y-2">
    <a href="{{ route('admin.dashboard') }}" wire:navigate
      class="{{ request()->is('admin/dashboard') ? 'text-white dark:bg-green-500 bg-green-600' : 'text-gray-600 transition-colors duration-200 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700' }} flex items-center space-x-3 rounded-lg px-4 py-2.5">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
      </svg>
      <span class="font-semibold">Dashboard</span>
    </a>
    <a href="{{ route('admin.product') }}" wire:navigate
      class="{{ request()->is('admin/product') ? 'text-white dark:bg-green-500 bg-green-600' : 'text-gray-600 transition-colors duration-200 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700' }} flex items-center space-x-3 rounded-lg px-4 py-2.5">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
      </svg>
      <span class="font-semibold">Produk</span>
    </a>
    <a href="{{ route('admin.order') }}" wire:navigate
      class="{{ request()->is('admin/order') ? 'text-white dark:bg-green-500 bg-green-600' : 'text-gray-600 transition-colors duration-200 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700' }} flex items-center space-x-3 rounded-lg px-4 py-2.5">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
      </svg>
      <span class="font-semibold">Pesanan</span>
    </a>
    <a href="{{ route('admin.customer') }}" wire:navigate
      class="{{ request()->is('admin/customer') ? 'text-white dark:bg-green-500 bg-green-600' : 'text-gray-600 transition-colors duration-200 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700' }} flex items-center space-x-3 rounded-lg px-4 py-2.5">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21a6 6 0 00-9-5.197M15 21a6 6 0 006-6v-1a6 6 0 00-9-5.197" />
      </svg>
      <span class="font-semibold">Pelanggan</span>
    </a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
      class="flex items-center space-x-3 rounded-lg px-4 py-2.5 text-gray-600 transition-colors duration-200 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
      </svg>
      <span class="font-semibold">Logout</span>
    </a>
    <form action="{{ route('logout') }}" method="post" id="logout-form">
      @csrf
    </form>
    <a href="{{ route('home') }}" wire:navigate
      class="flex items-center space-x-3 rounded-lg px-4 py-2.5 text-gray-600 transition-colors duration-200 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round" />
      </svg>
      <span class="font-semibold">Kembali ke Toko</span>
    </a>
  </nav>
</aside>

<div id="sidebar-overlay" class="fixed inset-0 z-30 hidden bg-black/60 transition-opacity duration-300 md:hidden"></div>
