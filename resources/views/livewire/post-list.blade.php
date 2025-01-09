<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-4">All Posts</h1>

    @if($posts->count())
            <div class="space-y-4">
            @foreach($posts as $post)
                <div class="bg-white p-4 rounded-md shadow-md">
                    <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                    <p class="text-gray-700 mt-2">{{ $post->content}}</p>

                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="mt-4 w-full h-48 object-cover rounded-md">
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <a href="{{ route('displaypost', ['id' => $post->id]) }}" class="text-blue-500 hover:underline">View Post</a>

                        <a href="{{ route('showeditform', ['id' => $post->id]) }}" class="text-yellow-500 hover:underline">Edit</a>

                        <form action="{{ route('deletepost', ['id' => $post->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $posts->links() }} 
        </div>
    @else
        <p class="text-gray-500">No posts found.</p>
    @endif
</div>

