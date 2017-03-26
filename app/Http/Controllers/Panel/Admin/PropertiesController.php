<?php

namespace Vanguard\Http\Controllers\Panel\Admin;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Services\Logging\UserActivity\Logger;
use File;
use Validator;
use DB;

# Use Models
use Vanguard\Models\PropertiesModel as Properties;
use Vanguard\Models\EstatesModel as Estates;

class PropertiesController extends Controller
{
    
    # Controller Variables
    private $logger;
    private $directory;
    private $panel;
    private $message;
    
    public function __construct(Logger $logger) {
        
        $this->logger = $logger;
        $this->directory = 'panel.admin.properties.';
        $this->panel = [
            'type' => 'admin'
        ];
        $this->message = 'property';
        
    }
    
    public function manage(Request $request) {
        
        # Database Feed
        if(env('APP_DEBUG')) {
            
            # Allow viewing of default value if debug is enabled
            $data['items'] = Properties::join('estates', 'properties.property_estate', '=', 'estates.id')
                ->select(
                    'properties.*', 
                    'estates.estate_name', 
                    'estates.estate_address', 
                    'estates.estate_suburb', 
                    'estates.estate_state', 
                    'estates.id as estate_id'
                    )
                ->get();
            
        }
        
        else {
            
            # Disallow viewing of default value if debug is disabled
            $data['items'] = Properties::join('estates', 'properties.property_estate', '=', 'estates.id')
                ->select(
                    'properties.*', 
                    'estates.estate_name', 
                    'estates.estate_address', 
                    'estates.estate_suburb', 
                    'estates.estate_state', 
                    'estates.id as estate_id'
                    )
                ->where('properties.id', '!=', '1')
                ->get();
            
        }
        
        # Page Information
        $data['panel'] = $this->panel;
        
        # Return
        return view($this->directory.'manage')->with($data);
        
    }
    
    public function create(Request $request) {
        
        # Page Information
        $data['panel'] = $this->panel;
        $data['estates'] = Estates::all();
        
        # Return
        return view($this->directory.'create')->with($data);
        
    }
    
    public function add(Request $request) {
        
        # Prepare Validator
        $validator = Validator::make($request->all(), [
            'property_estate' => 'required',
            'is_published' => 'required'
        ]);
        
        # Validate Request Data
        if ($validator->fails()) {
            
            # Return to previous page with errors if validation fails.
            return redirect()->back()->withErrors($validator)->withInput();
            
        }
        
        else {
            
            # Prepare Files
            $file_1 = $request->file('image_facade');
            $file_2 = $request->file('image_floor_plan');
            
            # Insert New Data
            $property = new Properties;
            $property->property_estate = $request->property_estate;
            $property->property_lot_number = $request->property_lot_number;
            $property->property_street = $request->property_street;
            $property->property_price = $request->property_price;
            $property->property_design = $request->property_design;
            $property->property_size = $request->property_size;
            $property->property_land = $request->property_land;
            $property->property_bed = $request->property_bed;
            $property->property_bath = $request->property_bath;
            $property->property_car = $request->property_car;
            $property->property_status = $request->property_status;
            $property->land_price = $request->land_price;
            $property->house_price = $request->house_price;
            $property->total_price = $request->total_price;
            $property->house_design = $request->house_design;
            $property->facade = $request->facade;
            $property->colour_scheme = $request->colour_scheme;
            $property->total_area = $request->total_area;
            $property->width = $request->width;
            $property->depth = $request->depth;
            $property->contract = $request->contract;
            $property->property_titled = $request->property_titled;
            $property->frontage = $request->frontage;
            $property->approx_rent = $request->approx_rent;
            $property->council_rates = $request->council_rates;
            
            /*
            $property->file_cover_sheet = $request->file_cover_sheet;
            $property->file_land_contract = $request->file_land_contract;
            $property->file_building_contract = $request->file_building_contract;
            $property->file_extra_contract_docs = $request->file_extra_contract_docs;
            $property->file_other = $request->file_other;
            $property->file_colour_scheme = $request->file_colour_scheme;
            $property->file_house_brochure = $request->file_house_brochure;
            $property->file_investor_grade_specs = $request->file_investor_grade_specs;
            */
            
            /*
            $property->image_facade = $request->image_facade;
            $property->image_floor_plan = $request->image_floor_plan;
            */
            
            if($request->hasFile('image_facade')) $property->image_facade = $file_1->getClientOriginalName();
            if($request->hasFile('image_floor_plan')) $property->image_floor_plan = $file_2->getClientOriginalName();
            
            $property->is_published = $request->is_published;            
            
            
            $property->is_published = $request->is_published;
            
            # Check For Insert
            if($property->save()) {
                
                # Upload Files
                $this->uploadFiles($request, $property->id);
                
                # Prepare Path
                $path = public_path('upload/properties/'.$property->id.'/images');
                
                # Check For Folder
                if(!File::isDirectory($path)) {
                    
                    # Create Directory
                    File::makeDirectory($path, 0777, true, true);
                    
                }                
                
                # Upload File 1
                if($request->hasFile('image_facade')) $file_1->move($path, $file_1->getClientOriginalName());
                
                # Upload File 2
                if($request->hasFile('image_floor_plan')) $file_2->move($path, $file_2->getClientOriginalName());                
                
                # Log
                $this->logger->log('Added new '.$this->message.'.');
                
                # Return Success
                return redirect()->back()->withSuccess('Successfully added new '. $this->message .'.');
                
            }
            
            else {
                
                # Return Failure
                return redirect()->back()->withErrors('Something went wrong. Please try again.')->withInput();
                
            }
        }        
        
    }
    
    /* ----- Utility Functions ----- */
    
    # Upload FIles
    public function uploadFiles(Request $request, $id) {
        
        $array = [
            'file_cover_sheet',
            'file_land_contract',
            'file_building_contract',
            'file_extra_contract_docs',
            'file_other',
            'file_colour_scheme',
            'file_house_brochure',
            'file_investor_grade_specs'
        ];
        
        foreach($array as $arr) {
            
            # Check File
            if($request->hasFile($arr) && $id != '' && $id != NULL) {
                
                # Retrieve File
                $file = $request->file($arr);
                
                # Prepare Path
                $path = public_path('upload/properties/'.$id.'/files/');
                
                # Check For Folder
                if(!File::isDirectory($path)) {
                    
                    # Create Directory
                    File::makeDirectory($path, 0777, true, true);
                    
                }
                
                # Move Uploaded File
                $file->move($path, $file->getClientOriginalName());
                
                # Update Property
                $property = Properties::find($id);
                $property[$arr] = $file->getClientOriginalName();
                $property->save();
                
            }
            
        }
        
    }
    
    public function uploadImages(Request $request, $id) {
        
    }
    
}
