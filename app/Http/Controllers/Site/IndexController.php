<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }


}
