<div>
    <!-- HEADER -->
    <x-header title="Tasks" separator progress-indicator>
        <x-slot:middle class="!justify-end">
        </x-slot:middle>
        <x-slot:actions>
            <x-input icon="o-bolt" placeholder="Search Title..." wire:model.change="search" />
        </x-slot:actions>
    </x-header>

    <x-modal wire:model="myModalTask" title="Edit Category" subtitle="">
        <x-form wire:submit="save" no-separator>
            <x-input label="Title" wire:model="title" placeholder="{{ $title }}" />
            <x-input label="Description" wire:model="description" placeholder="{{ $description }}" />
            <x-input label="Priority" wire:model="priority" placeholder="{{ $priority }}" />
            {{-- <x-input label="Due Date" wire:model="due_date" placeholder="{{ $due_date }}" /> --}}
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.myModalTask = false" />
                <x-button label="save" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>

    </x-modal>

    {{-- You can use any `$wire.METHOD` on `@row-click` --}}
    <x-table :headers="$headers" :rows="$tasks" with-pagination striped {{-- @row-click="$wire.openModal($event.detail.id)" --}} :sort-by="$sortBy">

        @scope('actions', $tasks)
            <div class="flex">
                <x-button icon="o-pencil-square" wire:click="openModal({{ $tasks['id'] }})" spinner
                    class="btn-ghost btn-sm text-green-500" />
                <x-button icon="o-trash" wire:click="delete({{ $tasks['id'] }})" spinner
                    class="btn-ghost btn-sm text-red-500" />
            </div>
        @endscope
    </x-table>

</div>
