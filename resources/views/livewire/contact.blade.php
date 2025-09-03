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
        <form wire:submit.prevent="sendMessage">
          <div class="mb-4">
            <label for="name" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">Nama</label>
            <x-input type="text" id="name" autofocus wire:model.blur="name" />
            @error('name')
              <span class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-4">
            <label for="email" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">Email</label>
            <x-input type="email" id="email" wire:model.blur="email" />
            @error('email')
              <span class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-4">
            <label for="message" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">Pesan</label>
            <textarea id="message" rows="4" wire:model.blur="message"
              class="{{ $errors->has('message') ? 'border-red-500 focus:ring-red-300 dark:border-red-400 dark:focus:border-red-400 dark:focus:ring-red-500/50' : 'border-gray-300 focus:border-green-500 focus:ring-green-300 dark:border-gray-600 dark:focus:ring-green-500/50' }} w-full rounded-lg border bg-gray-50 p-3 text-sm shadow-sm transition duration-150 ease-in-out focus:outline-none focus:ring-2 dark:bg-gray-700 dark:text-gray-300 dark:placeholder-gray-400"></textarea>
            @error('message')
              <span class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
          </div>

          <button type="submit" wire:loading.class="opacity-50" wire:target="sendMessage"
            class="w-full cursor-pointer rounded-lg bg-green-600 py-2 text-white transition hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600">
            Kirim Pesan<span wire:loading wire:target="sendMessage">...</span>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('livewire:initialized', function() {
    Livewire.on('message.sent', event => {
      alert(event.message);
    });
  });
</script>
