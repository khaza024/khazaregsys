@props(['blog'])

<article {{ $attributes->merge(['class' => '[&:not(:last-child)]:border-b border-gray-100 pb-10']) }}>
    <div class="grid items-start grid-cols-12 gap-3 mt-5 article-body">
        <div class="flex items-center col-span-4 article-thumbnail">
            <a wire:navigate href="{{ route('blogs.show', $blog->slug) }}">
                <img class="mx-auto mw-100 rounded-xl" src="{{ $blog->getThumbnailUrl() }}" alt="{{ $blog->slug }}">
            </a>
        </div>
        <div class="col-span-8">
            <div class="flex items-center py-1 text-sm article-meta">
                <x-blogs.author :author="$blog->author" size="xs" />
                <span class="text-xs text-gray-500">. {{ $blog->published_at->diffForHumans() }}</span>
            </div>
            <h2 class="text-xl font-bold text-gray-900">
                <a wire:navigate href="{{ route('blogs.show', $blog->slug) }}">
                    {{ $blog->title }}
                </a>
            </h2>

            <p class="mt-2 text-base font-light text-gray-700">
                {{ $blog->getExcerpt() }}
            </p>
            <div class="flex items-center justify-between mt-6 article-actions-bar">
                <div class="flex gap-x-2">
                    @foreach ($blog->categories as $category)
                        <x-blogs.category-blog-badge :category="$category" />
                    @endforeach
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-500">{{ $blog->getReadingTime() }}
                            Min read
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>