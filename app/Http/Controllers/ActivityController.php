<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ActivityController extends Controller
{
    public function index(){
        $categories = Cache::remember('categories', now()->addDays(3), function() {
            return Category::whereHas('activities', function ($query) {
                $query->published();
            })->take(3)->get();
        });

        return view(
            'activities.index',
            [
                'categories' => $categories
            ]
        );
    }

    public function show(Activity $activity)
    {
        return view(
            'activities.show',
            [
                'activity' => $activity
            ]
        );
    }
}
