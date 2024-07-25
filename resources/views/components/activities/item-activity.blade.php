@props(['activity'])

<article {{ $attributes->merge(['class' => '[&:not(:last-child)]:border-b border-gray-100 pb-10']) }}>
    <div class="grid items-start grid-cols-12 gap-3 mt-5 article-body">
        <div class="flex items-center col-span-4 article-thumbnail">
            <a wire:navigate href="{{ route('activities.show', $activity->slug) }}">
                <img class="mx-auto mw-100 rounded-xl" src="{{ $activity->getThumbnailUrl() }}" alt="{{ $activity->slug }}">
            </a>
        </div>
        <div class="col-span-8">
            <div class="flex items-center py-1 text-sm article-meta">
                <x-activities.author :author="$activity->author" size="xs" />
                <span class="text-xs text-gray-500">. {{ $activity->published_at->diffForHumans() }}</span>
            </div>
            <h2 class="text-xl font-bold text-gray-900">
                <a wire:navigate href="{{ route('activities.show', $activity->slug) }}">
                    {{ $activity->title }}
                </a>
            </h2>

            <p class="mt-2 text-base font-light text-gray-700">
                {{ $activity->getExcerpt() }}
            </p>
            <div class="flex items-center justify-between mt-6 article-actions-bar">
                <div class="flex gap-x-2">
                    @foreach ($activity->categories as $category)
                        <x-activities.category-activity-badge :category="$category" />
                    @endforeach
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-500">{{ $activity->getReadingTime() }}
                            Min read
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>