<?php

namespace App\Livewire;

use App\Models\Author as AuthorModel;
use Livewire\Component;
use Livewire\WithPagination;


class Author extends Component
{
    public $author_name; 
    public $search; 
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $searchItem = '%' . $this->search . '%';
        $authors = AuthorModel::orderBy('id', 'DESC')->where('author_name', 'LIKE', $searchItem)->paginate(8);
        return view('livewire.author',compact('authors'))->layout('components.layouts.default');
    }

    public function store()
    {
        $data = $this->validate([
            'author_name' => ['required', 'string', 'unique:authors']
        ]);
        $result = AuthorModel::create($data);
        if ($result) {
            session()->flash('success', 'Author Add Successfully');
            $this->author_name = '';
        } else {
            session()->flash('error', 'Author Not Add Successfully');
        }
    }
}
