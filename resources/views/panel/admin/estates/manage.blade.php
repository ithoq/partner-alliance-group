@extends('layouts.panel.panel-default')
@section('page-title', 'Manage Estates')

@section('page-css')

    <style>
    .form-inline .btn {
        height: auto !important;
    }        
    </style>
    
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

@endsection

@section('page-scripts')

    <!-- DataTables -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    
    <!-- DataTables Initialization -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').dataTable({
                pageLength: 25,
                responsive: true,
            });   
        });
    </script>    
    
    <!-- Sweet Alert -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    
    <!-- Sweet Alert Initialization -->
    <script type="text/javascript">
    $(document).ready(function() {
        
        $('.confirm').bind('click', function(e) {
           
            e.preventDefault();
            $('#form').append('<input type="hidden" name="id" value="' + $(this).val() + '" />');            
            
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this once deleted!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                showLoaderOnConfirm: true,
                closeOnConfirm: false
            },
            function(){
                setTimeout($('#form').submit(), 3000);
            });
            
        });
        
    });
    </script>

@endsection

@section('page-content')
<div class="m-b-xl">
	<h1 style="font-size: 48px;">Estates
	    <span class="pull-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                <i class="fa fa-plus-circle"></i> Add Estate
            </button>
	    </span>
	</h1>
	
	<h4>View and manage your estates from this page.</h4>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <form id="form" action="{{ route('estates.delete') }}" method="POST">
                
                <!-- Hidden Fields -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    
            	<hr class="widget-separator">
            	<div class="widget-body">
            	    <table id="dataTable" class="table table-hover">
            	        <thead>
            	            <tr>
            	                <th>ID</th>
                        		<th>Name</th>
                                <th>Address</th>
                                <th>Suburb</th>
                                <th>State</th>
                                <th>Website</th>
                                <th>Profile</th>
                                <th>Research</th>
                                <th>Map</th>
                                <th>Visibility</th>
                                <th class="text-center">Action</th>
            	            </tr>
            	        </thead>
            	        <tbody>
            	            @foreach($items as $item)
            		            <tr class="text-color @if($item->id == 1) warning @endif">
            		                <td><span class="label label-default">{{ $item->id }}</span></td>
                                    <td>{{ $item->estate_name }}</td>
                                    <td>{{ $item->estate_address }}</td>
                                    <td>{{ $item->estate_suburb }}</td>
                                    <td>{{ $item->estate_state }}</td>
                                    
                                    <td>
                                        @if($item->estate_website == 'Unavailable' || $item->estate_website == '')
                                            <a href="#" class="btn btn-default btn-xs disabled"><i class="fa fa-times-circle"></i> Visit Website</a>
                                        @else
                                            <a href="{{ $item->estate_website }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-link"></i> Visit Website</a>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @if($item->estate_profile == 'Unavailable')
                                            <a href="#" class="btn btn-default btn-xs disabled" disabled="disabled"><i class="fa fa-times-circle"></i> Download</a>
                                        @else
                                            <a href="{{ asset('/upload/estates/'.$item->id.'/'.$item->estate_profile) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-download"></i> Download</a>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @if($item->estate_research == 'Unavailable')
                                            <a href="#" class="btn btn-default btn-xs disabled" disabled="disabled"><i class="fa fa-times-circle"></i> Download</a>
                                        @else
                                            <a href="{{ asset('/upload/estates/'.$item->id.'/'.$item->estate_research) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-download"></i> Download</a>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @if($item->estate_map == 'Unavailable' || $item->estate_map == '')
                                            <a href="#" class="btn btn-default btn-xs disabled"><i class="fa fa-times-circle"></i> View Map</a>
                                        @else
                                            <a href="{{ $item->estate_map }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-map-marker"></i> View Map</a>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @if($item->is_published)
                                            <span class="label label-success">Published</span>
                                        @else
                                            <span class="label label-default">Draft</span>
                                        @endif
                                    </td>
                                    
                                    <td align="center" style="white-space:nowrap;">
                                        <a href="{{ route('estates.edit', ['id' => $item->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger btn-xs confirm" name="id" value="{{ $item->id }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
            		            </tr>
            	            @endforeach
            	        </tbody>
            	    </table>
            	</div><!-- .widget-body -->
        	</form>
        </div>        
    </div>
</div>

<!-- Modal -->
<div id="modal" class="modal fade" role="dialog">
    <form action="{{ route('estates.add') }}" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Estate</h4>
                </div>
                
                <div class="modal-body">
                    <!-- Hidden Fields -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    
                    <!-- Form Fields -->
                    <div class="form-group">
                        <label for="estate_name"><strong>Name</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <input type="text" class="form-control" id="estate_name" name="estate_name" value="{{ old('estate_name') }}" required="required" />
                    </div>
                    
                    <div class="form-group">
                        <label for="is_published"><strong>Visibility</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <select class="form-control" id="is_published" name="is_published">
                            <option value="0">Draft</option>
                            <option value="1">Published</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="estate_address"><strong>Address</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <input type="text" class="form-control" id="estate_address" name="estate_address" value="{{ old('estate_address') }}" required="required" />
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estate_suburb"><strong>Suburb</strong></label>
                                <span class="label label-danger pull-right text-uppercase">Required</span>
                                <input type="text" class="form-control" id="estate_suburb" name="estate_suburb" value="{{ old('estate_suburb') }}" required="required" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estate_state"><strong>State</strong></label>
                                <span class="label label-danger pull-right text-uppercase">Required</span>
                                <input type="text" class="form-control" id="estate_state" name="estate_state" value="{{ old('estate_state') }}" required="required" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estate_website"><strong>Website</strong></label>
                                <span class="label label-default pull-right text-uppercase">Optional</span>
                                <input type="text" class="form-control" id="estate_website" name="estate_website" value="{{ old('estate_website') }}" placeholder="Enter the full url (e.g. http://google.com)" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estate_map"><strong>Map</strong></label>
                                <span class="label label-default pull-right text-uppercase">Optional</span>
                                <input type="text" class="form-control" id="estate_map" name="estate_map" value="{{ old('estate_map') }}" placeholder="Enter the full url (e.g. http://google.com)" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estate_profile"><strong>Profile</strong></label>
                                <span class="label label-default pull-right text-uppercase">Optional</span>
                                <input type="file" class="form-control" id="estate_profile" name="estate_profile" value="{{ old('estate_profile') }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estate_research"><strong>Research</strong></label>
                                <span class="label label-default pull-right text-uppercase">Optional</span>
                                <input type="file" class="form-control" id="estate_research" name="estate_research" value="{{ old('estate_research') }}" />
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                </div>
            </div>
            
        </div>
    </form>
</div>
@endsection