<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use Illuminate\Http\Request;

class GearController extends Controller
{
    //
    public function index(Request $request)
    {

        return view('/pages/newgear');
    }
}
