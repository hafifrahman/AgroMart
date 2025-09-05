<div>
  <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
    <div class="mb-4 flex items-center justify-between">
      <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Detail Pelanggan</h2>
      <a href="{{ route('admin.customer.index') }}" wire:navigate
        class="inline-flex items-center gap-2 rounded-lg bg-gray-200 px-4 py-2.5 text-sm font-semibold text-gray-800 transition-all duration-200 hover:bg-gray-300 active:scale-95 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        Kembali
      </a>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
      {{-- Informasi Dasar Pelanggan --}}
      <div class="border-b pb-4 dark:border-gray-700">
        <h3 class="mb-2 font-semibold text-gray-700 dark:text-gray-300">Informasi Pelanggan</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          <strong>Nama:</strong> {{ $customer->name }}
        </p>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          <strong>Email:</strong> {{ $customer->email }}
        </p>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          <strong>Tanggal Bergabung:</strong> {{ $customer->created_at->format('d M Y') }}
        </p>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          <strong>Total Pesanan:</strong> {{ $customer->orders->count() }}
        </p>
      </div>
    </div>

    {{-- Daftar Pesanan Pelanggan --}}
    <div class="mt-6">
      <h3 class="mb-4 font-semibold text-gray-700 dark:text-gray-300">Daftar Pesanan Pelanggan</h3>
      <div class="overflow-x-auto">
        <table class="w-full min-w-full text-left text-sm">
          <thead class="border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-700/50">
            <tr>
              <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">ID Pesanan</th>
              <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Tanggal</th>
              <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Total</th>
              <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Status</th>
              <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($customer->orders as $item)
              <tr>
                <td class="whitespace-nowrap px-6 py-4 font-mono text-gray-700 dark:text-gray-200">
                  # {{ $item->order_code }}
                </td>
                <td class="whitespace-nowrap px-6 py-4 text-gray-500 dark:text-gray-400">
                  {{ $item->created_at->format('d M Y') }}</td>
                <td class="whitespace-nowrap px-6 py-4 font-semibold text-gray-800 dark:text-gray-100">
                  Rp {{ number_format($item->total_price, 0, ',', '.') }}
                </td>
                @php
                  $statusClasses =
                      [
                          'pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
                          'processing' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                          'shipped' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300',
                          'completed' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
                          'cancelled' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
                      ][$item->status] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300';
                @endphp
                <td class="whitespace-nowrap px-6 py-4">
                  <span class="{{ $statusClasses }} inline-block rounded-full px-3 py-1 text-xs font-semibold">
                    {{ ucfirst($item->status) }}
                  </span>
                </td>
                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium">
                  <a href="{{ route('admin.order.show', $item) }}" wire:navigate
                    class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">Lihat</a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="whitespace-nowrap px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                  Tidak ada pesanan ditemukan.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
