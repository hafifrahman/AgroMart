<div class="container mx-auto px-4 py-10 sm:px-6 lg:px-8">
  <h1 class="mb-8 text-3xl font-bold tracking-tight text-gray-800 dark:text-gray-100">Riwayat Pesanan Saya</h1>

  @if ($orders->isNotEmpty())
    <div class="space-y-6">
      @foreach ($orders as $order)
        <div
          class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm transition-shadow duration-300 hover:shadow-md dark:border-gray-700 dark:bg-gray-800">
          <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
            <div>
              <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Order ID</p>
              <p class="text-lg font-semibold text-green-600 dark:text-green-500">{{ $order->order_code }}</p>
            </div>
            <div>
              <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Pesanan</p>
              <p class="font-medium text-gray-800 dark:text-gray-200">{{ $order->created_at->format('d F Y') }}</p>
            </div>
            <div>
              <p class="text-sm text-gray-500 dark:text-gray-400">Total Pembayaran</p>
              <p class="font-bold text-gray-800 dark:text-gray-200">Rp
                {{ number_format($order->total_price, 0, ',', '.') }}</p>
            </div>
            <div>
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
              <span class="{{ $statusClasses }} rounded-full px-3 py-1 text-sm font-semibold">
                {{ ucfirst($order->status) }}
              </span>
            </div>
            <div>
              {{-- Anda bisa membuat halaman detail pesanan di sini --}}
              <a href="#"
                class="font-semibold text-green-600 hover:text-green-500 dark:text-green-500 dark:hover:text-green-400">
                Lihat Detail
              </a>
            </div>
          </div>
        </div>
      @endforeach

      <div class="mt-8">
        {{ $orders->links('components.layouts.pagination') }}
      </div>

    </div>
  @else
    <div class="rounded-xl bg-white py-16 text-center shadow-md dark:bg-gray-800">
      <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        aria-hidden="true">
        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
      </svg>
      <h3 class="mt-2 text-xl font-medium text-gray-900 dark:text-gray-100">Tidak ada pesanan</h3>
      <p class="mt-1 text-gray-500 dark:text-gray-400">Anda belum pernah melakukan pemesanan.</p>
      <div class="mt-6">
        <a href="{{ Auth::user()->shoppingCarts()->exists() ? route('cart') : route('product') }}" wire:navigate
          class="inline-block rounded-lg bg-green-600 px-6 py-2 font-bold text-white hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-500">
          Mulai Belanja
        </a>
      </div>
    </div>
  @endif
</div>
