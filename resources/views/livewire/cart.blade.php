<div class="container mx-auto px-4 py-10 sm:px-6 lg:px-8">
  <h1 class="mb-12 text-4xl font-extrabold tracking-tight text-gray-800 dark:text-gray-100">Keranjang Belanja</h1>

  @if ($cartItems && $cartItems->count() > 0)
    <div class="flex flex-col gap-8 lg:flex-row">
      <!-- Daftar Item Keranjang -->
      <div
        class="w-full rounded-xl border border-gray-200 bg-white shadow-sm lg:w-2/3 dark:border-gray-700 dark:bg-gray-800">
        <div class="flex items-center justify-between border-b p-4">
          <div class="flex items-center">
            <input type="checkbox" @if ($selectAll) checked @endif wire:click="toggleSelectAll"
              class="h-5 w-5 rounded border-gray-300 text-green-600 focus:ring-green-500">
            <span class="ml-2 text-sm text-gray-600">Pilih Semua ({{ $selectedCount }}/{{ $cartItems->count() }})</span>
          </div>
        </div>

        @foreach ($cartItems as $item)
          <div class="flex items-center justify-between border-b p-4 last:border-b-0">
            <div class="flex items-center">
              <input type="checkbox" @if (in_array($item->id, $selectedItems)) checked @endif
                wire:click="toggleItem({{ $item->id }})"
                class="mr-3 h-5 w-5 rounded border-gray-300 text-green-600 focus:ring-green-50">

              <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}"
                class="mr-4 h-20 w-20 rounded-md object-cover">
              <div>
                <h3 class="font-semibold text-gray-800">{{ $item->product->name }}</h3>
                <p class="text-gray-600">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
              </div>
            </div>

            <div class="flex items-center gap-4">
              <input type="number" wire:model="quantities.{{ $item->id }}"
                wire:change="updateQuantity({{ $item->id }})" min="1"
                class="w-16 rounded border p-1.5 text-center">

              <button wire:click="removeItem({{ $item->id }})"
                class="cursor-pointer text-red-500 hover:text-red-700">
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
        <div class="rounded-lg bg-white p-6 shadow-md">
          <h2 class="mb-4 text-xl font-bold text-gray-800">Ringkasan Belanja</h2>
          <div class="mb-2 flex justify-between">
            <span>Item Dipilih</span>
            <span>{{ $selectedCount }} produk</span>
          </div>
          <div class="flex justify-between text-lg font-bold">
            <span>Total</span>
            <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
          </div>
          <button wire:click="$dispatch('openModal', 'checkout')" @if ($selectedCount === 0) disabled @endif
            class="mt-6 block w-full rounded-lg bg-green-600 py-3 text-center font-bold text-white transition hover:bg-green-700 disabled:cursor-not-allowed disabled:bg-gray-400">
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
