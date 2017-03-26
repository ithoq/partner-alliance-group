@extends('layouts.panel.panel-default')
@section('page-title', 'Edit News')

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
	<h1 style="font-size: 48px;">Edit News
	    <span class="pull-right">
            <a href="{{ route('news.manage') }}" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Back To Manage News
            </a>
	    </span>
	</h1>
	
	<h4>You are currently editing the news titled "{{ $item->news_title }}".</h4>
</div>

<div class="row">
    <form action="{{ route('news.update') }}" method="POST">
        	        
        <!-- Hidden Fields -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $item->id }}" />
        <input type="hidden" name="news_author" value="{{ Auth::user()->present()->id }}" />
        
        <div class="col-md-3">
            <div class="widget">
                <header class="widget-header">
    				<h4 class="widget-title">Main Information</h4>
    			</header>
    			
            	<hr class="widget-separator">
            	
            	<div class="widget-body">
            	    
                    <!-- Form Fields -->
                    <div class="form-group">
                        <label for="news_title"><strong>Title</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <input type="text" class="form-control" id="news_title" name="news_title" value="{{ $item->news_title }}" placeholder="News title" />
                    </div>
                    
                    <div class="form-group">
                        <label for="news_category"><strong>Category</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <select class="form-control" id="news_category" name="news_category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($item->news_category == $category->id) selected @endif>{{ $category->category_name }}</option>
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
                    
            	</div>
            </div>
        </div>
    
        <div class="col-md-9">
            <div class="widget">
                <header class="widget-header">
    				<h4 class="widget-title">Content</h4>
    			</header>
    			
            	<hr class="widget-separator">
            	
            	<div class="widget-body">
                    
                    <!-- Form Fields -->
                    <div class="form-group">
                        <label for="news_content"><strong>News Content</strong></label>
                        <span class="label label-danger pull-right text-uppercase">Required</span>
                        <textarea id="editor" class="form-control" id="news_content" name="news_content" style="height:300px;resize: none">{{ $item->news_content }}</textarea>
                    </div>
                    
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                    </div>
                    
            	</div>
            </div>
        </div>
        
    </form>
</div>
@endsection
