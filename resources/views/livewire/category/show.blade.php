<?php

$headers = [['key' => 'id', 'label' => 'ID', 'class' => 'w-16'], ['key' => 'name', 'label' => 'Name', 'class' => 'w-16'], ['key' => 'created_at', 'label' => 'Created At', 'class' => 'w-16'], ['key' => 'updated_at', 'label' => 'Updated At', 'class' => 'w-16']];

?>

<div>
    <!-- HEADER -->
    <x-header title="Category" separator progress-indicator>
        <x-slot:middle class="!justify-end">
        </x-slot:middle>
        <x-slot:actions>
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
    <x-table :headers="$headers" :rows="$categories" with-pagination striped @row-click="$wire.openModal($event.detail.id)"
        :sort-by="$sortBy" />



</div>
