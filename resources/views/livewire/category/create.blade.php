<div>

    <!-- HEADER -->
    <x-header title="Category" separator progress-indicator>
        <x-slot:middle class="!justify-end">
        </x-slot:middle>
        <x-slot:actions>
            {{-- <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" class="btn-primary" /> --}}
        </x-slot:actions>
    </x-header>

    <x-form wire:submit="save" no-separator>
        <x-input label="Name" wire:model="name" />
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror

        <x-slot:actions>
            <x-button label="Add Category" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>
</div>
