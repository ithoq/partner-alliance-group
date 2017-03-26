<?php

namespace Vanguard\Http\Controllers\Panel\Admin;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Services\Logging\UserActivity\Logger;
use Validator;
use File;
use DB;

# Use Models
use Vanguard\Models\EstatesModel as Estates;

class EstatesController extends Controller
{
    
    # Controller Variables
    private $logger;
    private $directory;
    private $panel;
    private $message;
    
    public function __construct(Logger $logger) {
        
        $this->logger = $logger;
        $this->directory = 'panel.admin.estates.';
        $this->panel = [
            'type' => 'admin'
        ];
        $this->message = 'estate';
        
    }
    
    public function manage(Request $request) {
        
        # Database Feed
        if(env('APP_DEBUG')) {
            
            # Allow viewing of default value if debug is enabled
            $data['items'] = Estates::all();
            
        }
        
        else {
            
            # Disallow viewing of default value if debug is disabled
            $data['items'] = Estates::where('id', '!=', '1')->get();
            
        }
        
        # Page Information
        $data['panel'] = $this->panel;
        
        # Return
        return view($this->directory.'manage')->with($data);
        
    }
    
    public function add(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'estate_name' => 'required',
            'estate_address' => 'required',
            'estate_suburb' => 'required',
            'estate_state' => 'required',
            'is_published' => 'required'
        ]);
        
        # Validate Request Data
        if ($validator->fails()) {
            
            # Return to previous page with errors if validation fails.
            return redirect()->back()->withErrors($validator)->withInput();
            
        }
        
        else {
            
            # Prepare Files
            $file_1 = $request->file('estate_profile');
            $file_2 = $request->file('estate_research');
            
            # Insert New Data
            $estate = new Estates;
            $estate->estate_name = $request->estate_name;
            $estate->estate_address = $request->estate_address;
            $estate->estate_suburb = $request->estate_suburb;
            $estate->estate_state = $request->estate_state;
            $estate->estate_website = $request->estate_website;
            $estate->estate_map = $request->estate_map;
            
            if($request->hasFile('estate_profile')) $estate->estate_profile = $file_1->getClientOriginalName();
            if($request->hasFile('estate_research')) $estate->estate_research = $file_2->getClientOriginalName();
            
            $estate->is_published = $request->is_published;
            
            # Check For Insert
            if($estate->save()) {
                
                # Prepare Path
                $path = public_path('upload/estates/'.$estate->id);
                
                # Check For Folder
                if(!File::isDirectory($path)) {
                    
                    # Create Directory
                    File::makeDirectory($path, 0777, true, true);
                    
                }                
                
                # Upload File 1
                if($request->hasFile('estate_profile')) $file_1->move($path, $file_1->getClientOriginalName());
                
                # Upload File 2
                if($request->hasFile('estate_research')) $file_2->move($path, $file_2->getClientOriginalName());
                
                # Log
                $this->logger->log('Added New Estate');
                
                # Return Success
                return redirect()->back()->withSuccess('Successfully added new '. $this->message .'.');
                
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
            $data['item'] = Estates::find($request->id);
            
            # Return View
            return view($this->directory.'edit')->with($data);
            
        }
        
    }
    
    # Update
    public function update(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|not_in:1',
            'estate_name' => 'required',
            'estate_address' => 'required',
            'estate_suburb' => 'required',
            'estate_state' => 'required',
            'is_published' => 'required'
        ], ['not_in' => 'You are not allowed to modify the default value.']);
        
        # Validate Request Data
        if ($validator->fails()) {
            
            # Return to previous page with errors if validation fails.
            return redirect()->back()->withErrors($validator)->withInput();
            
        }
        
        else {
            
            # Prepare Files
            $file_1 = $request->file('estate_profile');
            $file_2 = $request->file('estate_research');
            
            # Path
            $path = public_path('upload/estates/'.$request->id);
            
            # Find Estate
            $estate = Estates::find($request->id);
            
            # Get Original Files
            $of_1 = $estate->estate_profile;
            $of_2 = $estate->estate_research;
            
            # Prepare Data
            $estate->estate_name = $request->estate_name;
            $estate->estate_address = $request->estate_address;
            $estate->estate_suburb = $request->estate_suburb;
            $estate->estate_state = $request->estate_state;
            $estate->estate_website = $request->estate_website;
            $estate->estate_map = $request->estate_map;
            
            if($request->hasFile('estate_profile')) $estate->estate_profile = $file_1->getClientOriginalName();
            if($request->hasFile('estate_research')) $estate->estate_research = $file_2->getClientOriginalName();
            
            $estate->is_published = $request->is_published;
            
            # Check Profile
            if($request->hasFile('estate_profile') && $request->file('estate_profile')->isValid()) {
                
                # Delete Original FIle
                File::delete($path . '/' . $of_1);
                
                # Move Uploaded File
                $file_1->move($path, $file_1->getClientOriginalName());
                
                # Update File Information
                $estate->estate_profile = $file_1->getClientOriginalName();
                
            }
            
            # Check Research
            if($request->hasFile('estate_research') && $request->file('estate_research')->isValid()) {
                
                # Delete Original FIle
                File::delete($path . '/' . $of_2);
                
                # Move Uploaded File
                $file_2->move($path, $file_2->getClientOriginalName());
                
                # Update File Information
                $estate->estate_research = $file_2->getClientOriginalName();
                
            }
            
            # Update Table
            if($estate->save()) {
                
                # Log
                $this->logger->log('Updated '. $this->message .' with ID: '.$request->id);
                
                # Return
                return redirect()->back()->withSuccess('Successfully updated '. $this->message .'.');
                
            }
            
            else {
                
                # Return
                return redirect()->back()->withErrors('Something went wrong. Please try again.');
                
            }
            
        }
        
    }
    
    # Delete Email
    public function delete(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|not_in:1'
        ]);
        
        # Validate Request Data
        if ($validator->fails()) {
            
            # Return to previous page with errors if validation fails.
            return redirect()->back()->withErrors($validator)->withInput();
            
        }
        
        else {
            
            # Delete From Database
            $estate = Estates::find($request->id);
            
            if($estate->delete()) {
                
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
