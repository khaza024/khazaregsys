@props(['category'])

<x-khazaregsys.badge wire:navigate href="#" :textColor="$category->text_color" :bgColor="$category->bg_color">
    {{ $category->title }}
</x-khazaregsys.badge>