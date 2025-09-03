@php
  $baseClass =
      'w-full rounded-lg border bg-gray-50 p-3 text-sm shadow-sm transition duration-150 ease-in-out focus:outline-none focus:ring-2 dark:bg-gray-700 dark:text-gray-300 dark:placeholder-gray-400';

  $errorClass = $errors->has($attributes->get('id'))
      ? 'border-red-500 focus:ring-red-300 dark:border-red-400 dark:focus:border-red-400 dark:focus:ring-red-500/50'
      : 'border-gray-300 focus:border-green-500 focus:ring-green-300 dark:border-gray-600 dark:focus:ring-green-500/50';
@endphp

<input {!! $attributes->merge([
    'class' => $baseClass . ' ' . $errorClass,
]) !!} />
