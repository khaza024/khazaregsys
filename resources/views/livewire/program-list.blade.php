<div class="px-3 py-6 lg:px-7">
    <div class="flex items-center justify-between border-b border-gray-100">
        <div class="text-gray-600">
            @if ($search)
                <button class="mr-3 text-xs gray-500" wire:click="clearFilters()">X</button>
            @endif
            @if ($search)
                <span class="ml-2">
                    Cari : <strong>{{ $search }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->programs as $program)
            <x-programs.item-program wire:key="{{ $program->id }}" :program="$program" />
        @endforeach
    </div>
    <div class="my-3">
        {{ $this->programs->onEachSide(1)->links() }}
    </div>
</div>
