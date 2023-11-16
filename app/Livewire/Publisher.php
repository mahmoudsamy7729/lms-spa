<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Publisher as PublisherModel;
use Livewire\WithPagination;



class Publisher extends Component
{
    public $publisher_name; 
    public $search;  

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $searchItem = '%' . $this->search . '%';
        $publishers = PublisherModel::orderBy('id', 'DESC')->where('publisher_name', 'LIKE', $searchItem)->paginate(8);
        return view('livewire.publisher',compact('publishers'))->layout('components.layouts.default');
    }

    public function store()
    {
        $data = $this->validate([
            'publisher_name' => ['required', 'string', 'unique:publishers']
        ]);
        $result = PublisherModel::create($data);
        if ($result) {
            session()->flash('success', 'Publisher Add Successfully');
            $this->publisher_name = '';
        } else {
            session()->flash('error', 'Publisher Not Add Successfully');
        }
    }
}
