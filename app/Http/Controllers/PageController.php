<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }
}
