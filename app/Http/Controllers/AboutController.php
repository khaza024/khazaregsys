<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __invoke()
    {
        $about = Information::where('slug', 'tentang-sekolah')->first();

        return view(
            'tentang',
            [
                'about' => $about
            ]
        );
    }
}
