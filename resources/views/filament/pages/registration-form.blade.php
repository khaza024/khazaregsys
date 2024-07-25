<x-filament::page>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    
        <form wire:submit.prevent="submit">
            {{ $this->form }}
        </form>
    </div>
</x-filament::page>