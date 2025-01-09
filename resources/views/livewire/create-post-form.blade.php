<div class="p-10 rounded-lg m-10">


    <form x-show="open" class="flex flex-col p-6 max-w-lg mx-auto bg-white rounded-lg shadow-md" @click.outside="open = false" enctype="multipart/form-data" action="{{ route('storenewpost') }}" method="POST" id="addcomment">
        @csrf

        <label for="title" class="text-lg font-semibold text-gray-700">Add Title</label>
        <input type="text" name="title" id="title" class="mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" required placeholder="Enter the title">
        @error('title')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror

        <label for="content" class="text-lg font-semibold text-gray-700 mt-4">Add Content</label>
        <input type="text" name="content" id="content" class="mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" required placeholder="Enter the content">
        @error('content')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror

        <label for="image" class="text-lg font-semibold text-gray-700 mt-4">Upload Post Image</label>
        <input type="file" name="image" id="image" class="mt-2 p-2 border border-gray-300 rounded-md text-gray-700 file:border-none file:rounded-md file:bg-blue-500 file:text-white file:px-4 file:py-2 file:hover:bg-blue-600 file:cursor-pointer" required>
        @error('image')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
        <button type="submit" class="mt-6 p-3 bg-blue-500 text-black font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">Save</button>
    </form>


    @if(session('success'))
    <div id="toast" style="display: none; position: fixed; bottom: 20px; right: 20px; background-color: #4CAF50; color: white; padding: 16px; border-radius: 8px; z-index: 1000;">
        {{ session('success') }}
    </div>

    <script>
        var toast = document.getElementById('toast');
        toast.style.display = "block";

        setTimeout(function() {
            toast.style.display = "none";
        }, 3000);
    </script>
    @endif
</div>