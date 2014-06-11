@extends('layout')
@section('title')
	List Response
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Response List</div>
  <div class="panel-body">

<a href="{{ URL::route('admin.requests.index') }}" type="button" class="btn btn-default hidden-print btn-sm {{ (Route::currentRouteName()=='admin.responses.index') ? 'active' : '' }}">
  <span class="glyphicon glyphicon-th-list"></span> List Response
</a>

    {{ Form::open(array('route'=>'admin.responses.index', 'method'=>'get', 'class'=>'navbar-form navbar-right', 'role'=>'form')) }}
    <div class="form-group">
	    {{ Form::text('search', (isset($keyword)) ? $keyword : '', array('class'=>'form-control input-sm', 'placeholder'=>'Search...','autofocus'))}}
	    <a href="{{ URL::route('admin.responses.index') }}" type="button" class="btn hidden-print btn-default btn-sm">
		  <span class="glyphicon glyphicon-refresh"></span> Reset
		</a>
    </div>
    {{ Form::close() }}
  </div>
	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif

	<table class="table table-condensed table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Subject</th>
				<th>Description</th>
				<th>Status</th>
				<th>Tanggal</th>
				<th class="hidden-print">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=$responses->getFrom(); ?>
			@foreach($responses as $key => $value)
				<tr>
					<td>{{ $i }}</td>
					<td>{{{ $value->name }}}</td>
					<td>{{{ $value->title }}}</td>
					<td>{{{ Str::limit($value->description,20)}}} </td>
					<td>
						@if ($value->status == '0') <span class="label label-danger"> Pending </span>
						@elseif ($value->status == '1') <span class="label label-success"> Accept </span>
						@elseif ($value->status == '2') <span class="label label-warning"> Reject </span>
						@else Unknown
						@endif
					</td>
					<td>{{$value->added_on}}</td>
					<td class="hidden-print">
						{{ Form::open(array('route' => array('admin.responses.destroy', $value->id), 'style' => 'margin-bottom:0')) }}
							<a class="btn btn-xs btn-success" href="{{ URL::route('admin.responses.show', $value->id) }}">
								<span class="glyphicon glyphicon-eye-open"></span>View
							</a>
							{{ Form::hidden('_method', 'DELETE') }}
							<button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Delete data ini tidak akan mengubah status request!. Delete this data?');">
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
	{{ $responses->appends(array('search' => $keyword))->links() }}
	@else
	{{ $responses->links() }}
	@endif
	</center>
</div>

@stop