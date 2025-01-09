<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--<x-welcome />--}}
                <div class="flex flex-col gap-2">
                    <button class="">
                        <a href="{{route('getposts')}}" class="font-merriweather">View All Posts</a>
                    </button>
                    <button>
                        <div x-data="{ open:false }">
                            <button @click="open = ! open">
                                <a href="{{route('showcreateform')}}" class="text-lg font-semibold text-gray-700">Create New Post</a>
                            </button>

                            <div x-show="open">
                                @livewire('create-post-form')
                            </div>
                        </div>
                    </button>
                </div>

            </div>
        </div>

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


</x-app-layout>