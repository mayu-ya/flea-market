<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise;

class ItemController extends Controller
{
    public function index()
    {
        $merchandises = Merchandise::only('image', 'merchandise_name');
        return view('index', ['merchandises' => $merchandises]);
    }
}
