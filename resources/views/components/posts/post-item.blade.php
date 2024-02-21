@props(['post'])
<article class="[&:not(:last-child)]:border-b border-gray-100 pb-10">
    <!-- This is the main container for each post -->
    <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
        <!-- This is the thumbnail of the post -->
        <div class="article-thumbnail col-span-4 flex items-center">
            <a wire:navigate href="{{ route('posts.show', $post->slug) }}">
                <img class="mw-100 mx-auto rounded-xl" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
            </a>
        </div>
        <!-- This is the main content of the post -->
        <div class="col-span-8">
            <!-- This is the metadata of the post -->
            <div class="article-meta flex py-1 text-sm items-center">
                <x-posts.author :author="$post->author" size="xs" />
                <span class="text-gray-700 text-sm">. {{ $post->published_at->diffForHumans() }} . {{ $post->published_at->format('F d, Y') }} </span>
            </div>
            <!-- This is the title of the post -->
            <h2 class="text-xl font-bold text-gray-900">
                <a wire:navigate href="{{ route('posts.show', $post->slug) }}">
                    {{ $post->title }}
                </a>
            </h2>
            <!-- This is the excerpt of the post -->
            <p class="mt-2 text-base text-gray-700 font-light">
                {{ $post->getExcerpt() }}
            </p>
            <!-- This is the action bar of the post -->
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex gap-x-2">
                    <!-- These are the categories of the post -->
                    @foreach ($post->categories as $category)
                        <x-posts.category-badge :category="$category" />
                    @endforeach
                    <!-- This is the reading time of the post -->
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-500 text-sm">{{ $post->getReadingTime() }} min read</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
