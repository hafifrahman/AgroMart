<div class="container mx-auto px-4 py-10 sm:px-6 lg:px-8">
  <h1 class="mb-6 text-3xl font-bold text-gray-800 dark:text-gray-100">Checkout</h1>

  <div
    class="mx-auto max-w-2xl rounded-xl border border-gray-200 bg-white p-8 shadow-md dark:border-gray-700 dark:bg-gray-800">
    <form method="POST" action="checkout.php">
      <div class="grid grid-cols-1 gap-6">
        <div>
          <h3 class="mb-4 text-lg font-medium text-gray-800 dark:text-gray-100">Data Pembeli</h3>
          <div class="mb-4">
            <label for="name" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
              Lengkap</label>
            <input type="text" id="name" name="name" required autofocus
              class="w-full rounded-lg border-gray-300 bg-gray-50 p-3 text-sm text-gray-700 shadow-sm transition duration-150 ease-in-out focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:placeholder-gray-400 dark:focus:border-green-500 dark:focus:ring-green-500/50"
              value="{{ Auth::user()->name ?? '' }}">
          </div>

          <div class="mb-4">
            <label for="address" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat
              Lengkap</label>
            <textarea id="address" name="address" rows="3" required
              class="w-full rounded-lg border-gray-300 bg-gray-50 p-3 text-sm text-gray-700 shadow-sm transition duration-150 ease-in-out focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:placeholder-gray-400 dark:focus:border-green-500 dark:focus:ring-green-500/50">{{ Auth::user()->address ?? '' }}</textarea>
          </div>

          <div>
            <label for="phone" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor
              HP</label>
            <input type="tel" id="phone" name="phone" required
              class="w-full rounded-lg border-gray-300 bg-gray-50 p-3 text-sm text-gray-700 shadow-sm transition duration-150 ease-in-out focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:placeholder-gray-400 dark:focus:border-green-500 dark:focus:ring-green-500/50"
              value="{{ Auth::user()->phone ?? '' }}">
          </div>
        </div>

        <div class="border-t border-gray-200 pt-4 dark:border-gray-700">
          <h3 class="mb-4 text-lg font-medium text-gray-800 dark:text-gray-100">Ringkasan Pesanan</h3>

          <div class="mb-3 flex justify-between">
            <span class="text-gray-600 dark:text-gray-400">Subtotal</span>
            <span class="font-medium text-gray-800 dark:text-gray-100">Rp 250.000</span>
          </div>

          <div class="mb-3 flex justify-between">
            <span class="text-gray-600 dark:text-gray-400">Ongkos Kirim</span>
            <span class="font-medium text-gray-800 dark:text-gray-100">Rp 15.000</span>
          </div>

          <div class="mb-3 flex justify-between">
            <span class="text-gray-600 dark:text-gray-400">Pajak</span>
            <span class="font-medium text-gray-800 dark:text-gray-100">Rp 5.000</span>
          </div>

          <div class="mt-4 flex justify-between border-t border-gray-200 pt-4 text-lg font-bold dark:border-gray-700">
            <span class="text-gray-800 dark:text-gray-100">Total</span>
            <span class="text-gray-800 dark:text-gray-100">Rp 270.000</span>
          </div>
        </div>

        <div class="border-t border-gray-200 pt-4 dark:border-gray-700">
          <h3 class="mb-4 text-lg font-medium text-gray-800 dark:text-gray-100">Metode Pembayaran</h3>
          <div class="space-y-3">
            <label
              class="flex cursor-pointer items-center rounded-lg border border-gray-200 p-3 hover:border-green-400 dark:border-gray-700 dark:hover:border-green-500">
              <input type="radio" name="payment" value="cod"
                class="h-4 w-4 border-gray-300 text-green-600 focus:ring-green-500 dark:border-gray-600 dark:bg-gray-700 dark:checked:bg-green-600"
                checked>
              <div class="ml-3">
                <span class="block text-sm font-medium text-gray-800 dark:text-gray-100">Cash on Delivery
                  (COD)</span>
                <span class="block text-xs text-gray-500 dark:text-gray-400">Bayar ketika pesanan diterima</span>
              </div>
            </label>

            <label
              class="flex cursor-pointer items-center rounded-lg border border-gray-200 p-3 hover:border-green-400 dark:border-gray-700 dark:hover:border-green-500">
              <input type="radio" name="payment" value="transfer"
                class="h-4 w-4 border-gray-300 text-green-600 focus:ring-green-500 dark:border-gray-600 dark:bg-gray-700 dark:checked:bg-green-600">
              <div class="ml-3">
                <span class="block text-sm font-medium text-gray-800 dark:text-gray-100">Transfer Bank</span>
                <span class="block text-xs text-gray-500 dark:text-gray-400">Transfer melalui bank BCA, BRI, atau
                  Mandiri</span>
              </div>
            </label>
          </div>
        </div>
      </div>

      <div class="mt-8 border-t border-gray-200 pt-6 dark:border-gray-700">
        <button type="submit"
          class="flex w-full cursor-pointer items-center justify-center gap-2 rounded-lg bg-green-600 px-4 py-3 text-center text-sm font-semibold text-white transition-all duration-200 hover:bg-green-700 active:scale-[0.98] dark:bg-green-600 dark:hover:bg-green-500">
          Buat Pesanan
        </button>
      </div>
    </form>
  </div>
</div>
