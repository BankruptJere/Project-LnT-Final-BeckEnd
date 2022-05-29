<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $items = Item::where('status', 'Accepted')->get();
        return view('index', [
            'items' => $items
        ]);
    }
}
