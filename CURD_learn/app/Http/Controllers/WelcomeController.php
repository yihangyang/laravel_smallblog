<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function about() {
        $name = "yang";
        return view("pages/about", ['name' => $name]);
    }
}
