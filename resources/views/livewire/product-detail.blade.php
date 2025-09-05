<div class="container mx-auto px-4 py-10 sm:px-6 lg:px-8">
  <h1 class="mb-8 text-4xl font-extrabold tracking-tight text-gray-800 dark:text-gray-100">Detail Produk</h1>

  <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:gap-12">

      <!-- Product Image Gallery -->
      <div class="flex flex-col gap-4">
        <div class="overflow-hidden rounded-lg border border-gray-300 dark:border-gray-700">
          <img id="main-product-image" src="{{ asset('storage/img/product/' . $product->image) }}"
            alt="{{ $product->name }}"
            class="h-full w-full object-cover transition-transform duration-300 hover:scale-105">
        </div>
        <div class="grid grid-cols-4 gap-4">
          <button class="thumbnail-button rounded-md border-2 border-green-500 ring-2 ring-green-500/50">
            <img src="{{ asset('storage/img/product/' . $product->image) }}" alt="Tampilan 1 {{ $product->name }}"
              class="h-full w-full object-cover">
          </button>
          <button class="thumbnail-button rounded-md border-2 border-transparent hover:border-green-500">
            <img src="https://placehold.co/150x150/F97316/FFFFFF?text=Apel+2" alt="Tampilan 2 Apel Fuji"
              class="h-full w-full object-cover">
          </button>
          <button class="thumbnail-button rounded-md border-2 border-transparent hover:border-green-500">
            <img src="https://placehold.co/150x150/F97316/FFFFFF?text=Apel+3" alt="Tampilan 3 Apel Fuji"
              class="h-full w-full object-cover">
          </button>
          <button class="thumbnail-button rounded-md border-2 border-transparent hover:border-green-500">
            <img src="https://placehold.co/150x150/F97316/FFFFFF?text=Apel+4" alt="Tampilan 4 Apel Fuji"
              class="h-full w-full object-cover">
          </button>
        </div>
      </div>

      <!-- Product Details -->
      <div>
        <span
          class="mb-2 inline-block rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-800 dark:bg-green-900/50 dark:text-green-300">
          {{ $product->category->name }}
        </span>
        <h1 class="text-3xl font-extrabold tracking-tight text-slate-800 lg:text-4xl dark:text-slate-100">
          {{ $product->name }}
        </h1>
        <p class="mt-4 text-3xl font-bold text-slate-900 dark:text-slate-50">
          Rp {{ number_format($product->price, 0, ',', '.') }}
        </p>

        <div class="mt-6 flex flex-col gap-4 sm:flex-row sm:items-center">
          <!-- Quantity Selector -->
          <div class="flex items-center">
            <label for="quantity" class="sr-only">Jumlah</label>
            <button type="button" @if ($quantity > 1) wire:click="decrementQuantity" @endif
              class="flex h-11 w-11 items-center justify-center rounded-l-lg border border-gray-300 bg-gray-100 text-gray-600 hover:bg-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
              &minus;
            </button>

            <input type="text" id="quantity" wire:model="quantity" min="1" max="100"
              class="h-11 w-16 border-y border-gray-300 text-center font-semibold text-gray-800 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
              disabled>

            <button type="button" wire:click="incrementQuantity"
              class="flex h-11 w-11 items-center justify-center rounded-r-lg border border-gray-300 bg-gray-100 text-gray-600 hover:bg-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
              &plus;
            </button>
          </div>

          <!-- Add to Cart Button -->
          @if (Auth::check() && Auth::user()->shoppingCarts()->where('product_id', $product->id)->exists())
            <button disabled
              class="flex flex-1 items-center justify-center gap-2 rounded-lg bg-gray-200 px-8 py-3 text-center text-base font-semibold text-gray-500 dark:bg-gray-700 dark:text-gray-400">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                  clip-rule="evenodd" />
              </svg>
              Sudah di Keranjang
            </button>
          @else
            <button type="button" wire:click="addToCart({{ $product->id }})"
              class="flex flex-1 cursor-pointer items-center justify-center gap-2 rounded-lg bg-green-600 px-8 py-3 text-center text-base font-semibold text-white transition-all duration-200 hover:bg-green-700 active:scale-95">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              Tambah ke Keranjang
            </button>
          @endif
        </div>

        <!-- Product Description -->
        <div class="mt-8">
          <h3 class="text-base font-semibold text-slate-800 dark:text-slate-200">Deskripsi</h3>
          <div class="prose prose-slate mt-2 max-w-none text-slate-600 dark:text-slate-300">
            <p>{{ $product->description }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
