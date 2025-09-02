<div>
  <button type="button" data-id="{{ $id }}"
    class="edit-product-btn text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
    Edit
  </button>

  <div id="edit-product-modal-{{ $id }}"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 px-4" aria-labelledby="modal-title"
    role="dialog" aria-modal="true">
    <div class="w-full max-w-3xl transform rounded-xl bg-white p-6 shadow-xl transition-all dark:bg-gray-800">
      <div class="flex items-start justify-between">
        <h3 id="product-modal-title" class="text-xl font-semibold text-gray-900 dark:text-white">
          Tambah Produk Baru
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
