<x-main-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot:header>

    <div class="py-6">

<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">{{ __('Posts') }}</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        @can('write posts')
            <a href="{{ route('posts.create')}}" class="btn btn-default inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                Add user
            </a>
        @endcan
        </div>
    </div>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">

                <tr>
                    <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6">Id</th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Title</th>                    
                    <th scope="col" class="relative py-3 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <x-card>
                        @forelse ($posts as $post)
                        <x-post-card :post="$post" />
                        @empty
                        <tr>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                No Posts
                            </td>
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

    </div>
</x-main-layout>