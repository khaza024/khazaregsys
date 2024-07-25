<x-app-layout :title="$blog->title">
    <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3" style="max-width:700px">
        <img class="w-full my-2 rounded-lg" src="{{ $blog->getThumbnailUrl() }}" alt="{{ $blog->slug }}">
        <h1 class="text-4xl font-bold text-left text-gray-800">
            {{ $blog->title }}
        </h1>
        <div class="flex items-center justify-between mt-2">
            <div class="flex items-center py-5">
                <x-blogs.author :author="$blog->author" size="md" />
                <span class="text-sm text-gray-500">| {{ $blog->getReadingTime() }} min read</span>
            </div>
            <div class="flex items-center">
                <span class="mr-2 text-gray-500">{{ $blog->published_at->diffForHumans() }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                    stroke="currentColor" class="w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <div class="py-3 text-lg prose text-justify text-gray-800 article-content">
            {!! $blog->body !!}
        </div>

        <div class="flex items-center mt-10 space-x-4">
            @foreach ($blog->categories as $category)
                <x-blogs.category-blog-badge :category="$category" />
            @endforeach
        </div>

        <a href="{{ route('blogs.index') }}"
            class="inline-flex items-center px-4 py-2 mt-4 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M12.707 14.707a1 1 0 01-1.414 0L7 10.414 3.707 13.707a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4-4a1 1 0 011.414 1.414L9.414 10l3.293 3.293a1 1 0 010 1.414z"
                    clip-rule="evenodd" />
            </svg>
            Kembali
        </a>
    </article>
</x-app-layout>