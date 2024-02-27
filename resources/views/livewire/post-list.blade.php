<!-- This is the main container for your posts. It has padding on all sides. -->
<div class=" px-3 lg:px-7 py-6">

    <!-- This is the header section. It contains filters and sorting options. -->
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="text-gray-700">

            <!-- This button allows the user to clear all active filters. -->
            @if ($this->activeCategory || $search)
                <button class="text-gray-700 font-bold text-lg mr-3" wire:click="clearFilters()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z" clip-rule="evenodd" />
                    </svg>
                </button>
            @endif

            <!-- This section displays the active category filter. -->
            @if ($this->activeCategory)
                All Activities From :
                <x-badge wire:navigate href="{{ route('posts.index', ['category' => $this->activeCategory->slug]) }}"
                         :textColor="$this->activeCategory->text_color" :bgColor="$this->activeCategory->bg_color">
                    {{ $this->activeCategory->title }}
                </x-badge>
            @endif

            <!-- This section displays the active search filter. -->
            @if ($search)
                Containing : {{ $search }}
            @endif
            &nbsp;
            <!-- This dropdown allows the user to filter posts by year. -->
            <select class="rounded-2xl text-center" wire:change="updateYear($event.target.value)" id="yearDropdown">
                <option value="">Select a year</option>
                @for ($year = date('Y'); $year >= 2023; $year--)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>

            <!-- This datepicker allows the user to filter posts by date. -->
            <input class="rounded-2xl" type="date" id="myDate" name="myDate" wire:model="selectedDate" wire:change="clearYearDropdown">
        </div>

        <!-- These buttons allow the user to sort posts by latest or oldest. -->
        <div class="flex items-center space-x-4 font-light ">
            <button class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4"
                    wire:click="setSort('desc')">Latest</button>
            <button class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4 "
                    wire:click="setSort('asc')">Oldest</button>
        </div>
    </div>

    <!-- This is the list of posts. -->
    <div wire:key="postList{{ $year }}" class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item wire:key="{{ $post->id }}" :post="$post" />
        @endforeach
    </div>

    <!-- This is the pagination section. -->
    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
