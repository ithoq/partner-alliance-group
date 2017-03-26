@extends('layouts.panel.panel-default')
@section('page-title', 'Manage [NAME]s')

@section('page-css')

    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
    
@endsection

@section('page-scripts')

    <!-- DataTables -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    
    <!-- DataTables Initialization -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('table').dataTable({
                pageLength: 25,
                responsive: true,
            });   
        });
    </script>    

@endsection

@section('page-content')
<div class="m-b-xl">
	<h1 style="font-size: 48px;">[NAME]
	    <span class="pull-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                <i class="fa fa-plus-circle"></i> Add [NAME]
            </button>
	    </span>
	</h1>
	
	<h4>View and manage your [NAME] from this page.</h4>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="widget">
        	<hr class="widget-separator">
        	<div class="widget-body">
        	    <div class="table-responsive">
        	        <table class="table table-hover">
        	            <thead>
        	                <tr>
        	                    <th>ID</th>
                                <th class="text-center">Action</th>
        	                </tr>
        	            </thead>
        	            <tbody>
        	                @foreach($items as $item)
        		                <tr class="text-color @if($item->id == 1) warning @endif">
        		                    <td><span class="label label-default">{{ $item->id }}</span></td>
                                    <td align="center">
                                        <a href="{{ route('estates.edit', ['id' => $item->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
        		                </tr>
        	                @endforeach
        	            </tbody>
        	        </table>
        	    </div>
        	</div>
        </div>        
    </div>
</div>

<!-- Modal -->
<div id="modal" class="modal fade" role="dialog">
    <form action="UPDATE ROUTE" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog">
            
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