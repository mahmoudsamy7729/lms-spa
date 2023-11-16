<?php

namespace App\Livewire;

use App\Models\Category as CategoryModel;
use Livewire\Component;
use Livewire\WithPagination;


class Category extends Component
{
    public $category_name; 
    public $search;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $searchItem = '%' . $this->search . '%';
        $categories = CategoryModel::orderBy('id', 'DESC')->where('category_name', 'LIKE', $searchItem)->paginate(8);
        return view('livewire.category',compact('categories'))->layout('components.layouts.default');
    }

    public function store()
    {
        $data = $this->validate([
            'category_name' => ['required', 'string', 'unique:categories']
        ]);
        $result = CategoryModel::create($data);
        if ($result) {
            session()->flash('success', 'Category Add Successfully');
            $this->category_name = '';
        } else {
            session()->flash('error', 'Category Not Add Successfully');
        }
    }

}
