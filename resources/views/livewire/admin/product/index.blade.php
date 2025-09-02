<div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
  <div class="mb-4 flex flex-col items-center justify-between gap-4 sm:flex-row">
    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Daftar Produk</h2>
    <button id="add-product-btn"
      class="flex w-full cursor-pointer items-center justify-center gap-2 rounded-lg bg-green-600 px-4 py-2.5 text-center text-sm font-semibold text-white transition-all duration-200 hover:bg-green-700 active:scale-95 sm:w-auto">
      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
      </svg>
      Tambah Produk
    </button>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full min-w-full text-left text-sm">
      <thead class="border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-700/50">
        <tr>
          <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Nama Produk</th>
          <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Kategori</th>
          <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Harga</th>
          <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Stok</th>
          <th scope="col" class="px-6 py-3 font-medium text-gray-600 dark:text-gray-300">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
        @forelse ($products as $product)
          <tr>
            <td class="whitespace-nowrap px-6 py-4">
              <div class="flex items-center">
                <div class="h-10 w-10 flex-shrink-0">
                  @if ($product->image && file_exists(public_path("storage/img/product/$product->image")))
                    <img class="h-10 w-10 rounded-md object-cover"
                      src='{{ asset("storage/img/product/$product->image") }}' alt="{{ $product->name }}">
                  @else
                    <div class="flex h-10 w-10 items-center justify-center rounded-md bg-gray-100 dark:bg-gray-700">
                      <svg class="h-7 w-7 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                      </svg>
                    </div>
                  @endif
                </div>
                <div class="ml-4">
                  <div class="font-medium text-gray-900 dark:text-white">{{ $product->name }}</div>
                </div>
              </div>
            </td>
            <td class="whitespace-nowrap px-6 py-4 text-gray-500 dark:text-gray-400">{{ $product->category->name }}
            </td>
            <td class="whitespace-nowrap px-6 py-4 font-semibold text-gray-800 dark:text-gray-100">
              Rp {{ number_format($product->price, 0, ',', '.') }}</td>
            <td class="whitespace-nowrap px-6 py-4 text-gray-500 dark:text-gray-400">150</td>
            <td class="flex whitespace-nowrap px-6 py-4 text-sm font-medium">
              {{-- <livewire:admin.product.edit :product="$product" /> --}}

              <button type="button" wire:click="deleteProduct({{ $product->id }})"
                class="ml-4 cursor-pointer text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                Hapus
              </button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5"
              class="whitespace-nowrap px-6 py-4 text-center font-semibold text-gray-500 dark:text-gray-400">
              Product Kosong
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div id="add-product-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 px-4"
    aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="w-full max-w-3xl transform rounded-xl bg-white p-6 shadow-xl transition-all dark:bg-gray-800">
      <div class="flex items-start justify-between">
        <h3 id="product-modal-title" class="text-xl font-semibold text-gray-900 dark:text-white">Tambah Produk Baru
        </h3>
        <button type="button"
          class="close-modal-btn rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-300">
          <span class="sr-only">Close</span>
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="mt-4">
        <form wire:submit.prevent="store" class="space-y-4">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              Nama Produk
            </label>
            <input type="text" wire:model="name" id="name"
              class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-green-500 focus:ring-green-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
          </div>
          <div>
            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar</label>
            <input type="file" wire:model="image" id="image"
              class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-green-500 focus:ring-green-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
          </div>
          <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
            <select id="category_id" wire:model="category_id"
              class="mt-1 block w-full rounded-md border-gray-300 p-3 shadow-sm focus:border-green-500 focus:ring-green-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
              <option value="">Pilih Kategori</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga</label>
              <input type="number" wire:model="price" id="price"
                class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-green-500 focus:ring-green-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
            </div>
            <div>
              <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stok</label>
              <input type="number" wire:model="stock" id="stock" value="1"
                class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-green-500 focus:ring-green-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
            </div>
          </div>
          <div class="mt-4 flex justify-end space-x-3">
            <button type="button"
              class="close-modal-btn rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">Batal</button>
            <button type="submit"
              class="inline-flex justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
