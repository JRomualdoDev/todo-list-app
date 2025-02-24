<div>
    <!-- HEADER -->
    <x-header title="Category" separator progress-indicator>
        <x-slot:middle class="!justify-end">
        </x-slot:middle>
        <x-slot:actions>
            <x-input icon="o-bolt" placeholder="Search Name..." wire:model.change="search" />
        </x-slot:actions>
    </x-header>

    <x-modal wire:model="myModal2" title="Edit Category" subtitle="">
        <x-form wire:submit="save" no-separator>
            <x-input label="Name" wire:model="name" placeholder="{{ $myid }}" />
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.myModal2 = false" />
                <x-button label="save" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>

    </x-modal>

    {{-- You can use any `$wire.METHOD` on `@row-click` --}}
    <x-table :headers="$headers" :rows="$categories" with-pagination striped {{-- @row-click="$wire.openModal($event.detail.id)" --}} :sort-by="$sortBy">
        @scope('actions', $categories)
            <div class="flex">
                <x-button icon="o-pencil-square" wire:click="openModal({{ $categories['id'] }})" spinner
                    class="btn-ghost btn-sm text-green-500" />
                <x-button icon="o-trash" wire:click="delete({{ $categories['id'] }})" spinner
                    class="btn-ghost btn-sm text-red-500" />
            </div>
        @endscope
    </x-table>

</div>
