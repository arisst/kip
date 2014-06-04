@extends('layout')
<?php 
if($act=='add')
{
	$head = 'Add Information';
}
else if('edit'==$act)
{
	$head = 'Edit '.$informations->title;
}
?>
@section('title') {{$head}} @stop
@section('content')


<div class="panel panel-primary">
  <div class="panel-heading">{{ $head }}</div>
  <div class="panel-body">
  	@if('profile'!=$act)
		@include('action', array('p' => 'Information', 'l'=>'admin.informations', 'a'=>'active'))
	@endif
  </div>
	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif
@if('add'==$act)
	{{ Form::open(array('route'=>'admin.informations.store', 'files'=>true, 'class'=>'form-horizontal')) }}
@elseif('edit'==$act)
	{{ Form::model($informations, array('route' => array('admin.informations.update', $informations->id), 'method' => 'PUT', 'files'=>true, 'class'=>'form-horizontal')) }}
@endif

	<div class="form-group">
		{{ Form::label('category', 'Category', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::select('category', array(''=>'-- Select --', 'Berkala'=>'Berkala', 'Sertamerta'=>'Sertamerta', 'Setiap saat'=>'Setiap saat','Dikecualikan'=>'Dikecualikan'), Input::old('category'), array('class'=>'form-control input-sm', 'id'=>'category', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('category') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('title', 'Title', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('title', Input::old('title'), array('class'=>'form-control input-sm', 'id'=>'title', 'placeholder'=>'Title', 'required')) }}
		<span class="help-block alert-danger">{{ $errors->first('title') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::textarea('description', Input::old('description'), array('class'=>'form-control input-sm', 'id'=>'description', 'placeholder'=>'Description', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('description') }}</span>
		</div>
	</div>

@if ('edit'==$act)
	<div class="form-group">
		{{ Form::label('attachment', 'Attachment', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::file('attachment', array('class'=>'form-control input-sm', 'id'=>'attachment')) }}
			{{ Form::checkbox('removedFile', '1', false, array('id'=>'remove')).' '.Form::label('remove', 'Remove File?') }}
			<span class="help-block alert-danger">{{ $errors->first('attachment') }}</span>
		</div>
	</div>
@else
	<div class="form-group">
		{{ Form::label('attachment', 'Attachment', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::file('attachment', array('class'=>'form-control input-sm', 'id'=>'attachment')) }}
			<span class="help-block alert-danger">{{ $errors->first('attachment') }}</span>
		</div>
	</div>
@endif

	<div class="form-group">
		<div class="col-sm-offset-2">
			<button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Submit</button>
		</div>
	</div>

	{{ Form::close() }}
</div>
@stop