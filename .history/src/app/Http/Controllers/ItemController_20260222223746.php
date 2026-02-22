<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise;

class ItemController extends Controller
{
    public function index()
    {
        $merchandises = Merchandise::select('image', 'merchandise_name')->get();
        return view('index', ['merchandises' => $merchandises]);
    }
}
