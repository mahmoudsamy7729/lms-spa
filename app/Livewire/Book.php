<?php

namespace App\Livewire;

use App\Models\Author;
use App\Models\Book as BookModel;
use App\Models\Category;
use App\Models\Publisher;
use Livewire\Component;
use Livewire\WithPagination;

class Book extends Component
{
    public $search; 

    public $categories;
    public $publishers;
    public $authors;

    public $category_id;
    public $author_id;
    public $publisher_id;
    public $book_name;

    public function render()
    {
        $this->publishers = Publisher::orderBy('id', 'DESC')->get();
        $this->categories = Category::orderBy('id', 'DESC')->get();
        $this->authors = Author::orderBy('id', 'DESC')->get();
        $searchItem = '%' . $this->search . '%';
        $books = BookModel::orderBy('id', 'DESC')->where('book_name', 'LIKE', $searchItem)->paginate(8);
        return view('livewire.book',compact('books'))->layout('components.layouts.default');
    }

    public function store()
    {
        $data = $this->validate([
            'category_id' => ['required'],
            'publisher_id' => ['required'],
            'author_id' => ['required'],
            'book_name' => ['required'],
        ]);
        $result = BookModel::create($data);
        if ($result) {
            session()->flash('success', 'Book Add Successfully');
            $this->category_id = "";
            $this->author_id = "";
            $this->publisher_id = "";
            $this->book_name = "";
            $this->search = "";
        } else {
            session()->flash('error', 'Author Not Add Successfully');
        }
    }
}