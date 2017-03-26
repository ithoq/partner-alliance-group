<?php

namespace Vanguard\Http\Controllers\Panel\Admin;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Services\Logging\UserActivity\Logger;
use Validator;
use DB;

# Use Models
use Vanguard\Models\DownloadTypesModel as DownloadTypes;

class DownloadTypesController extends Controller
{
    
    # Controller Variables
    private $logger;
    private $directory;
    private $panel;
    private $message;
    
    public function __construct(Logger $logger) {
        
        $this->logger = $logger;
        $this->directory = 'panel.admin.downloads.types.';
        $this->panel = [
            'type' => 'admin'
        ];
        $this->message = 'download type';
        
    }
    
    public function manage(Request $request) {
        
        # Database Feed
        if(env('APP_DEBUG')) {
            
            # Allow viewing of default value if debug is enabled
            $data['items'] = DownloadTypes::all();
            
        }
        
        else {
            
            # Disallow viewing of default value if debug is disabled
            $data['items'] = DownloadTypes::where('id', '!=', '1')->get();
            
        }
        
        # Page Information
        $data['panel'] = $this->panel;
        
        # Return
        return view($this->directory.'manage')->with($data);
        
    }
    
    public function add(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'type_name' => 'required',
        ]);
        
        # Validate Request Data
        if ($validator->fails()) {
            
            # Return to previous page with errors if validation fails.
            return redirect()->back()->withErrors($validator)->withInput();
            
        }
        
        else {
            
            # Insert New Data
            $type = new DownloadTypes;
            $type->type_name = $request->type_name;
            $type->type_desc = $request->type_desc;
            
            # Check For Insert
            if($type->save()) {
                
                # Log
                $this->logger->log('Added new '.$this->message.'.');
                
                # Return Success
                return redirect()->back()->withSuccess('Successfully added new '.$this->message.'.');
                
            }
            
            else {
                
                # Return Failure
                return redirect()->back()->withErrors('Something went wrong. Please try again.')->withInput();
                
            }
        }
        
    }
    
    # Edit
    public function edit(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|not_in:1'
        ], ['not_in' => 'You are not allowed to modify the default value.']);
        
        # Validate Request Data
        if ($validator->fails()) {
            
            # Return to previous page with errors if validation fails.
            return redirect()->back()->withErrors($validator)->withInput();
            
        }   
        
        else {
            
            # Page Information
            $data['panel'] = $this->panel;
            
            # Database Feed
            $data['item'] = DownloadTypes::find($request->id);
            
            # Return View
            return view($this->directory.'edit')->with($data);
            
        }
        
    }
    
    # Update
    public function update(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|not_in:1',
            'type_name' => 'required',
        ], ['not_in' => 'You are not allowed to modify the default value.']);
        
        # Validate Request Data
        if ($validator->fails()) {
            
            # Return to previous page with errors if validation fails.
            return redirect()->back()->withErrors($validator)->withInput();
            
        }
        
        else {
            
            if($request->has('contact') && $request->has('email_desc')) {
                
                
                # Return
                return redirect()->back()->withSuccess('Successfully updated '.$this->message.'.');
        
            }            
            
            else {
                
                # Prepare Data
                $type = DownloadTypes::find($request->id);
                $type->type_name = $request->type_name;
                $type->type_desc = $request->type_desc;
                
                # Update Table
                if($type->save()) {
                    
                    # Log
                    $this->logger->log('Updated '.$this->message.' with ID: '.$request->id);
                    
                    # Return
                    return redirect()->back()->withSuccess('Successfully updated '.$this->message.'.');
                    
                }
                
                else {
                    
                    # Return
                    return redirect()->back()->withErrors('Something went wrong. Please try again.');
                    
                }
                
            }
            
        }
        
    }
    
    # Delete Email
    public function delete(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|not_in:1'
        ], ['not_in' => 'You are not allowed to modify the default value.']);
        
        # Validate Request Data
        if ($validator->fails()) {
            
            # Return to previous page with errors if validation fails.
            return redirect()->back()->withErrors($validator)->withInput();
            
        }
        
        else {
            
            # Delete From Database
            $type = DownloadTypes::find($request->id);
            
            if($type->delete()) {
                
                # Log
                $this->logger->log('Deleted '. $this->message .' with ID: '.$request->id);
                
                # Return
                return redirect()->back()->withSuccess('Successfully deleted '. $this->message .'.');
                
            }
            
            else {
                
                # Return
                return redirect()->back()->withErrors('Something went wrong. Please try again.');
                
            }
            
        }
        
    }    
    
}
