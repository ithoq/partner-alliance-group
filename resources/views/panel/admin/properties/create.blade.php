@extends('layouts.panel.panel-default')
@section('page-title', 'Add Property')

@section('page-css')
@endsection

@section('page-scripts')
    
    <!-- Add -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#land_price, #house_price').on('input', function() {
            
            var land = parseInt($('#land_price').val());
            var house = parseInt($('#house_price').val());
            var total = land + house;
            
            $('#total_price').val(total);
            
        });
    });
    </script>

@endsection

@section('page-content')
<div class="m-b-xl">
	<h1 style="font-size: 48px;">Add new property
	    <span class="pull-right">
            <a href="{{ route('properties.manage') }}" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> Back To Manage Properties
            </a>
            <button type="submit" form="create" class="btn btn-primary">
                <i class="fa fa-save"></i> Save Property
            </button>
	    </span>
	</h1>
	
	<h4>Add a new entry to the properties table.</h4>
</div>

<div class="widget">
    <form id="create" action="{{ route('properties.add') }}" method="POST" enctype="multipart/form-data">
    <div class="m-b-lg nav-tabs-horizontal">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab"><i class="fa fa-info-circle"></i> Main Information</a></li>
            <li role="presentation"><a href="#tab-2" role="tab" data-toggle="tab"><i class="fa fa-image"></i> Images</a></li>
            <li role="presentation"><a href="#tab-4" role="tab" data-toggle="tab"><i class="fa fa-file"></i> Files</a></li>
        </ul>
        
        <div class="tab-content p-md">
            <div role="tabpanel" class="tab-pane in active fade" id="tab-1">
                @include('panel.admin.properties.fragments.info')
            </div>
            
            <div role="tabpanel" class="tab-pane fade" id="tab-2">
                @include('panel.admin.properties.fragments.images')
            </div>
            
            <div role="tabpanel" class="tab-pane fade" id="tab-4">
                @include('panel.admin.properties.fragments.files')
            </div>
        </div>
    </div>
    </form>
</div>
@endsection