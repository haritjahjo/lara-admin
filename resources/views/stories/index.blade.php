<x-app-layout>

<div class="py-6">
  <x-slot:header>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
    <h1 class="text-2xl font-semibold text-gray-900">Stories</h1>
  </div>
  </x-slot:header>
  <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
    <!-- Replace with your content -->
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-xl font-semibold text-gray-900">Stories</h1>
          <p class="mt-2 text-sm text-gray-700">A list of all the stories in your account including their name, title, email and role.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
          <form action="{{ route('stories.create')}}" method="get">
          @csrf
          <button :href="route('stories.create')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
            Add story</button>
          </form>
          

            {{-- <a href="{{ route('stories.create')}}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
            Add story</a> --}}
        </div>
      </div>
      <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
              <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Id</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Image</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                  
                  <x-card class="bg-green-500">
                    @forelse ($stories as $story)
                    <tr>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $story->id }}</td>
                      <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $story->title}}</td>
                      <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                        <img src="{{ asset('/storage/'. $story->image)}}" alt="no-image" class="w-16 h-auto">
                      </td>
                      <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <a href="{{ route('stories.edit', $story->id )}}" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $story->title }}</span></a>
                        <a href="{{ route('stories.show', $story->id )}}" class="text-indigo-600 hover:text-indigo-900">Show</a>
                        <form action="{{ route('stories.destroy', $story->id)}}" method="post" 
                          onsubmit="return confirm('are you sure?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="text-red-400 hover:text-red-600" 
                            >Delete</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                      <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"> No Records</td>
                        <td></td>
                        <td></td>
                      </tr>
                  @endforelse
                  </x-card>
                  
                  
                  

                  <!-- More people... -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /End replace -->
  </div>
</div>









</x-app-layout>