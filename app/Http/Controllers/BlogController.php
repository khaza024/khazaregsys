<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    public function index(){
        $categories = Cache::remember('categories', now()->addDays(3), function() {
            return Category::whereHas('information', function ($query) {
                $query->published();
            })->take(3)->get();
        });

        return view(
            'blogs.index',
            [
                'categories' => $categories
            ]
        );
    }

    public function show(Information $blog)
    {
        return view(
            'blogs.show',
            [
                'blog' => $blog
            ]
        );
    }
}
