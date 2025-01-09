<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-4">Edit Post</h1>

    <form wire:submit.prevent="updatepost" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="mb-4">
            <label for="title" class="text-lg font-semibold text-gray-700">Title</label>
            <input type="text" wire:model="title" class="mt-2 p-3 border border-gray-300 rounded-md" required>
            @error('title') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="text-lg font-semibold text-gray-700">Content</label>
            <textarea wire:model="content" class="mt-2 p-3 border border-gray-300 rounded-md" required></textarea>
            @error('content') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="text-lg font-semibold text-gray-700">Post Image</label>
            <input type="file" wire:model="image" class="mt-2 p-3 border border-gray-300 rounded-md">
            @error('image') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

            @if($this->image)
                <div class="mt-4">
                    <img src="{{ asset('storage/' . $this->image) }}" alt="{{ $this->title }}" class="w-24 rounded-md">
                </div>
            @endif
        </div>

        <button type="submit" class="p-3 bg-blue-500 text-white font-semibold rounded-md">Update Post</button>
    </form>
</div>
