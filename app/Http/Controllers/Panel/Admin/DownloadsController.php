<?php

namespace Vanguard\Http\Controllers\Panel\Admin;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Services\Logging\UserActivity\Logger;
use Validator;
use File;
use DB;

# Use Models
use Vanguard\Models\DownloadsModel as Downloads;
use Vanguard\Models\DownloadTypesModel as DownloadTypes;

class DownloadsController extends Controller
{
    
    # Controller Variables
    private $logger;
    private $directory;
    private $panel;
    private $message;
    
    public function __construct(Logger $logger) {
        
        $this->logger = $logger;
        $this->directory = 'panel.admin.downloads.';
        $this->panel = [
            'type' => 'admin'
        ];
        $this->message = 'download';
        
    }
    
    public function manage(Request $request) {
        
        # Database Feed
        if(env('APP_DEBUG')) {
            
            # Allow viewing of default value if debug is enabled
            $data['items'] = Downloads::join('download_types as types', 'downloads.download_type', '=', 'types.id')
                ->select('downloads.*', 'types.type_name as download_type')
                ->get();
            
            # Allow viewing of default selection if debug is enabled
            $data['types'] = DownloadTypes::all();            
            
        }
        
        else {
            
            # Disallow viewing of default value if debug is enabled
            $data['items'] = Downloads::join('download_types as types', 'downloads.download_type', '=', 'types.id')
                ->select('downloads.*', 'types.type_name as download_type')
                ->where('downloads.id', '!=', '1')
                ->get();
            
            # Disallow viewing of default selection if debug is enabled
            $data['types'] = DownloadTypes::where('id', '!=', '1')->get();
            
        }
        
        # Page Information
        $data['panel'] = $this->panel;
        
        # Return
        return view($this->directory.'manage')->with($data);
        
    }
    
    public function add(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'download_name' => 'required',
            'download_desc' => 'required',
            'download_type' => 'required',
            'download_file' => 'required',
            'is_published' => 'required'
        ]);
        
        # Validate Request Data
        if ($validator->fails()) {
            
            # Return to previous page with errors if validation fails.
            return redirect()->back()->withErrors($validator)->withInput();
            
        }
        
        else {
            
            # Retrieve File
            $file = $request->file('download_file');
            
            # Insert New Data
            $download = new Downloads;
            $download->download_name = $request->download_name;
            $download->download_desc = $request->download_desc;
            $download->download_type = $request->download_type;
            $download->download_file = $file->getClientOriginalName();
            $download->is_published = $request->is_published;
            
            # Check For Insert
            if($download->save()) {
            
                # Prepare Path
                $path = public_path('upload/downloads/'.$download->id);
                
                # Check For Folder
                if(!File::isDirectory($path)) {
                    
                    # Create Directory
                    File::makeDirectory($path, 0777, true, true);
                    
                }
                
                # Move Uploaded File
                $file->move($path, $file->getClientOriginalName());
                
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
            $data['item'] = Downloads::find($request->id);
            $data['types'] = DownloadTypes::where('id', '!=', '1')->get();
            
            # Return View
            return view($this->directory.'edit')->with($data);
            
        }
        
    }
    
    # Update
    public function update(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|not_in:1',
            'download_name' => 'required',
            'download_desc' => 'required',
            'download_type' => 'required',
            'is_published' => 'required'
        ], ['not_in' => 'You are not allowed to modify the default value.']);
        
        # Validate Request Data
        if ($validator->fails()) {
            
            # Return to previous page with errors if validation fails.
            return redirect()->back()->withErrors($validator)->withInput();
            
        }
        
        else {
            
            # Prepare Data
            $download = Downloads::find($request->id);
            $download->download_name = $request->download_name;
            $download->download_desc = $request->download_desc;
            $download->download_type = $request->download_type;
            $download->is_published = $request->is_published;
            
            # Check For File
            if($request->hasFile('download_file') && $request->file('download_file')->isValid()) {
                
                # File
                $file = $request->file('download_file');
                
                # Path
                $path = public_path('upload/downloads/'.$request->id);
                
                # Clean Path
                File::cleanDirectory($path);
                
                # Move Uploaded File
                $file->move($path, $file->getClientOriginalName());
                
                # Update File Information
                $download->download_file = $file->getClientOriginalName();
                
            }
            
            # Update Table
            if($download->save()) {
                
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
            $download = Downloads::find($request->id);
            
            if($download->delete()) {
                
                # Path
                $path = public_path('upload/downloads/'.$request->id);
                
                # Clean Path
                File::deleteDirectory($path);
                
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
