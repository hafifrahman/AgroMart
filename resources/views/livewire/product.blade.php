<div class="container mx-auto px-4 py-10 sm:px-6 lg:px-8">
  <h1 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-800 dark:text-gray-100">Semua Produk</h1>
  <p class="mb-8 text-lg text-gray-500 dark:text-gray-400">Temukan produk terbaik untukmu.</p>

  <!-- Filter and Search Section -->
  <div class="mb-10 rounded-xl border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3 lg:grid-cols-4">
      <div class="md:col-span-1">
        <select wire:model.live="category_filter"
          class="w-full rounded-lg border-gray-300 bg-gray-50 p-3 text-sm text-gray-700 shadow-sm transition duration-150 ease-in-out focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:placeholder-gray-400 dark:focus:border-green-500 dark:focus:ring-green-500/50">
          <option value="Semua" {{ $category_filter === 'Semua' ? 'selected' : '' }}>Semua Kategori</option>
          @foreach ($categories as $category)
            <option value="{{ $category->name }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="relative md:col-span-2 lg:col-span-3">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
          <svg class="h-5 w-5 text-gray-400 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
          </svg>
        </div>

        <input type="text" wire:model.live.debounce500ms="search" placeholder="Cari produk..."
          class="w-full rounded-lg border-gray-300 bg-gray-50 p-3 pl-10 text-sm shadow-sm transition duration-150 ease-in-out focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:placeholder-gray-400 dark:focus:border-green-500 dark:focus:ring-green-500/50">
      </div>
    </div>
  </div>

  <!-- Products Grid -->
  @if ($products->isNotEmpty())
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
      @foreach ($products as $product)
        <div
          class="group relative flex flex-col overflow-hidden rounded-xl border border-gray-200 bg-white shadow-lg transition-all duration-300 hover:-translate-y-1 dark:border-gray-700 dark:bg-gray-800 dark:hover:shadow-green-500/10">
          <!-- Product Image -->
          <a href="{{ route('product.detail', $product->slug) }}">
            <div class="h-56 overflow-hidden">
              @if ($product->image && file_exists(public_path("storage/img/product/$product->image")))
                <img src="{{ asset("storage/img/product/$product->image") }}" alt="{{ $product->name }}"
                  class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
              @else
                <div class="flex size-full items-center justify-center rounded-md bg-gray-100 dark:bg-gray-700">
                  <svg class="size-28 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                  </svg>
                </div>
              @endif
            </div>
          </a>

          <!-- Product Details -->
          <div class="flex flex-1 flex-col p-5">
            <div class="flex-1">
              <span wire:click="filterCategory('{{ $product->category->name }}')"
                class="mb-2 inline-block cursor-pointer rounded-full bg-green-100 px-2.5 py-1 text-xs font-medium text-green-800 dark:bg-green-900/50 dark:text-green-300">
                {{ $product->category->name }}
              </span>

              <a href="{{ route('product.detail', $product->slug) }}">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                  {{ $product->name }}
                </h3>
              </a>
            </div>

            <!-- Price and Action Button -->
            <div class="mt-4">
              <p class="mb-4 text-2xl font-bold text-gray-900 dark:text-gray-50">
                Rp {{ number_format($product->price, 0, ',', '.') }}
              </p>

              @if (Auth::check() && Auth::user()->shoppingCarts()->where('product_id', $product->id)->exists())
                <button disabled
                  class="flex w-full items-center justify-center gap-2 rounded-lg bg-gray-200 px-4 py-2.5 text-center text-sm font-semibold text-gray-500 dark:bg-gray-700 dark:text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                      clip-rule="evenodd" />
                  </svg>
                  Sudah di Keranjang
                </button>
              @else
                <button type="button" wire:click="addToCart({{ $product->id }})"
                  class="flex w-full cursor-pointer items-center justify-center gap-2 rounded-lg bg-green-600 px-4 py-2.5 text-center text-sm font-semibold text-white transition-all duration-200 hover:bg-green-700 active:scale-95 dark:bg-green-600 dark:hover:bg-green-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  Tambah ke Keranjang
                </button>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="mt-10">
      {{ $products->links('components.layouts.pagination') }}
    </div>
  @else
    <div
      class="flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-gray-200 bg-white py-24 text-center dark:border-gray-700 dark:bg-gray-800">
      <div class="mb-4">
        <svg class="mx-auto h-16 w-16 text-gray-300 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM15.75 15.75l-2.489-2.489" />
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M11.99 2.251c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.375 2.251 11.99 2.251z"
            opacity="0.2" />
        </svg>
      </div>

      <h3 class="mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">Produk tidak ditemukan</h3>
      <p class="text-gray-500 dark:text-gray-400">Coba gunakan kata kunci lain atau ubah filter pencarian Anda.</p>
    </div>
  @endif
</div>
