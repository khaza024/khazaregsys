@props(['activity'])

<div class="col-span-1 img-group mb-7 relative">
    <div class="img-badge overflow-hidden">
        <img src="{{ $activity->getThumbnailUrl() }}" alt="{{ $activity->slug }}"
            class="w-full h-96 object-cover mb-4 border-2 border-solid border-[#404040]">
    </div>
    <div
        class="img-info absolute left-0 bottom-0 right-0 z-30 bg-[rgba(248,113,58,0.8)] p-2.5 opacity-0 transition-all duration-300">
        <h4 class="text-white text-center text-[18px] font-semibold mb-0">
            {{ $activity->title }}
        </h4>
        <div class="mt-2 text-start">
            @foreach ($activity->categories as $category)
                <x-activities.category-activity-badge :category="$category" />
            @endforeach
        </div>
        <a wire:navigate href="{{ route('activities.show', $activity->slug) }}"
            class="absolute right-2.5 text-[15px] top-1/2 transform -translate-y-1/2 text-white transition duration-300 hover:text-[20px] hover:text-[#47b2e4]">
            🔗
        </a>
    </div>
</div>
