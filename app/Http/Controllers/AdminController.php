<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function users()
    {
        $users=DB::table('users')->get();

        return response()->json([
            'users'=>$users
        ]);
    }
}