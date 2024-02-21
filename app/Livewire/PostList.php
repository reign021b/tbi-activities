<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';

    #[Url()]
    public $category = '';

    #[Url()]
    public $year = '';

    #[Url()]
    public $selectedDate = '';

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function updateYear($year)
    {
        $this->year = $year;
        $this->selectedDate = ''; // Clear the selected date
        $this->posts = $this->posts(); // Manually update the posts data
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->category = '';
        $this->year = '';
        $this->resetPage();
    }

    #[Computed()]
    public function posts()
    {
        return Post::published()
            ->orderBy('published_at', $this->sort)
            ->when($this->activeCategory, function ($query) {
                $query->withCategory($this->category);
            })
            ->where('title', 'ilike', "%{$this->search}%")
            ->when($this->year, function ($query) { // Filter posts by year
                $query->whereYear('published_at', $this->year);
            })
            ->when($this->selectedDate, function ($query) { // Filter posts by selected date
                $query->whereDate('published_at', $this->selectedDate);
            })
            ->paginate(3);
    }

    public function updatePostsList()
    {
        $this->posts = $this->posts(); // Manually update the posts data
        $this->resetPage();
    }

    protected $listeners = ['refreshPostsList' => 'render'];
    public function updatedSelectedDate($value)
    {
        $this->selectedDate = $value;
        $this->date = ''; // Set the year property to an empty string
        $this->year = '';
        $this->posts = $this->posts(); // Manually update the posts data
        $this->resetPage();
        $this->dispatch('refreshPostsList'); // Dispatch the event
    }

    public function clearYearDropdown()
    {
        $this->year = ''; // Set the year property to an empty string
        $this->posts = $this->posts(); // Manually update the posts data
        $this->resetPage();
        $this->dispatch('refreshPostsList'); // Dispatch the event

        // Dispatch a custom browser event
        $this->dispatch('clear-year-dropdown');
    }


    #[Computed()]
    public function activeCategory()
    {
        return Category::where('slug', $this->category)->first();
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
