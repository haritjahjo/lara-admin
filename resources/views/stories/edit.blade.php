<x-app-layout>
<div class="py-6">
  <x-slot:header>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
    <h1 class="text-2xl font-semibold text-gray-900">Update Story</h1>
  </div>
  </x-slot:header>
  <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
<form method="POST" action="{{ route('stories.update', $story->id)}}" class="space-y-8 divide-y divide-gray-200">
  @csrf
  @method('PUT')
      <div class="space-y-6 sm:space-y-5">
        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Title</label>
          <div class="mt-1 sm:col-span-2 sm:mt-0">
            <input type="text" name="title" id="title" value="{{ old('title', $story->title)  }}" autocomplete="given-name" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
            @error('title')
                <span class="text-red-400 text-sm">{{ $message }}</span>

            @enderror
          </div>
        </div>
      </div>

  <div class="pt-5">
    <div class="flex justify-end">
      <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
      <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update</button>
    </div>
  </div>
</form>
  </div>

</x-app-layout>