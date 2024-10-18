<div>
    <form wire:submit="create">
        {{ $this->form }}

        <button wire:click="create" type="submit">
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>
