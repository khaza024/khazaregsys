<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class PPDBController extends Controller
{
    public function __invoke()
    {
        $berkasPPDB = Information::where('slug', 'berkas-ppdb')->firstOrFail();
        $alurPPDB = Information::where('slug', 'alur-ppdb')->firstOrFail();

        return view(
            'ppdb',
            [
                'berkasPPDB' => $berkasPPDB,
                'alurPPDB' => $alurPPDB,
            ]
        );
    }
}
