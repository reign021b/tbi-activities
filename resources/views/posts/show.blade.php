<x-app-layout :title="$post->title">

    <!-- This is the main article layout -->
    <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3" style="max-width:700px">

        <!-- Displaying the post thumbnail -->
        <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">

        <!-- Displaying the post title -->
        <h1 class="text-4xl font-bold text-left text-gray-800">
            {{ $post->title }}
        </h1>
        <div class="flex items-center justify-between mt-2">
            <div class="flex items-center py-5">

                <!-- Displaying the post author and reading time -->
                <x-posts.author :author="$post->author" size="md" />
                <span class="text-sm text-gray-500">| {{ $post->getReadingTime() }} min read</span>
            </div>
            <div class="flex items-center">

                <!-- Displaying the post publish date -->
                <span class="mr-2 text-gray-500">{{ $post->published_at->diffForHumans() }}</span>
                <span class="mr-2 text-gray-500">.</span>
                <span class="mr-2 text-gray-500">{{ $post->published_at->format('F d, Y') }}</span>

                <!-- Displaying the post publish time -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                     stroke="currentColor" class="w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <!-- Displaying the post body -->
        <div class="py-3 text-lg prose text-justify text-gray-800 article-content">
            {!! $post->body !!}
        </div>

        <!-- Displaying the post categories -->
        <div class="flex items-center mt-10 space-x-4">
            @foreach ($post->categories as $category)
                <x-posts.category-badge :category="$category" />
            @endforeach
        </div>
    </article>
</x-app-layout>
