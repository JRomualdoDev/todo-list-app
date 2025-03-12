<?php

namespace App\Livewire\Tasks;

use App\Models\Category;
use Livewire\Component;
use App\Models\Task;
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
    public string $title = '';

    public string $description = '';
    public string $priority = '';
    public string $due_date = '';
    public bool   $completed = false;
    public string $category_id = '';

    public array $headers = [
        ['key' => 'id', 'label' => 'ID', 'class' => 'w-16'], 
        ['key' => 'title', 'label' => 'Title', 'class' => 'w-16'], 
        ['key' => 'description', 'label' => 'Description', 'class' => 'w-16'],
        ['key' => 'priority', 'label' => 'Priority', 'class' => 'w-16'], 
        ['key' => 'category.name', 'label' => 'Category', 'class' => 'w-16'], 
        ['key' => 'due_date', 'label' => 'Due Date', 'class' => 'w-16'],
        ['key' => 'completed', 'label' => 'Completed', 'class' => 'w-16'] 
    ];

    public string $search = '';

    public array $sortBy = ['column' => 'title', 'direction' => 'asc'];
    public bool $myModalTask = false;
    public string $id = "1";


    public function mount() {

    }

    public function tasks()
    {
        $query = Task::query();
        
        if ($this->search) {
            $query->where('title', 'ilike', '%' . $this->search . '%');
        }
        
        $query->orderBy($this->sortBy['column'], $this->sortBy['direction']);
        
        return $query->paginate(5);
    }

    public function save() {
        $this->validate();

        try {
           Category::find($this->myid)->update([
               'title' => $this->title
           ]);
        } catch (\Throwable $th) {
            $this->error('Error updating category.');
        } 

        $this->myModal2 = false;      
    }

    public function openModal($id)
    {
        $task = Task::find($id);
        if ($task) {
            $this->id = $task->id;
            $this->title = $task->title;
            $this->description = $task->description;
            $this->priority = $task->priority;
            $this->due_date = $task->due_date;
            $this->category_id = $task->category_id; 
        }
        $this->myModalTask = true;
    }

    public function delete($id): void
    {
        try {
            Category::find($id)->delete();
        }
        catch (\Throwable $th) {
            $this->error("Error deleting Task");
        }

        // $this->warning("Will delete #$id", 'It is fake.', position: 'toast-bottom');
    }
    public function render()
    {
        return view('livewire.tasks.show', [
            'tasks' => $this->tasks()
        ]);
    }
}
