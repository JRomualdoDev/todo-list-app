<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Mary\Traits\Toast;
use Illuminate\Support\Collection;

class Show extends Component
{

    use WithPagination;
    use Toast;
    

    #[Validate('required', message: 'The name is required')]
    #[Validate('min:3', message: 'Name needs at least 3 characters')]
    public string $name = '';

    public array $headers = [
        ['key' => 'id', 'label' => 'ID', 'class' => 'w-16'], 
        ['key' => 'name', 'label' => 'Name', 'class' => 'w-16'], 
        ['key' => 'created_at', 'label' => 'Created At', 'class' => 'w-16'], 
        ['key' => 'updated_at', 'label' => 'Updated At', 'class' => 'w-16']
    ];


    public string $search = '';

    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];
    public bool $myModal2 = false;
    public string $myid = "1";


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
        $query = Category::query();
        
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        
        $query->orderBy($this->sortBy['column'], $this->sortBy['direction']);
        
        return $query->paginate(5);
    }

    public function save() {
        $this->validate();

        try {
           Category::find($this->myid)->update([
               'name' => $this->name
           ]);
        } catch (\Throwable $th) {
            $this->error('Error updating category.');
        } 

        $this->myModal2 = false;      
    }

    public function openModal($id)
    {
        $category = Category::find($id);
        if ($category) {
            $this->myid = $category->id;
            $this->name = $category->name; 
        }
        $this->myModal2 = true;
    }

    public function delete($id): void
    {
        
        try {
            Category::find($id)->delete();
        } catch (\Throwable $th) {
            $this->error('Error deleting category.');
        }
        // $this->warning("Will delete #$id", 'It is fake.', position: 'toast-bottom');
    }

    public function render()
    {
        return view('livewire.category.show', [
            'categories' => $this->categories()
        ]);
    }
}
