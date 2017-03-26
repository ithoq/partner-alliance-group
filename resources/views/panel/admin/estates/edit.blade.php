@extends('layouts.panel.panel-default')
@section('page-title', 'Edit Estate')

@section('page-css')
@endsection

@section('page-scripts')
@endsection

@section('page-content')
<!-- Page Information -->
<div class="m-b-xl">
	<h1 style="font-size: 48px;">Edit Estate
	    <span class="pull-right">
            <a href="{{ route('estates.manage') }}" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Back To Manage Estates
            </a>
	    </span>
	</h1>
	
	<h4>You are currently editing the estate named "{{ $item->estate_name }}".</h4>
</div>

<div class="row">
    <form action="{{ route('estates.update') }}" method="POST" enctype="multipart/form-data">
        
        <!-- Hidden Fields -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $item->id }}" />
        
        <div class="col-md-3">
            <div class="widget">
                <header class="widget-header">
    				<h4 class="widget-title">Profile</h4>
    			</header>
                
                <hr class="widget-separator">
                
                <div class="widget-body">
                	<div class="widget-body">
                	    @if($item->estate_profile == 'Unavailable')
                	        <a href="#" class="btn btn-default btn-block disabled"><i class="fa fa-file"></i> {{ $item->estate_profile }}</a>
                	    @else
                	        <a href="{{ asset('/upload/estates/'.$item->id.'/'.$item->estate_profile) }}" target="_blank" class="btn btn-default btn-block"><i class="fa fa-file"></i> {{ $item->estate_profile }} <Br /> <small>(Click To View)</small></a>
                	    @endif
                	</div>
                </div>
    			
                <hr class="widget-separator">
                
                <div class="widget-body">
                    <div class="form-group">
                        <label for="estate_profile"><strong>Upload New File</strong></label>
                        <span class="label label-default pull-right text-uppercase">Optional</span>
                        <input type="file" class="form-control" id="estate_profile" name="estate_profile" />
                    </div>
                </div>
            </div>
            
            <div class="widget">
                <header class="widget-header">
    				<h4 class="widget-title">Research</h4>
    			</header>
                
                <hr class="widget-separator">
                
                <div class="widget-body">
                	<div class="widget-body">
                	    @if($item->estate_research == 'Unavailable')
                	        <a href="#" class="btn btn-default btn-block disabled"><i class="fa fa-file"></i> {{ $item->estate_research }}</a>
                	    @else
                	        <a href="{{ asset('/upload/estates/'.$item->id.'/'.$item->estate_research) }}" target="_blank" class="btn btn-default btn-block"><i class="fa fa-file"></i> {{ $item->estate_research }} <Br /> <small>(Click To View)</small></a>
                	    @endif
                	</div>
                </div>
    			
                <hr class="widget-separator">
                
                <div class="widget-body">
                    <div class="form-group">
                        <label for="estate_research"><strong>Upload New File</strong></label>
                        <span class="label label-default pull-right text-uppercase">Optional</span>
                        <input type="file" class="form-control" id="estate_research" name="estate_research" value="{{ old('estate_research') }}" />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            
            <div class="widget">
                <header class="widget-header">
    				<h4 class="widget-title">Main Information</h4>
    			</header>
    			
            	<hr class="widget-separator">
            	
            	<div class="widget-body">
            	    
            	    <!-- Form Fields -->
                    <div class="form-group">
                        <label for="estate_name"><strong>Name</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <input type="text" class="form-control" id="estate_name" name="estate_name" value="{{ $item->estate_name }}" placeholder="Name of the estate" required="required" />
                    </div>
                    
                    <div class="form-group">
                        <label for="is_published"><strong>Visibility</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <select class="form-control" id="is_published" name="is_published">
                            <option value="0" @if($item->is_published == 0) selected @endif>Draft</option>
                            <option value="1" @if($item->is_published == 1) selected @endif>Published</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="estate_address"><strong>Address</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <input type="text" class="form-control" id="estate_address" name="estate_address" value="{{ $item->estate_address }}" placeholder="Estate Address" required="required" />
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estate_suburb"><strong>Suburb</strong></label>
                                <span class="label label-danger pull-right text-uppercase">Required</span>
                                <input type="text" class="form-control" id="estate_suburb" name="estate_suburb" value="{{ $item->estate_suburb }}" placeholder="The suburb of the estate" required="required" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estate_state"><strong>State</strong></label>
                                <span class="label label-danger pull-right text-uppercase">Required</span>
                                <input type="text" class="form-control" id="estate_state" name="estate_state" value="{{ $item->estate_state }}" placeholder="State of the estate" required="required" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estate_website"><strong>Website</strong></label>
                                <span class="label label-default pull-right text-uppercase">Optional</span>
                                <input type="text" class="form-control" id="estate_website" name="estate_website" value="{{ $item->estate_website }}" placeholder="Enter the full url (e.g. http://google.com)" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estate_map"><strong>Map</strong></label>
                                <span class="label label-default pull-right text-uppercase">Optional</span>
                                <input type="text" class="form-control" id="estate_map" name="estate_map" value="{{ $item->estate_map }}" placeholder="Enter the full url (e.g. http://google.com)" />
                            </div>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                    </div>
            	</div>
            </div>
            
        </div>
    
    </form>
</div>
@endsection
