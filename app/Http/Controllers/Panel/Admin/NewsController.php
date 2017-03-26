<?php

namespace Vanguard\Http\Controllers\Panel\Admin;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Services\Logging\UserActivity\Logger;
use Validator;
use DB;

# Use Models
use Vanguard\Models\NewsModel as News;
use Vanguard\Models\NewsCategoriesModel as NewsCategories;

class NewsController extends Controller
{
    
    # Controller Variables
    private $logger;
    private $directory;
    private $panel;
    private $message;
    
    public function __construct(Logger $logger) {
        
        $this->logger = $logger;
        $this->directory = 'panel.admin.news.';
        $this->panel = [
            'type' => 'admin'
        ];
        $this->message = 'news';
        
    }
    
    public function manage(Request $request) {
        
        # Database Feed
        if(env('APP_DEBUG')) {
            
            # Allow viewing of default value if debug is enabled
            $data['items'] = News::join('news_categories as categories', 'news_category', '=', 'categories.id')
                ->join('users', 'news_author', '=', 'users.id')
                ->select('news.*', 'categories.category_name as news_category', 'users.first_name', 'users.last_name')
                ->get();
            
            # Allow viewing of default selection if debug is enabled
            $data['categories'] = NewsCategories::all();
            
        }
        
        else {
            
            # Disallow viewing of default value if debug is disabled
            $data['items'] = News::join('news_categories as categories', 'news_category', '=', 'categories.id')
                ->join('users', 'news_author', '=', 'users.id')
                ->select('news.*', 'categories.category_name as news_category', 'users.first_name', 'users.last_name')
                ->where('news.id', '!=', '1')
                ->get();

            # Disallow viewing of default selection if debug is enabled                
            $data['categories'] = NewsCategories::where('id', '!=', '1')->get();
            
        }
        
        # Page Information
        $data['panel'] = $this->panel;
        
        # Return
        return view($this->directory.'manage')->with($data);
        
    }
    
    public function add(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'news_title' => 'required',
            'news_content' => 'required',
            'news_author' => 'required',
            'news_category' => 'required',
            'is_published' => 'required',
        ]);
        
        # Validate Request Data
        if ($validator->fails()) {
            
            # Return to previous page with errors if validation fails.
            return redirect()->back()->withErrors($validator)->withInput();
            
        }
        
        else {
            
            # Insert New Data
            $news = new News;
            $news->news_title = $request->news_title;
            $news->news_content = $request->news_content;
            $news->news_author = $request->news_author;
            $news->news_category = $request->news_category;
            $news->is_published = $request->is_published;
            
            # Check For Insert
            if($news->save()) {
                
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
            $data['item'] = News::find($request->id);
            $data['categories'] = NewsCategories::where('id', '!=', '1')->get();
            
            # Return View
            return view($this->directory.'edit')->with($data);
            
        }
        
    }
    
    # Update
    public function update(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|not_in:1',
            'news_title' => 'required',
            'news_content' => 'required',
            'news_author' => 'required',
            'news_category' => 'required',
            'is_published' => 'required',
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
                $news = News::find($request->id);
                $news->news_title = $request->news_title;
                $news->news_content = $request->news_content;
                $news->news_author = $request->news_author;
                $news->news_category = $request->news_category;
                $news->is_published = $request->is_published;
                
                # Update Table
                if($news->save()) {
                    
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
            $news = News::find($request->id);
            
            if($news->delete()) {
                
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
