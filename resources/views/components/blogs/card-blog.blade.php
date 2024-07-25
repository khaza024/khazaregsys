@props(['blog'])


<div class="col-span-1 bg-white rounded-lg shadow-md border-2 border-solid border-[#404040]">
    <img src="{{ $blog->getThumbnailUrl() }}" alt="{{ $blog->slug }}"  
        class="w-full h-72 x3s-xs:h-[7.5rem] object-cover mb-4 rounded-tr-lg rounded-tl-lg">
    {{-- <a href="#">
        <h2 class="text-xl x3s:text-base font-semibold mb-2">{{ $blog->title }}</h2>
    </a> --}}
    <div class="mt-3">
        <div class="flex items-center mb-2 gap-x-2 p-2.5">
            @foreach ($blog->categories as $category)
                <x-blogs.category-blog-badge :category="$category" />
            @endforeach
            <p class="text-sm text-gray-500">{{ $blog->published_at }}</p>
        </div>
        <a wire:navigate href="{{ route('blogs.show', $blog->slug) }}"
            class="text-xl font-bold text-gray-900">{{ $blog->title }}</a>
    </div>
</div>