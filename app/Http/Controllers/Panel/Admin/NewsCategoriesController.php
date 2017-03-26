<?php

namespace Vanguard\Http\Controllers\Panel\Admin;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Services\Logging\UserActivity\Logger;
use Validator;
use DB;

# Use Models
use Vanguard\Models\NewsCategoriesModel as NewsCategories;

class NewsCategoriesController extends Controller
{
    
    # Controller Variables
    private $logger;
    private $directory;
    private $panel;
    private $message;
    
    public function __construct(Logger $logger) {
        
        $this->logger = $logger;
        $this->directory = 'panel.admin.news.categories.';
        $this->panel = [
            'type' => 'admin'
        ];
        $this->message = 'news category';
        
    }
    
    public function manage(Request $request) {
        
        # Database Feed
        if(env('APP_DEBUG')) {
            
            # Allow viewing of default value if debug is enabled
            $data['items'] = NewsCategories::all();
            
        }
        
        else {
            
            # Disallow viewing of default value if debug is disabled
            $data['items'] = NewsCategories::where('id', '!=', '1')->get();
            
        }
        
        # Page Information
        $data['panel'] = $this->panel;
        
        # Return
        return view($this->directory.'manage')->with($data);
        
    }
    
    public function add(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
        ]);
        
        # Validate Request Data
        if ($validator->fails()) {
            
            # Return to previous page with errors if validation fails.
            return redirect()->back()->withErrors($validator)->withInput();
            
        }
        
        else {
            
            # Insert New Data
            $category = new NewsCategories;
            $category->category_name = $request->category_name;
            $category->category_desc = $request->category_desc;
            
            # Check For Insert
            if($category->save()) {
                
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
            $data['item'] = NewsCategories::find($request->id);
            
            # Return View
            return view($this->directory.'edit')->with($data);
            
        }
        
    }
    
    # Update
    public function update(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|not_in:1',
            'category_name' => 'required',
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
                $category = NewsCategories::find($request->id);
                $category->category_name = $request->category_name;
                $category->category_desc = $request->category_desc;
                
                # Update Table
                if($category->save()) {
                    
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
            $category = NewsCategories::find($request->id);
            
            if($category->delete()) {
                
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
