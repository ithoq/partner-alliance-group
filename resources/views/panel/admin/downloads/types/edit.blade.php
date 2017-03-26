@extends('layouts.panel.panel-default')
@section('page-title', 'Edit Download Type')

@section('page-content')
<!-- Page Information -->
<div class="m-b-xl">
	<h1 style="font-size: 48px;">Edit Download
	    <span class="pull-right">
            <a href="{{ route('downloads.types.manage') }}" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Back To Manage News Categories
            </a>
	    </span>
	</h1>
	
	<h4>You are currently editing the download type named "{{ $item->type_name }}".</h4>
</div>

<div class="row">
    <div class="col-md-6">
        
        <div class="widget">
            <header class="widget-header">
				<h4 class="widget-title">Main Information</h4>
			</header>
			
        	<hr class="widget-separator">
        	
        	<div class="widget-body">
        	    <form action="{{ route('downloads.types.update') }}" method="POST">
        	        
                    <!-- Hidden Fields -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="id" value="{{ $item->id }}" />
                    
                    <!-- Form Fields -->
                    <div class="form-group">
                        <label for="type_name"><strong>Name</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <input type="text" class="form-control" id="" name="type_name" value="{{ $item->type_name }}" placeholder="Name your category (255 characters max)" />
                    </div>
                    
                    <div class="form-group">
                        <label for="type_desc"><strong>Description</strong></label>
                        <span class="label label-default pull-right text-uppercase">Optional</span>
                        <input type="text" class="form-control" id="" name="type_desc" value="{{ $item->type_desc }}" placeholder="Describe your category (255 characters max)" />
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                    </div>
                    
                </form>
        	</div>
        </div>
        
    </div>
</div>
@endsection
