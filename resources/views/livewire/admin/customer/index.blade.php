<div>
  <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
    <h2 class="mb-4 text-lg font-semibold text-gray-800 dark:text-gray-100">Daftar Pelanggan</h2>
    <div class="overflow-x-auto">
      <table class="w-full min-w-full text-left text-sm">
        <thead class="border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-700/50">
          <tr>
            <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Nama Pelanggan</th>
            <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Email</th>
            <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Tanggal Bergabung</th>
            <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Total Pesanan</th>
            <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
          @forelse ($customers as $customer)
            <tr>
              <td class="whitespace-nowrap px-6 py-4">
                <div class="flex items-center">
                  <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ $customer->name }}"
                    alt="{{ $customer->name }}">
                  <div class="ml-4 font-medium text-gray-900 dark:text-white">{{ $customer->name }}</div>
                </div>
              </td>
              <td class="whitespace-nowrap px-6 py-4 text-gray-500 dark:text-gray-400">{{ $customer->email }}</td>
              <td class="whitespace-nowrap px-6 py-4 text-gray-500 dark:text-gray-400">
                {{ $customer->created_at->format('d M Y') }}</td>
              <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-800 dark:text-gray-100">
                {{ $customer->orders->count() }}</td>
              <td class="whitespace-nowrap px-6 py-4 text-sm font-medium">
                <a href="{{ route('admin.customer.show', $customer) }}" wire:navigate
                  class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">Lihat</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="whitespace-nowrap px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                Tidak ada pelanggan ditemukan.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  <div class="mt-4">
    {{ $customers->links('components.layouts.admin.pagination') }}
  </div>
</div>
