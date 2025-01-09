<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-4 font-merriweather">All Posts</h1>

    @if($posts->count())
    <div class="space-y-4">
        @foreach($posts as $post)
        <div class="bg-white p-4 rounded-md shadow-md">
            <h2 class="text-xl font-bold">{{ $post->title }}</h2>
            <p class="text-gray-700 mt-2">{{ $post->content}}</p>


            @if($post->image)
            <div class="w-24">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="mt-4 w-24  rounded-md">

            </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <a href="{{ route('displaypost', ['id' => $post->id]) }}" class="text-blue-500 hover:underline">View Post</a>

   
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-6 w-24">
        {{ $posts->links() }}
    </div>
    @else
    <p class="text-gray-500">No posts found.</p>
    @endif
</div>