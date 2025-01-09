<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post - {{ $post->title }}</title>
</head>

<body>
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-semibold text-gray-800">Edit Post</h1>

        <div x-data="{ open: false }">
            <button @click="open = !open" class="text-lg font-semibold text-gray-700 mt-6">
                Edit Post
            </button>

            <!-- Livewire Form (Toggled on button click) -->
            <div x-show="open" x-transition>
                @livewire('edit-post-form', ['postId' => $post->id])
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('getposts') }}" class="text-blue-500 hover:underline">Go Back to All Posts</a>
        </div>
    </div>
</body>

</html>
