<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Mary\Traits\Toast;

class Create extends Component
{

    use Toast;

    #[Validate('required', message: 'The name is required')]
    #[Validate('min:3', message: 'Name needs at least 3 characters')]
    public string $name = '';

    public function save() {
  
        $this->validate();

        try {
            $category = Category::create([
                'name' => $this->name,
            ]);
        }
        catch (\Exception $e) {
            $this->error('Error creating category.');
        }

        $this->reset('name');

        $this->success('Category created successfully');
    }

    public function render()
    {
        return view('livewire.category.create');
    }
}
