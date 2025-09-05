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
          <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $orderCount }}</p>
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
          <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $customers->count() }}</p>
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
      @if ($orders->isNotEmpty())
        <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-gray-100">Pesanan Terbaru</h3>
        <div class="space-y-4">
          @foreach ($orders as $order)
            <div class="flex items-center">
              <div class="h-10 w-10 flex-shrink-0">
                <img class="h-full w-full rounded-full object-cover"
                  src="https://ui-avatars.com/api/?name={{ $order->user->name }}" alt="{{ $order->user->name }}">
              </div>
              <div class="ml-4 flex-1">
                <p class="font-semibold text-gray-800 dark:text-gray-100">{{ $order->user->name }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">ID Pesanan: #{{ $order->order_code }}</p>
              </div>
              <div class="text-right">
                <p class="font-bold text-green-600 dark:text-green-500">Rp
                  {{ number_format($order->total_price, 0, ',', '.') }}</p>
                @php
                  $statusClasses =
                      [
                          'pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
                          'processing' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                          'shipped' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300',
                          'completed' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
                          'cancelled' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
                      ][$order->status] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300';
                @endphp
                <span
                  class="{{ $statusClasses }} mt-1 inline-block rounded-full px-2 py-1 text-xs font-semibold">{{ ucfirst($order->status) }}</span>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="rounded-xl bg-white py-16 text-center shadow-md dark:bg-gray-800">
          <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            aria-hidden="true">
            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-gray-100">Tidak ada pesanan terbaru</h3>
          <p class="mt-1 text-gray-500 dark:text-gray-400">Belum ada pesanan yang masuk.</p>
        </div>
      @endif
    </div>
  </div>
</div>
