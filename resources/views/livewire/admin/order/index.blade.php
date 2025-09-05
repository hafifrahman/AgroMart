<div>
  <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
    <h2 class="mb-4 text-lg font-semibold text-gray-800 dark:text-gray-100">Daftar Pesanan</h2>
    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="w-full min-w-full text-left text-sm">
        <thead class="border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-700/50">
          <tr>
            <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">ID Pesanan</th>
            <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Pelanggan</th>
            <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Tanggal</th>
            <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Total</th>
            <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Status</th>
            <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
          @forelse ($orders as $order)
            <tr>
              <td class="whitespace-nowrap px-6 py-4 font-mono text-gray-700 dark:text-gray-200">
                # {{ $order->order_code }}
              </td>
              <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                {{ $order->user->name }}
              </td>
              <td class="whitespace-nowrap px-6 py-4 text-gray-500 dark:text-gray-400">
                {{ $order->created_at->format('d M Y') }}</td>
              <td class="whitespace-nowrap px-6 py-4 font-semibold text-gray-800 dark:text-gray-100">
                Rp {{ number_format($order->total_price, 0, ',', '.') }}
              </td>
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
              <td class="whitespace-nowrap px-6 py-4">
                <span class="{{ $statusClasses }} inline-block rounded-full px-3 py-1 text-xs font-semibold">
                  {{ ucfirst($order->status) }}
                </span>
              </td>
              <td class="whitespace-nowrap px-6 py-4 text-sm font-medium">
                <a href="{{ route('admin.order.show', $order) }}"
                  class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">Lihat</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="whitespace-nowrap px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                Tidak ada pesanan
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  <div class="mt-4">
    {{ $orders->links('components.layouts.admin.pagination') }}
  </div>
</div>
