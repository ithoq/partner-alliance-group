@extends('layouts.panel.panel-default')
@section('page-title', 'Manage Properties')

@section('page-css')

    <style>
        .form-inline .btn {
            height: auto !important;
        }        
        
        /*
        body.menubar-top .app-main {
            padding: 30px;
        }
        */
        
        .table th {
            font-size: 10px;
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
	<h1 style="font-size: 48px;">Properties
	    <span class="pull-right">
            <a href="{{ route('properties.create') }}" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i> Add Property
            </a>
	    </span>
	</h1>
	
	<h4>View and manage your Properties from this page.</h4>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <form id="form" action="{{ route('properties.delete') }}" method="POST">
            	<hr class="widget-separator">
            	<div class="widget-body table-responsive">
        	        <table id="dataTable" class="table table-hover table-bordered table-condensed" style="font-size: 12px !important;">
        	            <thead>
        	                <tr>
        	                    <th>ID</th>
        	                    <th>Estate</th>
        	                    <th>Lot No.</th>
        	                    <th>Street</th>
        	                    <th>Suburb</th>
        	                    <th>Price</th>
        	                    <th>House Design</th>
        	                    <th>Size (sqm)</th>
        	                    <th>Land (sqm)</th>
        	                    <th>Bed</th>
        	                    <th>Bath</th>
        	                    <th>Car</th>
        	                    <th>Titled</th>
        	                    <th>Status</th>
                                <th class="text-center">Action</th>
        	                </tr>
        	            </thead>
        	            <tbody>
        	                @foreach($items as $item)
                                <tr class="text-color @if($item->id == 1) warning @endif">
                                    <td><span class="label label-default">{{ $item->id }}</span></td>
                                    
                                    <td>{{ $item->estate_name }}</td>
                                    <td>{{ $item->property_lot_number }}</td>
                                    <td>{{ $item->property_street }}</td>
                                    <td>{{ $item->estate_suburb }}</td>
                                    <td>{{ $item->property_price }}</td>
                                    <td>{{ $item->property_design }}</td>
                                    <td>{{ $item->property_size }}</td>
                                    <td>{{ $item->property_land }}</td>
                                    <td>{{ $item->property_bed }}</td>
                                    <td>{{ $item->property_bath }}</td>
                                    <td>{{ $item->property_car }}</td>
                                    <td>{{ $item->property_titled }}</td>
                                    
                                    <!-- Property Status -->
                                    <td>
                                        
                                        @if($item->property_status == 'available')
                                            <span class="label label-success">{{ ucfirst($item->property_status) }}</span>    
                                        @elseif($item->property_status == 'reserved')
                                            <span class="label label-info">{{ ucfirst($item->property_status) }}</span>
                                        @elseif($item->property_status == 'signed')
                                            <span class="label label-warning">{{ ucfirst($item->property_status) }}</span>
                                        @elseif($item->property_status == 'sold')
                                            <span class="label label-danger">{{ ucfirst($item->property_status) }}</span>
                                        @else
                                            <span class="label label-default">Unavailable</span>
                                        @endif
                                        
                                        <br />
                                        
                	                    @if($item->is_published)
                	                        <span class="label label-success">Published</span>
                	                    @else
                	                        <span class="label label-default">Unpublished</span>
                	                    @endif
                                        
                                    </td>
                                    
                                    <td align="center" style="white-space:nowrap;">
                                        <a href="{{ route('estates.edit', ['id' => $item->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </td>
        		                </tr>
        	                @endforeach
        	            </tbody>
        	        </table>
        	    </div>
            </form>
        </div>        
    </div>
</div>
@endsection