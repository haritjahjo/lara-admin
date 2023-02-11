<x-main-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create new post') }}
        </h2>
    </x-slot:header>
    

<div class="px-4 sm:px-6 lg:px-8">
  <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
  <div class="mt-1">
    <input type="text" name="title" id="title" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Title" aria-describedby="title-description">
  </div>
  <p class="mt-2 text-sm text-gray-500" id="title-description">We'll only use this for spam.</p>
</div>

</x-main-layout>