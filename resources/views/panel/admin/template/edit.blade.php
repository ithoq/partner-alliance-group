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
    <div class="col-md-8">
        
        <div class="widget">
            <header class="widget-header">
				<h4 class="widget-title">Main Information</h4>
			</header>
			
        	<hr class="widget-separator">
        	
        	<div class="widget-body">
                    <div class="form-group">
                        <label for="estate_name">Name</label>
                        <span class="label label-danger pull-right">Required</span>
                        <input type="text" class="form-control" id="estate_name" name="estate_name" value="{{ $item->estate_name }}" required="required" />
                    </div>
                    
                    <div class="form-group">
                        <label for="estate_address">Address</label>
                        <span class="label label-danger pull-right">Required</span>
                        <input type="text" class="form-control" id="estate_address" name="estate_address" value="{{ $item->estate_address }}" required="required" />
                    </div>
                    
                    <div class="form-group">
                        <label for="estate_suburb">Suburb</label>
                        <span class="label label-danger pull-right">Required</span>
                        <input type="text" class="form-control" id="estate_suburb" name="estate_suburb" value="{{ $item->estate_suburb }}" required="required" />
                    </div>
                    
                    <div class="form-group">
                        <label for="estate_state">State</label>
                        <span class="label label-danger pull-right">Required</span>
                        <input type="text" class="form-control" id="estate_state" name="estate_state" value="{{ $item->estate_state }}" required="required" />
                    </div>
                    
                    <div class="form-group">
                        <label for="estate_website">Website</label>
                        <span class="label label-default pull-right">Optional</span>
                        <input type="text" class="form-control" id="estate_website" name="estate_website" value="{{ $item->estate_website }}" />
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                    </div>
        	</div>
        </div>
        
    </div>
    
    <div class="col-md-4">
        <div class="widget">
            <header class="widget-header">
				<h4 class="widget-title">Profile</h4>
			</header>
			
            <hr class="widget-separator">
            
            <div class="widget-body">
                <div class="form-group">
                    <label for="estate_website">Profile</label>
                    <input type="file" class="form-control" id="estate_website" name="estate_website" value="{{ old('estate_website') }}" />
                </div>
            </div>
        </div>
        
        <div class="widget">
            <header class="widget-header">
				<h4 class="widget-title">Research</h4>
			</header>
            
            <hr class="widget-separator">
            
            <div class="widget-body">
                <span class="label label-default">something</span>
            </div>
			
            <hr class="widget-separator">
            
            <div class="widget-body">
                <div class="form-group">
                    <label for="estate_website">Research</label>
                    <input type="file" class="form-control" id="estate_website" name="estate_website" value="{{ old('estate_website') }}" />
                </div>
            </div>
        </div>
        
        <div class="widget">
            <header class="widget-header">
				<h4 class="widget-title">Map</h4>
			</header>
			
            <hr class="widget-separator">
            
            <div class="widget-body">
                <div class="form-group">
                    <label for="estate_website">Map</label>
                    <input type="file" class="form-control" id="estate_website" name="estate_website" value="{{ old('estate_website') }}" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
