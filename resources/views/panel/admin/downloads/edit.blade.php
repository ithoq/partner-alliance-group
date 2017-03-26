@extends('layouts.panel.panel-default')
@section('page-title', 'Edit Download')

@section('page-css')

    <!-- Editor -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.min.css" />
    
@endsection

@section('page-scripts')
    <!-- Editor -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.all.min.js"></script>
    
    <!-- Editor Initialization -->
    <script type="text/javascript">
        $('#editor').wysihtml5();     
    </script>
@endsection

@section('page-content')
<!-- Page Information -->
<div class="m-b-xl">
	<h1 style="font-size: 48px;">Edit Download
	    <span class="pull-right">
            <a href="{{ route('downloads.manage') }}" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Back To Manage News
            </a>
	    </span>
	</h1>
	
	<h4>You are currently editing the download named "{{ $item->download_name }}".</h4>
</div>

<div class="row">
    <form action="{{ route('downloads.update') }}" method="POST" enctype="multipart/form-data">
        	        
        <!-- Hidden Fields -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $item->id }}" />
        
        <div class="col-md-3">
            <div class="widget">
                <header class="widget-header">
    				<h4 class="widget-title">Current File Information</h4>
    			</header>
    			
            	<hr class="widget-separator">
            	
            	<div class="widget-body">
            	    <a href="{{ asset('/upload/downloads/'.$item->id.'/'.$item->download_file) }}" target="_blank" class="btn btn-default btn-block"><i class="fa fa-file"></i> {{ $item->download_file }} <Br /> <small>(Click To View)</small></a>
            	</div>
    			
            	<hr class="widget-separator">
            	
            	<div class="widget-body">
                    <div class="form-group">
                        <label for="download_file"><strong>Upload New File</strong></label>
                        <span class="label label-default pull-right text-uppercase">Optional</span>
                        <input type="file" class="form-control" id="download_file" name="download_file" value="{{ old('download_file') }}" />
                    </div>
            	</div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="widget">
                <header class="widget-header">
    				<h4 class="widget-title">Main Information</h4>
    			</header>
    			
            	<hr class="widget-separator">
            	
            	<div class="widget-body">
            	    
                    <!-- Form Fields -->
                    <div class="form-group">
                        <label for="download_name"><strong>Name</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <input type="text" class="form-control" id="download_name" name="download_name" value="{{ $item->download_name }}" placeholder="Download name" required="required" />
                    </div>
                    
                    <div class="form-group">
                        <label for="download_desc"><strong>Description</strong></label>
                        <span class="label label-default pull-right text-uppercase">Optional</span>
                        <input type="text" class="form-control" id="download_desc" name="download_desc" value="{{ $item->download_desc }}" placeholder="Download description" />
                    </div>
                    
                    <div class="form-group">
                        <label for="download_type"><strong>Type</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <select class="form-control" id="download_type" name="download_type">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" @if($type->id == $item->download_type) selected @endif>{{ $type->type_name }}</option>
                            @endforeach
                        </select>
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
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                    </div>
                    
            	</div>
            </div>
        </div>
        
    </form>
</div>
@endsection
