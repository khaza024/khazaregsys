@props(['program'])


<div class="col-span-1 bg-white rounded-lg shadow-md border-2 border-solid border-[#404040]">
    <img src="{{ $program->getThumbnailUrl() }}" alt="{{ $program->slug }}"  
        class="w-full h-56 x3s-xs:h-[7.5rem] object-cover mb-4 rounded-tr-lg rounded-tl-lg">
    <a href="#">
        <h2 class="text-xl x3s:text-base font-semibold mb-2">{{ $program->title }}</h2>
    </a>
</div>