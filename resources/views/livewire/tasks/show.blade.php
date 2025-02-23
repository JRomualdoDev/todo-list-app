<div>
    <!-- HEADER -->
    <x-header title="Tasks" separator progress-indicator>
        <x-slot:middle class="!justify-end">
        </x-slot:middle>
        <x-slot:actions>
            <x-input icon="o-bolt" placeholder="Search..." wire:model.change="search" />
        </x-slot:actions>
    </x-header>

    {{-- <x-modal wire:model="myModal2" title="Edit Category" subtitle="">
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

    </x-modal> --}}

    {{-- You can use any `$wire.METHOD` on `@row-click` --}}
    <x-table :headers="$headers" :rows="$tasks" with-pagination striped @row-click="$wire.openModal($event.detail.id)"
        :sort-by="$sortBy" />

</div>
