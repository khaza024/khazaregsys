@props(['program'])

<article class="{{ $attributes->merge(['class' => '[&:not(:last-child)]:border-b border-gray-100 pb-10']) }}">
    <div class="grid items-start grid-cols-12 gap-3 mt-5 article-body">
        <div class="flex items-center col-span-4 article-thumbnail">
            <a wire:navigate href="{{ route('programs.show', $program->slug) }}">
                <img class="mx-auto mw-100 rounded-xl" src="{{ $program->getThumbnailUrl() }}" alt="{{ $program->slug }}">
            </a>
        </div>
        <div class="col-span-8">
            <h2 class="text-xl font-bold text-gray-900">
                <a wire:navigate href="{{ route('programs.show', $program->slug) }}">
                    {{ $program->title }}
                </a>
            </h2>
            <p class="mt-2 text-base font-light text-gray-700">
                {{ $program->getExcerpt() }}
            </p>
        </div>
    </div>
</article>
