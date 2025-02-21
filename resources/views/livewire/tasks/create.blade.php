@php
    $config = ['altFormat' => 'Y-m-d'];

    $priorities = [
        ['id' => 'Low', 'name' => 'low'],
        ['id' => 'Medium', 'name' => 'medium'],
        ['id' => 'High', 'name' => 'high'],
    ];

@endphp
<div>
    <!-- HEADER -->
    <x-header title="Create Task" separator progress-indicator>
        <x-slot:middle class="!justify-end">
        </x-slot:middle>
        <x-slot:actions>
            {{-- <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" class="btn-primary" /> --}}
        </x-slot:actions>
    </x-header>

    <x-form wire:submit="save" no-separator>
        <x-input label="Title" wire:model="title" />
        <div>
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <x-input label="Description" wire:model="description" />
        <div>
            @error('description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <x-select label="Priority" :options="$priorities" wire:model="priority" />

        <x-select label="Category" :options="$categories" wire:model="category_id" />

        <x-datepicker label="Due Date" wire:model="due_date" icon="o-calendar-days" :config="$config" />

        <x-slot:actions>
            <x-button label="Clear Fields" icon="o-tag" wire:click="clear" spinner class="btn-ghost" />
            <x-button label="Add Task" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>

</div>
