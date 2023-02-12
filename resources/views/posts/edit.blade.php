<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit post') }}
        </h2>
    </x-slot:header>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
    <form method="POST" 
      action="{{ route('posts.update', $post->id)}}" class="space-y-8 divide-y divide-gray-200"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="space-y-6 sm:space-y-5">
          <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Title</label>
            <div class="mt-1 sm:col-span-2 sm:mt-0">
              <input type="text" name="title" id="title" autocomplete="given-name" value="{{ old('title', $post->title)}}" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
            @error('title')
                <span class="text-red-400 text-sm">{{ $message }}</span>

            @enderror
            </div>

            <label for="body" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Body</label>
            <div class="mt-1 sm:col-span-2 sm:mt-0">
              <textarea name="body" id="body" cols="10" rows="3" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                {{ old('body', $post->body)}}
              </textarea>
             @error('body')
                <span class="text-red-400 text-sm">{{ $message }}</span>

            @enderror
            </div>

            <label for="image" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Image</label>
            <div class="mt-1 sm:col-span-2 sm:mt-0">
              <input type="file" name="image" id="image" autocomplete="given-name" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
            @error('image')
                <span class="text-red-400 text-sm">{{ $message }}</span>

            @enderror
            </div>
            
            <label for="is_published" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Published</label>
                <div class="mt-1 sm:col-span-2 sm:mt-0">
                    <input type="checkbox" id="is_published" name="is_published" 
                      value="is_published" @checked(old('is_published', $post->is_published)) 
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"/>
                    @error('is_published')
                        <span class="text-red-400 text-sm">{{ $message }}</span>

                    @enderror
                </div>

          </div>

        </div>

        <div class="pt-5">
          <div class="flex justify-end">
            <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
            <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
          </div>
        </div>
    </form> 
    </div>
</x-app-layout>