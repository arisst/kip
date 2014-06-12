@extends('layout')
@section('title')
	List Pages
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Pages List</div>
  <div class="panel-body">

	@include('action', array('p' => 'Pages', 'l'=>'admin.pages', 'a'=>'active'))

    {{ Form::open(array('route'=>'admin.pages.index', 'method'=>'get', 'class'=>'navbar-form navbar-right', 'role'=>'form')) }}
    <div class="form-group">
	    {{ Form::text('search', (isset($keyword)) ? $keyword : '', array('class'=>'form-control input-sm', 'placeholder'=>'Search...','autofocus'))}}
	    <a href="{{ URL::route('admin.pages.index') }}" type="button" class="btn hidden-print btn-default btn-sm">
		  <span class="glyphicon glyphicon-refresh"></span> Reset
		</a>
    </div>
    {{ Form::close() }}
  </div>
	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{{ Session::get('message') }}}
		</div>
	@endif

	<table class="table table-condensed table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Page</th>
				<th>Title</th>
				<th>Description</th>
				<th>Image</th>
				<th class="hidden-print">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=$pages->getFrom(); ?>
			@foreach($pages as $value)
				<tr>
					<td>{{{ $i }}}</td>
					<td>
						@if ($value->cat == 1) Prosedur
						@elseif ($value->cat == 2) FAQ
						@elseif ($value->cat == 3) Tentang
						@elseif ($value->cat == 4) Berita
						@else Unknown
						@endif
					</td>
					<td>{{{ Str::limit($value->title, 30, '...') }}}</td>
					<td>{{{ Str::limit($value->description, 50, '...') }}}</td>
					<!-- <td> @if($value->attachment) {{HTML::link('uploads/'.$value->attachment, 'download')}} @endif</td> -->
					<td>
						@if($value->attachment) 
						{{HTML::image('image/page/'.$value->slug.'/22/'.$value->attachment)}}
						@endif
					</td>
					<td class="hidden-print">
						{{ Form::open(array('route' => array('admin.pages.destroy',$value->id), 'style' => 'margin-bottom:0')) }}
							<a class="btn btn-xs btn-success" href="{{ URL::route('admin.pages.show',$value->id) }}">
								<span class="glyphicon glyphicon-eye-open"></span>View
							</a>
							<a class="btn btn-xs btn-info" href="{{ URL::route('admin.pages.edit',$value->id) }}">
								<span class="glyphicon glyphicon-edit"></span> Edit
							</a>
							
							{{ Form::hidden('_method', 'DELETE') }}
							<button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Delete this data?');">
								<span class="glyphicon glyphicon-trash"></span> Delete
							</button>
							
						{{ Form::close() }}
					</td>
				</tr>
				<?php $i++; ?>
			@endforeach
		</tbody>
	</table>
	<center class="hidden-print">
	@if(isset($keyword))
	{{ $pages->appends(array('search' => $keyword))->links() }}
	@else
	{{ $pages->links() }}
	@endif
	</center>
</div>

@stop