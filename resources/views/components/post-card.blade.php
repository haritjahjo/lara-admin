<div>
    <tr>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $post->id }}</td>
        <x-post-title :title="$post->title" />
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $post->is_published }}</td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
            <img src="{{ asset('/storage/' . $post->image)}}" alt="no image" class="w-16 h-auto">
        </td>
        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">

            <a href="{{ route('posts.edit', $post->id)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>

            <form action="{{ route('posts.destroy', $post->id)}}" method="post" 
                          onsubmit="return confirm('are you sure?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="text-red-400 hover:text-red-600" 
                            >Delete</button>
                        </form>
        
        </td>
    </tr>    
</div>
