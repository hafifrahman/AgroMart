<div>
  <h2 class="mb-6 text-center text-xl font-bold text-gray-700 dark:text-gray-200">Daftar Akun Baru</h2>

  <form wire:submit.prevent="store">
    <div class="mb-4">
      <label class="mb-2 block text-gray-700 dark:text-gray-300" for="name">Nama Lengkap</label>
      <x-input type="text" id="name" wire:model.blur="name" autofocus required />
      @error('name')
        <span class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label class="mb-2 block text-gray-700 dark:text-gray-300" for="email">Email</label>
      <x-input type="email" id="email" wire:model.blur="email" required />
      @error('email')
        <span class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-6">
      <label class="mb-2 block text-gray-700 dark:text-gray-300" for="password">Password</label>
      <x-input type="password" id="password" wire:model.blur="password" required />
      @error('password')
        <span class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
      @enderror
    </div>

    <button
      class="w-full cursor-pointer rounded-lg bg-green-600 py-2 text-white transition hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600"
      type="submit">
      Register
    </button>
  </form>

  <p class="mt-4 text-center text-gray-600 dark:text-gray-400">
    Sudah punya akun? <a href="login" wire:navigate class="text-green-600 hover:underline dark:text-green-500">Login
      di sini</a>
  </p>
</div>
