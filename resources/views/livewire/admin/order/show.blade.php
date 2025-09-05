<div class="p-6">
  <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
    <div class="mb-4 flex items-center justify-between">
      <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Detail Pesanan #{{ $order->order_code }}</h2>
      <a href="{{ route('admin.order.index') }}" wire:navigate
        class="inline-flex items-center gap-2 rounded-lg bg-gray-200 px-4 py-2.5 text-sm font-semibold text-gray-800 transition-all duration-200 hover:bg-gray-300 active:scale-95 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        Kembali
      </a>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
      {{-- Informasi Pelanggan --}}
      <div class="border-b pb-4 dark:border-gray-700">
        <h3 class="mb-2 font-semibold text-gray-700 dark:text-gray-300">Informasi Pelanggan</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          <strong>Nama:</strong> {{ $order->user->name }}
        </p>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          <strong>Email:</strong> {{ $order->user->email }}
        </p>
      </div>

      {{-- Informasi Pesanan --}}
      <div class="border-b pb-4 dark:border-gray-700">
        <h3 class="mb-2 font-semibold text-gray-700 dark:text-gray-300">Detail Pesanan</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          <strong>Tanggal:</strong> {{ $order->created_at->format('d F Y') }}
        </p>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          <strong>Total Harga:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}
        </p>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          <strong>Status:</strong> {{ ucfirst($order->status) }}
        </p>
      </div>
    </div>

    {{-- Daftar Produk --}}
    <div class="mt-6">
      <h3 class="mb-4 font-semibold text-gray-700 dark:text-gray-300">Produk Pesanan</h3>
      <div class="overflow-x-auto">
        <table class="w-full min-w-full text-left text-sm">
          <thead class="border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-700/50">
            <tr>
              <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Produk</th>
              <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Harga</th>
              <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Jumlah</th>
              <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Subtotal</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($order->items as $item)
              <tr>
                <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                  {{ $item->product->name }}
                </td>
                <td class="whitespace-nowrap px-6 py-4 text-gray-500 dark:text-gray-400">
                  Rp {{ number_format($item->price, 0, ',', '.') }}
                </td>
                <td class="whitespace-nowrap px-6 py-4 text-gray-500 dark:text-gray-400">
                  {{ $item->quantity }}
                </td>
                <td class="whitespace-nowrap px-6 py-4 font-semibold text-gray-800 dark:text-gray-100">
                  Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
