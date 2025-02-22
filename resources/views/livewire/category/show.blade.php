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


    {{-- You can use any `$wire.METHOD` on `@row-click` --}}
    <x-table :headers="$headers" :rows="$categories" with-pagination striped @row-click="alert($event.detail.name)"
        :sort-by="$sortBy" />

</div>
