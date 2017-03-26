<?php

namespace Vanguard\Http\Controllers\Main;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;

class IndexController extends Controller
{
    
    public function home() {
        
        // Return View
        return view('main/home');
        
    }
    
}
