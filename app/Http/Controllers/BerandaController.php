<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Information;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BerandaController extends Controller
{
    /** 
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $programs = Program::all()->take(4);
        // $latestActivities = Cache::remember('latestActivities', now()->addDay(), function () {
        //     return Activity::published()->with(['categories'])->latest('published_at')->take(6)->get();
        // });
        $activities = Activity::with(['categories'])->take(6)->get();
        $blogs = Information::with(['categories'])->take(4)->get();

        return view('beranda', [
            'programs' => $programs,
            // 'latestActivities' => $latestActivities,
            'activities' => $activities,
            'blogs' => $blogs,
        ]);
    }
}
