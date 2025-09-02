<div>
  <header class="bg-green-100 dark:bg-gray-900">
    <div class="container mx-auto px-6 py-16 text-center">
      <h1 class="text-4xl font-bold text-green-800 md:text-5xl">Solusi Pertanian Modern Anda</h1>

      <p class="mx-auto mt-4 max-w-2xl text-lg text-green-700">
        Temukan alat, bibit, dan pupuk kualitas terbaik untuk hasil panen melimpah.
      </p>

      <a href="{{ route('product') }}" wire:navigate
        class="mt-8 inline-block transform rounded-full bg-green-600 px-8 py-3 font-bold text-white transition hover:scale-105 hover:bg-green-700 dark:hover:bg-green-500">
        Belanja Sekarang
      </a>
    </div>
  </header>

  <section class="bg-white py-12 dark:bg-gray-800">
    <div class="container mx-auto px-6">
      <h2 class="mb-8 text-center text-3xl font-bold text-gray-800 dark:text-white">Produk Unggulan</h2>
      <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($products as $product)
          @if ($product->featured)
            <div
              class="hover:-trangray-y-1 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-lg transition-all duration-300 dark:border-gray-700 dark:bg-gray-800 dark:hover:shadow-green-500/10">
              <a href="{{ route('product.detail', $product->slug) }}">
                <img src="{{ $product->image }}" alt="{{ $product->name }}"
                  class="group-hover:scale-105r h-48 w-full object-cover transition-transform duration-300">
              </a>
              <div class="p-4">
                <span
                  class="mb-2 inline-block rounded-full bg-green-100 px-2.5 py-1 text-xs font-medium text-green-800 dark:bg-green-900/50 dark:text-green-300">
                  {{ $product->category->name }}
                </span>

                <a href="{{ route('product.detail', $product->slug) }}">
                  <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $product->name }}</h3>
                </a>

                <p class="mb-4 text-2xl font-bold text-gray-900 dark:text-gray-50">
                  Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                @if (Auth::check() && Auth::user()->shoppingCarts()->where('product_id', $product->id)->exists())
                  <button disabled
                    class="mt-4 flex w-full items-center justify-center gap-2 rounded-lg bg-gray-200 px-4 py-2.5 text-center text-sm font-semibold text-gray-500 dark:bg-gray-700 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                    </svg>
                    Sudah di Keranjang
                  </button>
                @else
                  <button type="button" wire:click="addToCart({{ $product->id }})"
                    class="mt-4 flex w-full cursor-pointer items-center justify-center gap-2 rounded-lg bg-green-600 px-4 py-2.5 text-center text-sm font-semibold text-white transition-all duration-200 hover:bg-green-700 active:scale-95 dark:bg-green-600 dark:hover:bg-green-500">
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
          @endif
        @endforeach
      </div>
    </div>
  </section>
</div>
