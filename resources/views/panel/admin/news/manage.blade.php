@extends('layouts.panel.panel-default')
@section('page-title', 'Manage News')

@section('page-css')
    <style>
    .form-inline .btn {
        height: auto !important;
    }        
    </style>
    
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    
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
	<h1 style="font-size: 48px;">News
	    <span class="pull-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                <i class="fa fa-plus-circle"></i> Add News
            </button>
	    </span>
	</h1>
	
	<h4>View and manage news from this page.</h4>
</div>

<!-- Table -->
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <form id="form" action="{{ route('news.delete') }}" method="POST">
                
                <!-- Hidden Fields -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                
                <hr class="widget-separator">
                <div class="widget-body">
                    <table id="dataTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Published</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                	            <tr class="text-color @if($item->id == 1) warning @endif">
                	                <td><span class="label label-default">{{ $item->id }}</span></td>
                	                <td>{{ $item->news_title }}</td>
                	                <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                	                <td><span class="label label-default">{{ $item->news_category }}</span></td>
                	                
                	                <td>
                	                    @if($item->is_published)
                	                        <span class="label label-success">Published</span>
                	                    @else
                	                        <span class="label label-default">Draft</span>
                	                    @endif
                	                </td>
                	                
                                    <td align="center" style="white-space:nowrap;">
                                        <a href="{{ route('news.edit', ['id' => $item->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger btn-xs confirm" name="id" value="{{ $item->id }}"><i class="fa fa-trash"></i> Delete</button>
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
    <form action="{{ route('news.add') }}" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add News</h4>
                </div>
                
                <div class="modal-body">
                    
                    <!-- Hidden Fields -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="news_author" value="{{ Auth::user()->present()->id }}" />
                    
                    <!-- Form Fields -->
                    <div class="form-group">
                        <label for="news_title"><strong>Title</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <input type="text" class="form-control" id="news_title" name="news_title" value="{{ old('news_title') }}" placeholder="News title" />
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="news_category"><strong>Category</strong></label>
                                <span class="label label-danger pull-right text-uppercase">Required</span>
                                <select class="form-control" id="news_category" name="news_category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="is_published"><strong>Visibility</strong></label>
                                <span class="label label-danger pull-right text-uppercase">Required</span>
                                <select class="form-control" id="is_published" name="is_published">
                                    <option value="0">Draft</option>
                                    <option value="1">Published</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="news_content"><strong>Content</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <textarea id="editor" class="form-control" id="news_content" name="news_content" style="height:300px;resize: none">{{ old('news_content') }}</textarea>
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