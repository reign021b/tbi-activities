<!-- This component receives a 'post' prop. -->
@props(['post'])

<!-- The main container for the post. Any additional attributes passed to the component will be added to this div. -->
<div {{ $attributes }}>

    <!-- This is a link to the post's detail page. -->
    <a wire:navigate href="{{ route('posts.show', $post->slug) }}">
        <div>
            <!-- This is the post's thumbnail. -->
            <img class="w-full rounded-xl" src="{{ $post->getThumbnailUrl() }}">
        </div>
    </a>

    <!-- This is the post's details section. -->
    <div class="mt-3">

        <!-- This section displays the post's category and published date. -->
        <div class="flex items-center mb-2 gap-x-2">
            <!-- If the post has a category, it displays a badge with the category's title. -->
            @if ($category = $post->categories->first())
                <x-posts.category-badge :category="$category" />
            @endif
            <!-- This is the post's published date. -->
            <p class="text-sm text-gray-500">{{ $post->published_at->format('F d, Y') }}</p>
        </div>

        <!-- This is a link to the post's detail page with the post's title. -->
        <a wire:navigate href="{{ route('posts.show', $post->slug) }}"
           class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>
</div>
