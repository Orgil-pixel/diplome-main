<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function get_index_page()
    {
        return view('pages.index');
    }

    public function get_home_page()
    {
        return view('pages.home');
    }

    public function get_signup_page()
    {
        return view('pages.signup');
    }
}
