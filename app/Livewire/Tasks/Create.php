<?php

namespace App\Livewire\Tasks;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Mary\Traits\Toast;
use Livewire\Component;

use App\Models\Task;

class Create extends Component
{

    use Toast;
    
    #[Validate('required', message: 'The title is required')]
    #[Validate('min:3', message: 'title needs at least 3 characters')]
    public string $title = '';

    #[Validate('required', message: 'The descrition is required')]
    #[Validate('min:3', message: 'description needs at least 3 characters')]
    public string $description = '';

    public $categories = [];
    public string $priority = '';
    public string $due_date = '';
    public string $message = '';
    public string $category_id = '';


    public function mount() {

        $this->categories = Category::all()->toArray();

        $this->due_date = date('Y-m-d');
    }

    public function save() {
   
        $this->validate();
        
        try {           
            $task = Task::create([
                'title' => $this->title,
                'description' => $this->description,
                'priority' => $this->priority,
                'due_date' => $this->due_date,
                'category_id' => $this->category_id
            ]);
            
            // Toast
            $this->success('Task created successfully');
        }
        catch (\Exception $e) {
            // $this->error('Error creating task.');
        }

        return $this->redirect('/tasks/create');
    }

    function clear() {
        // $this->reset();
        return $this->redirect('/tasks/create');
    }

    public function render()
    {
        return view('livewire.tasks.create');
    }
}
