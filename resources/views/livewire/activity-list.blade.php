<div class="px-3 py-6 lg:px-7">
    <div class="flex items-center justify-between border-b border-gray-100">
        <div class="text-gray-600">
            @if ($this->activeCategory || $search)
                <button class="mr-3 text-xs gray-500" wire:click="clearFilters()">X</button>
            @endif
            @if ($this->activeCategory)
                <x-khazaregsys.badge wire:navigate href="{{ route('activities.index', ['category' => $this->activeCategory->slug]) }}"
                    :textColor="$this->activeCategory->text_color" :bgColor="$this->activeCategory->bg_color">
                    {{ $this->activeCategory->title }}
                </x-khazaregsys.badge>
            @endif
            @if ($search)
                <span class="ml-2">
                    Cari : <strong>{{ $search }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->activities as $activity)
            <x-activities.item-activity wire:key="{{ $activity->id }}" :activity="$activity" />
        @endforeach
    </div>
    <div class="my-3">
        {{ $this->activities->onEachSide(1)->links() }}
    </div>
</div>