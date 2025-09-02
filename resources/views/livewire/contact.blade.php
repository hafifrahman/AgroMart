<div class="py-16">
  <div class="container mx-auto px-6">
    <div class="mx-auto mb-12 max-w-4xl text-center">
      <h1 class="mb-4 text-4xl font-bold text-gray-800 dark:text-gray-200">Hubungi Kami</h1>
      <p class="text-lg text-gray-600 dark:text-gray-400">
        Kami siap mendengar dari Anda. Baik itu pertanyaan, masukan, atau sekadar ingin menyapa.
      </p>
    </div>
    <div class="grid gap-10 md:grid-cols-2">
      <div class="rounded-lg bg-white p-8 shadow-lg dark:bg-gray-800">
        <h2 class="mb-6 text-2xl font-bold text-gray-800 dark:text-gray-200">Informasi Kontak</h2>
        <div class="space-y-4 text-gray-700 dark:text-gray-400">
          <p><strong>Alamat:</strong><br />Jl. Ahmad Yani Km. 6, Banjarmasin, Kalimantan Selatan, Indonesia</p>
          <p><strong>Telepon:</strong><br />(0511) 123-4567</p>
          <p><strong>Email:</strong><br />dukungan@agromart.com</p>
          <p><strong>Jam Operasional:</strong><br />Senin - Jumat, 08:00 - 17:00 WITA</p>
        </div>
      </div>
      <div class="rounded-lg bg-white p-8 shadow-lg dark:bg-gray-800">
        <h2 class="mb-6 text-2xl font-bold text-gray-800 dark:text-gray-200">Kirim Pesan</h2>
        <form>
          <div class="mb-4">
            <label for="contact-name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nama</label>
            <input type="text" id="contact-name" autofocus wire:model="name"
              class="mt-1 block w-full rounded-md border border-gray-300 p-2 shadow-sm focus:border-green-500 focus:ring-green-500 dark:border-gray-500 dark:text-gray-50">
          </div>
          <div class="mb-4">
            <label for="contact-email" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Email</label>
            <input type="email" id="contact-email" wire:model="email"
              class="mt-1 block w-full rounded-md border border-gray-300 p-2 shadow-sm focus:border-green-500 focus:ring-green-500 dark:border-gray-500 dark:text-gray-50">
          </div>
          <div class="mb-4">
            <label for="contact-message"
              class="block text-sm font-medium text-gray-700 dark:text-gray-400">Pesan</label>
            <textarea id="contact-message" rows="4" wire:model="message"
              class="mt-1 block w-full rounded-md border border-gray-300 p-2 shadow-sm focus:border-green-500 focus:ring-green-500 dark:border-gray-500 dark:text-gray-50"></textarea>
          </div>
          <button type="submit"
            class="w-full rounded-lg bg-green-600 py-2 text-white transition hover:bg-green-700">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>
