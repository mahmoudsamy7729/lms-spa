<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;

class Dashboard extends Component
{
    public $totalAuthors;
    public $totalBooks;
    public $totalCategories;
    public $totalPublishers;
    public $recentBooks;
    public function render()
    {
        $this->totalAuthors = Author::count();
        $this->totalPublishers = Publisher::count();
        $this->totalCategories = Category::count();
        $this->totalBooks = Book::count();
        $this->recentBooks = Book::orderBy('id', 'DESC')->take(5)->get();
        return view('livewire.dashboard')->layout('components.layouts.default');
    }
}
