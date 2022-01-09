<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function  view_home()
    {
       return view('homePage');

    }
}
