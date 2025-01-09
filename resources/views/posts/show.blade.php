<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
</head>

<body>
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-semibold text-gray-800">{{ $post->title }}</h1>
        <p class="text-gray-600 mt-4">{{ $post->content }}</p>

        @if($post->image)
        <div class="mt-6">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-md shadow-md">
        </div>
        @endif

        <div x-data="{ open: false }">
            <button @click="open = !open" class="text-lg font-semibold text-gray-700 mt-6">
                Edit Post
            </button>

            <div x-show="open">
            @livewire('edit-post-form', ['postId' => $post->id])
            </div>
        </div>

        <form action="{{ route('deletepost', ['id' => $post->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')" class="inline">
            {{csrf_field()}}
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:underline">Delete</button>
        </form>

        <div class="mt-8">
            <a href="{{ route('getposts') }}" class="text-blue-500 hover:underline">Go Back to All Posts</a>
        </div>
    </div>

  
</body>

</html>
