<?php

namespace WeTyper\Http\Controller;

use Illuminate\Support\Facades\View;
use WeTyper\Foundation\Http\Controller;

class HomeController extends Controller
{
    /**
     *
     */
    public function indexView()
    {
        return View::make('index', []);
    }
}
