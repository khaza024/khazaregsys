<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __invoke()
    {
        $kontak = Information::where('slug', 'kontak-sekolah')->firstOrFail();
        return view(
            'kontak',
            [
                'kontak' => $kontak
            ]
        );
    }
}
