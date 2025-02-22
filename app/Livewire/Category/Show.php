<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Show extends Component
{

    use WithPagination;
    
    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];
    // public $categories;


    public function mount() {

        // $this->categories = Category::all()->map(function ($category) {
        //     return [
        //         'id' => $category->id,
        //         'name' => $category->name,
        //         'created_at' => $category->created_at->format('m/d/Y H:i:s'),
        //         'updated_at' => $category->updated_at->format('m/d/Y H:i:s')
        //     ];
        // })->toArray();
        // dd($this->categories);

        // $this->categories = Category::query()
        //     ->orderBy(...array_values($this->sortBy))
        //     ->take(3)
        //     ->get();

    }

     public function categories()
     {
         return Category::query()
             ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
             ->paginate(5);
             
     }

    public function render()
    {
        return view('livewire.category.show', [
            'categories' => $this->categories()
        ]);
    }
}
