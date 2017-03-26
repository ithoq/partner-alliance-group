<?php

namespace Vanguard\Http\Controllers\Panel\Admin;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Services\Logging\UserActivity\Logger;
use Validator;
use DB;

# Use Models
use Vanguard\Models\PropertiesModel as Properties;

class PropertiesController extends Controller
{
    
    # Controller Variables
    private $logger;
    private $directory;
    private $panel;
    
    public function __construct(Logger $logger) {
        
        $this->logger = $logger;
        $this->directory = 'panel.admin.properties.';
        $this->panel = [
            'type' => 'admin'
        ];
        
    }
    
    public function manage(Request $request) {
        
        # Database Feed
        if(env('APP_DEBUG')) {
            
            # Allow viewing of default value if debug is enabled
            $data['items'] = Properties::all();
            
        }
        
        else {
            
            # Disallow viewing of default value if debug is disabled
            $data['items'] = Properties::where('id', '!=', '1')->get();
            
        }
        
        # Page Information
        $data['panel'] = $this->panel;
        
        # Return
        return view($this->directory.'manage')->with($data);
        
    }
    
}
