<x-app-layout>
    <div class="mb-10 w-full">
        <h2 class="mt-16 mb-5 text-3xl text-blue-900 font-bold">Latest Activities</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 w-full">
                @foreach ($latestPosts as $post)
                    <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-blue-950 font-semibold" href="http://127.0.0.1:8000/events">More Activities</a>
    </div>
</x-app-layout>
