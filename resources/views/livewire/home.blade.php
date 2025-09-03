<div>
  <header
    class="bg-gradient-to-r from-green-100 via-green-200 to-green-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    <div class="container mx-auto px-6 py-20 text-center">
      <h1 class="text-5xl font-extrabold leading-tight text-green-900 md:text-6xl dark:text-white">
        Panen Lebih Banyak, Lebih Mudah 🌾
      </h1>

      <p class="mx-auto mt-6 max-w-2xl text-xl text-green-800 dark:text-green-300">
        Solusi pertanian modern untuk petani cerdas: alat inovatif, bibit unggul, dan pupuk terbaik.
      </p>

      <div class="mt-10 flex flex-wrap justify-center gap-4">
        <a href="{{ route('product') }}" wire:navigate
          class="inline-block rounded-full bg-green-600 px-8 py-3 text-lg font-semibold text-white transition hover:scale-105 hover:bg-green-700 dark:hover:bg-green-500">
          Belanja Sekarang
        </a>
      </div>
    </div>
  </header>

  <section class="border-t border-gray-200 py-12 dark:border-gray-700">
    <div class="container mx-auto px-6">
      <h2 class="mb-8 text-center text-3xl font-bold text-gray-800 dark:text-white">Produk Unggulan</h2>
      <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($products as $product)
          @if ($product->featured)
            <div
              class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-lg transition-all duration-300 hover:-translate-y-1 dark:border-gray-700 dark:bg-gray-800 dark:hover:shadow-green-500/10">
              <a href="{{ route('product.detail', $product->slug) }}">
                @if ($product->image && file_exists(public_path("storage/img/product/$product->image")))
                  <img src='{{ asset("storage/img/product/$product->image") }}' alt="{{ $product->name }}"
                    class="group-hover:scale-105r h-48 w-full object-cover transition-transform duration-300">
                @else
                  <div class="flex h-48 w-full items-center justify-center rounded-md bg-gray-100 dark:bg-gray-700">
                    <svg class="h-24 w-24 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                      fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                  </div>
                @endif
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
