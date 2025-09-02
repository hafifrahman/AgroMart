<div>
  <h2 class="mb-6 text-center text-xl font-bold text-gray-700">Daftar Akun Baru</h2>

  <form wire:submit.prevent="store">
    <div class="mb-4">
      <label class="{{ $errors->has('name') ? 'text-red-600' : 'text-gray-700' }} mb-2 block" for="name">Nama
        Lengkap</label>
      <input
        class="{{ $errors->has('name') ? 'border-red-400' : 'focus:ring-green-500 focus:ring-2' }} w-full rounded-lg border px-3 py-2 focus:outline-none"
        type="text" id="name" wire:model.blur="name" autofocus required />
      @error('name')
        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label class="{{ $errors->has('email') ? 'text-red-600' : 'text-gray-700' }} mb-2 block"
        for="email">Email</label>
      <input
        class="{{ $errors->has('email') ? 'border-red-400' : 'focus:ring-green-500 focus:ring-2' }} w-full rounded-lg border px-3 py-2 focus:outline-none"
        type="email" id="email" wire:model.blur="email" required />
      @error('email')
        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-6">
      <label class="{{ $errors->has('password') ? 'text-red-600' : 'text-gray-700' }} mb-2 block"
        for="password">Password</label>
      <input
        class="{{ $errors->has('password') ? 'border-red-400' : 'focus:ring-green-500 focus:ring-2' }} w-full rounded-lg border px-3 py-2 focus:outline-none"
        type="password" id="password" wire:model.blur="password" required />
      @error('password')
        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
      @enderror
    </div>

    <button class="w-full cursor-pointer rounded-lg bg-green-600 py-2 text-white transition hover:bg-green-700"
      type="submit">
      Register
    </button>
  </form>

  <p class="mt-4 text-center text-gray-600">
    Sudah punya akun? <a href="login" wire:navigate class="text-green-600 hover:underline">Login di sini</a>
  </p>
</div>
