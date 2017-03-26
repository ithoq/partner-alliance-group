@extends('layouts.panel.panel-default')
@section('page-title', 'Manage Download Types')

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

<!-- Page Information -->
<div class="m-b-xl">
	<h1 style="font-size: 48px;">Download Types
	    <span class="pull-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                <i class="fa fa-plus-circle"></i> Add Download Type
            </button>
	    </span>
	</h1>
	
	<h4>View and manage your download types from this page.</h4>
</div>

<!-- Table -->
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <form id="form" action="{{ route('downloads.types.delete') }}" method="POST">
                
                <!-- Hidden Fields -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                
                <hr class="widget-separator">
                <div class="widget-body">
                    <table id="dataTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                	            <tr class="text-color @if($item->id == 1) warning @endif">
                	                <td><span class="label label-default">{{ $item->id }}</span></td>
                	                <td>{{ $item->type_name }}</td>
                	                <td>{{ $item->type_desc }}</td>
                                    <td align="center">
                                        <a href="{{ route('downloads.types.edit', ['id' => $item->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="submit" id="d{{ $item->id }}" class="btn btn-danger btn-xs confirm" name="id" value="{{ $item->id }}"><i class="fa fa-trash"></i> Delete</button>
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

<!-- Modal -->
<div id="modal" class="modal fade" role="dialog">
    <form action="{{ route('downloads.types.add') }}" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Download Type</h4>
                </div>
                
                <div class="modal-body">
                    
                    <!-- Hidden Fields -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    
                    <!-- Form Fields -->
                    <div class="form-group">
                        <label for="type_name"><strong>Name</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <input type="text" class="form-control" id="" name="type_name" value="{{ old('type_name') }}" placeholder="Name your category (255 characters max)" />
                    </div>
                    
                    <div class="form-group">
                        <label for="type_desc"><strong>Description</strong></label>
                        <span class="label label-default pull-right text-uppercase">Optional</span>
                        <input type="text" class="form-control" id="" name="type_desc" value="{{ old('type_desc') }}" placeholder="Describe your category (255 characters max)" />
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