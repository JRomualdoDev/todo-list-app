<?php

namespace App\Livewire\Tasks;

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
    public string $priority = '';
    public string $due_date = '';
    // public string $message = '';


    public function mount() {
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
                'category_id' => 1
            ]);
            
        }
        catch (\Exception $e) {
            $this->error($e->getMessage());
        }

        // Toast
        $this->success('Task created successfully');

    }

    public function render()
    {
        // Toast
        $this->success('We are done, check it out');
        return view('livewire.tasks.create');
    }
}
