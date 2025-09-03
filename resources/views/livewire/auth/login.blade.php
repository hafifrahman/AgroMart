<div>
  <h2 class="mb-6 text-center text-xl font-bold text-gray-700 dark:text-gray-200">Login untuk Melanjutkan</h2>

  @error('login')
    <div class="relative mb-4 rounded-lg border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
      <span class="block sm:inline">{{ $message }}</span>
    </div>
  @enderror

  <form wire:submit.prevent="store">
    <div class="mb-4">
      <label class="mb-2 block text-gray-700 dark:text-gray-300" for="email">Email</label>
      <x-input type="email" id="email" wire:model.blur="email" required autofocus />
      @error('email')
        <span class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-6">
      <label class="mb-2 block text-gray-700 dark:text-gray-300" for="password">
        Kata Sandi
      </label>
      <x-input type="password" id="password" wire:model.blur="password" required />
      @error('password')
        <span class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
      @enderror
    </div>

    <button wire:loading.class="opacity-50" wire:target="store"
      class="w-full cursor-pointer rounded-lg bg-green-600 py-2 text-white transition hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600"
      type="submit">
      Login<span wire:loading wire:target="store">...</span>
    </button>
  </form>

  <p class="mt-4 text-center text-gray-600 dark:text-gray-400">
    Belum punya akun? <a href="register" wire:navigate class="text-green-600 hover:underline dark:text-green-500">Daftar
      di sini</a>
  </p>
</div>
