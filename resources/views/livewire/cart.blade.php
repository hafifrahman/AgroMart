<div class="container mx-auto px-4 py-10 sm:px-6 lg:px-8">
  <h1 class="mb-12 text-4xl font-extrabold tracking-tight text-gray-800 dark:text-gray-100">Keranjang Belanja</h1>

  @if ($cartItems && $cartItems->count() > 0)
    <div class="flex flex-col gap-8 lg:flex-row">
      <!-- Daftar Item Keranjang -->
      <div
        class="w-full rounded-xl border border-gray-200 bg-white shadow-sm lg:w-2/3 dark:border-gray-700 dark:bg-gray-800">
        <div class="flex items-center justify-between border-b border-b-gray-200 p-4 dark:border-b-gray-700">
          <div class="flex items-center">
            <input type="checkbox" @if ($selectAll) checked @endif wire:click="toggleSelectAll"
              class="h-5 w-5 rounded border-gray-300 text-green-600 focus:ring-green-500 dark:ring-offset-gray-800 dark:focus:ring-green-600">
            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Pilih Semua
              ({{ $selectedCount }}/{{ $cartItems->count() }})</span>
          </div>
        </div>

        @foreach ($cartItems as $item)
          <div
            class="flex items-center justify-between border-b border-b-gray-200 p-4 last:border-b-0 dark:border-b-gray-700">
            <div class="flex items-center">
              <input type="checkbox" @if (in_array($item->id, $selectedItems)) checked @endif
                wire:click="toggleItem({{ $item->id }})"
                class="mr-3 h-5 w-5 rounded border border-gray-300 text-green-600 focus:ring-green-500 dark:bg-gray-800 dark:ring-offset-gray-800 dark:focus:ring-green-600">

              @if ($item->product->image && file_exists(public_path('storage/img/product/' . $item->product->image)))
                <img src="{{ asset('storage/img/product/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                  class="mr-4 size-20 rounded-md object-cover">
              @else
                <div class="mr-4 flex size-20 items-center justify-center rounded-md bg-gray-100 dark:bg-gray-700">
                  <svg class="size-7 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                  </svg>
                </div>
              @endif
              <div>
                <h3 class="font-semibold text-gray-800 dark:text-gray-100">{{ $item->product->name }}</h3>
                <p class="text-gray-600 dark:text-gray-400">Rp {{ number_format($item->product->price, 0, ',', '.') }}
                </p>
              </div>
            </div>

            <div class="flex items-center gap-4">
              <input type="number" wire:model="quantities.{{ $item->id }}"
                wire:change="updateQuantity({{ $item->id }})" min="1"
                class="w-16 rounded border border-gray-300 p-1.5 text-center text-gray-800 focus:border-green-500 focus:ring-green-500 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-green-600 dark:focus:ring-green-600">

              <button wire:click="removeItem({{ $item->id }})"
                class="cursor-pointer text-red-500 hover:text-red-700 dark:text-red-600 dark:hover:text-red-400">
                Hapus
              </button>
            </div>
          </div>
        @endforeach
        <div class="flex p-4">
          <button wire:click="clearCart"
            class="cursor-pointer rounded-lg bg-red-500 px-4 py-2 text-white hover:bg-red-600">
            Kosongkan Keranjang
          </button>
        </div>
      </div>

      <!-- Ringkasan Belanja -->
      <div class="w-full lg:w-1/3">
        <div class="rounded-lg bg-white p-6 shadow-md dark:bg-gray-800">
          <h2 class="mb-4 text-xl font-bold text-gray-800 dark:text-gray-100">Ringkasan Belanja</h2>
          <div class="mb-2 flex justify-between">
            <span class="text-gray-600 dark:text-gray-400">Item Dipilih</span>
            <span class="text-gray-600 dark:text-gray-400">{{ $selectedCount }} produk</span>
          </div>
          <div class="flex justify-between text-lg font-bold">
            <span class="text-gray-600 dark:text-gray-400">Total</span>
            <span class="text-gray-600 dark:text-gray-400">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
          </div>
          <button wire:click="$dispatch('openModal', 'checkout')" @if ($selectedCount === 0) disabled @endif
            class="mt-6 block w-full rounded-lg bg-green-600 py-3 text-center font-bold text-white transition hover:bg-green-700 disabled:cursor-not-allowed disabled:bg-gray-400 dark:bg-green-600 dark:hover:bg-green-500">
            Lanjut ke Checkout ({{ $selectedCount }})
          </button>
        </div>
      </div>
    </div>
  @else
    <div class="rounded-xl bg-white py-16 text-center shadow-md dark:bg-gray-800">
      <p class="text-xl text-gray-500 dark:text-gray-400">Keranjang Anda kosong.</p>
      <a href="{{ route('product') }}" wire:navigate
        class="mt-4 inline-block rounded-lg bg-green-600 px-6 py-2 font-bold text-white hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-500">
        Mulai Belanja
      </a>
    </div>
  @endif
</div>
