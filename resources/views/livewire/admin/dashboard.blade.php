<!-- Stat Cards -->
<div>
  <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
    <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Penjualan</p>
          <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">Rp 120.5M</p>
        </div>
        <div class="rounded-full bg-green-100 p-3 dark:bg-green-500/20">
          <svg class="h-6 w-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 18h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
      </div>
    </div>
    <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Jumlah Pesanan</p>
          <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">1,280</p>
        </div>
        <div class="rounded-full bg-blue-100 p-3 dark:bg-blue-500/20">
          <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
        </div>
      </div>
    </div>
    <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Jumlah Pelanggan</p>
          <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $customerCount }}</p>
        </div>
        <div class="rounded-full bg-indigo-100 p-3 dark:bg-indigo-500/20">
          <svg class="h-6 w-6 text-indigo-600 dark:text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.28-1.25-.745-1.675M17 14c-4 0-5 3-5 3s-1-3-5-3m11 6V4m0 0a2 2 0 00-2-2H7a2 2 0 00-2 2v10m10-10a2 2 0 002 2h-2" />
          </svg>
        </div>
      </div>
    </div>
    <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Produk Terjual</p>
          <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">5,421</p>
        </div>
        <div class="rounded-full bg-amber-100 p-3 dark:bg-amber-500/20">
          <svg class="h-6 w-6 text-amber-600 dark:text-amber-400" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
          </svg>
        </div>
      </div>
    </div>
  </div>
  <!-- End Stat Cards -->

  <!-- Charts and Recent Orders -->
  <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-3">
    <!-- Sales Chart -->
    <div
      class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm lg:col-span-2 dark:border-gray-700 dark:bg-gray-800">
      <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Statistik Penjualan</h3>
      <p class="text-sm text-gray-500 dark:text-gray-400">7 Hari Terakhir</p>
      <div class="mt-4">
        <canvas id="salesChart"></canvas>
      </div>
    </div>

    <!-- Recent Orders -->
    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
      <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-gray-100">Pesanan Terbaru</h3>
      <div class="space-y-4">
        <div class="flex items-center">
          <div class="h-10 w-10 flex-shrink-0">
            <img class="h-full w-full rounded-full object-cover" src="https://ui-avatars.com/api/?name=Budi+Doremi"
              alt="Budi Doremi">
          </div>
          <div class="ml-4 flex-1">
            <p class="font-semibold text-gray-800 dark:text-gray-100">Budi Doremi</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">ID Pesanan: #87632</p>
          </div>
          <div class="text-right">
            <p class="font-bold text-green-600 dark:text-green-500">Rp 350.000</p>
            <span
              class="mt-1 inline-block rounded-full bg-green-100 px-2 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900/50 dark:text-green-300">Selesai</span>
          </div>
        </div>
        <div class="flex items-center">
          <div class="h-10 w-10 flex-shrink-0">
            <img class="h-full w-full rounded-full object-cover" src="https://ui-avatars.com/api/?name=Siti+Nurhaliza"
              alt="Siti Nurhaliza">
          </div>
          <div class="ml-4 flex-1">
            <p class="font-semibold text-gray-800 dark:text-gray-100">Siti Nurhaliza</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">ID Pesanan: #87631</p>
          </div>
          <div class="text-right">
            <p class="font-bold text-green-600 dark:text-green-500">Rp 125.000</p>
            <span
              class="mt-1 inline-block rounded-full bg-yellow-100 px-2 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">Tertunda</span>
          </div>
        </div>
        <div class="flex items-center">
          <div class="h-10 w-10 flex-shrink-0">
            <img class="h-full w-full rounded-full object-cover" src="https://ui-avatars.com/api/?name=Ahmad+Dhani"
              alt="Ahmad Dhani">
          </div>
          <div class="ml-4 flex-1">
            <p class="font-semibold text-gray-800 dark:text-gray-100">Ahmad Dhani</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">ID Pesanan: #87630</p>
          </div>
          <div class="text-right">
            <p class="font-bold text-green-600 dark:text-green-500">Rp 780.000</p>
            <span
              class="mt-1 inline-block rounded-full bg-red-100 px-2 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900/50 dark:text-red-300">Dibatalkan</span>
          </div>
        </div>
        <div class="flex items-center">
          <div class="h-10 w-10 flex-shrink-0">
            <img class="h-full w-full rounded-full object-cover" src="https://ui-avatars.com/api/?name=Joko+Anwar"
              alt="Joko Anwar">
          </div>
          <div class="ml-4 flex-1">
            <p class="font-semibold text-gray-800 dark:text-gray-100">Joko Anwar</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">ID Pesanan: #87629</p>
          </div>
          <div class="text-right">
            <p class="font-bold text-green-600 dark:text-green-500">Rp 50.000</p>
            <span
              class="mt-1 inline-block rounded-full bg-green-100 px-2 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900/50 dark:text-green-300">Selesai</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
