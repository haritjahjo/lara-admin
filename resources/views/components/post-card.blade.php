<div>
    <tr>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $post->id }}</td>
        <x-post-title :title="$post->title" />
        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
        @can('edit posts')
            <a href="{{ route('posts.edit', $post->id)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
        @endcan
        @can('publish posts')
            <a href="#" class="text-indigo-600 hover:text-indigo-900">Publish</a>
        @endcan
        
        </td>
    </tr>    
</div>
