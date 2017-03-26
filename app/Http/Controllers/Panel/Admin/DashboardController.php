<?php

namespace Vanguard\Http\Controllers\Panel\Admin;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;

class DashboardController extends Controller
{

    private $directory;        
    private $panel;
    
    public function __construct() {
        
        $this->directory = 'panel.admin.';
        $this->panel = [
            'type' => 'admin',
            'section' => 'dashboard'
        ];
        
    }
    
    public function index() {
        
        # Page Information
        $data['panel'] = $this->panel;
        
        # Return View
        return view($this->directory.'dashboard')->with($data);        
        
    }

}
