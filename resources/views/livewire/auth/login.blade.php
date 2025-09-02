<div>
  <h2 class="mb-6 text-center text-xl font-bold text-gray-700 dark:text-gray-200">Login untuk Melanjutkan</h2>

  @error('login')
    <div class="relative mb-4 rounded-lg border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
      <span class="block sm:inline">{{ $message }}</span>
    </div>
  @enderror

  <form wire:submit.prevent="store">
    <div class="mb-4">
      <label
        class="{{ $errors->has('email') ? 'text-red-600 dark:text-red-400' : 'text-gray-700 dark:text-gray-300' }} mb-2 block"
        for="email">Email</label>
      <input
        class="{{ $errors->has('email') ? 'border-red-400 dark:border-red-500' : 'focus:ring-green-500 focus:ring-2 dark:ring-green-400 dark:border dark:border-gray-400' }} w-full rounded-lg border px-3 py-2 focus:outline-none dark:text-gray-50"
        type="email" id="email" wire:model.blur="email" autofocus required />
      @error('email')
        <span class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-6">
      <label
        class="{{ $errors->has('password') ? 'text-red-600 dark:text-red-400' : 'text-gray-700 dark:text-gray-300' }} mb-2 block"
        for="password">
        Kata Sandi
      </label>
      <input
        class="{{ $errors->has('password') ? 'border-red-400 dark:border-red-500' : 'focus:ring-green-500 focus:ring-2 dark:ring-green-400 dark:border dark:border-gray-400' }} w-full rounded-lg border px-3 py-2 focus:outline-none dark:text-gray-50"
        type="password" id="password" wire:model.blur="password" required />
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
