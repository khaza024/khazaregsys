<div>
    <h3 class="mb-3 text-lg font-semibold text-gray-900">Rekomendasi Topik</h3>
    <div class="flex flex-wrap justify-start gap-2 topics">
        @foreach ($categories as $category)
            <x-blogs.category-blog-badge :category="$category" />
        @endforeach
    </div>
</div>
