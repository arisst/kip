@extends('layout')
<?php 
if($act=='add')
{
	$head = 'Add User';
	$pswd_placeholder = 'Password';
}
else if('edit'==$act)
{
	$head = 'Edit '.$user->name;
	$pswd_placeholder = '(Unchanged)';
}
else if('profile'==$act)
{
	$head = 'My Profile';
	$pswd_placeholder = 'Password';
}
?>
@section('title') {{$head}} @stop
@section('content')


<div class="panel panel-primary">
  <div class="panel-heading">{{ $head }}</div>
  <div class="panel-body">
  	@if('profile'!=$act)
		@include('action', array('p' => 'User', 'l'=>'admin.users', 'a'=>'active'))
	@endif
  </div>
	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif
@if('add'==$act)
	{{ Form::open(array('route'=>'admin.users.store', 'class'=>'form-horizontal')) }}
@elseif('profile'==$act)
	{{ Form::model($profile, array('route' => 'admin-profile-submit', 'method' => 'POST', 'class'=>'form-horizontal')) }}
@elseif('edit'==$act)
	{{ Form::model($user, array('route' => array('admin.users.update', $user->id), 'method' => 'PUT', 'class'=>'form-horizontal')) }}
@endif

	<div class="form-group">
		{{ Form::label('name', 'Nama Lengkap', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('name', Input::old('name'), array('class'=>'form-control input-sm', 'id'=>'name', 'placeholder'=>'Nama Lengkap', 'required', 'autofocus')) }}
		<span class="help-block alert-danger">{{ $errors->first('name') }}</span>
		</div>
	</div>

@if('profile'!=$act)
	<div class="form-group">
		{{ Form::label('level', 'Level', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::select('level', array(''=>'--Pilih--', '1'=>'Root', '2'=>'Admin', '3'=>'Guest'), Input::old('level'), array('class'=>'form-control input-sm', 'id'=>'level', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('level') }}</span>
		</div>
	</div>
@else
	{{ Form::hidden('id', Auth::user()->id) }}
@endif

	<div class="form-group">
	{{ Form::label('email', 'Email', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('email', Input::old('email'), array('class'=>'form-control input-sm', 'id'=>'email', 'placeholder'=>'Email', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('email') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('password', 'Password', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::password('password', array('class'=>'form-control input-sm', 'id'=>'password', 'placeholder'=>$pswd_placeholder)) }}
			<span class="help-block alert-danger">{{ $errors->first('password') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('passconf', 'Password Confirmation', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::password('passconf', array('class'=>'form-control input-sm', 'id'=>'passconf', 'placeholder'=>$pswd_placeholder)) }}
			<span class="help-block alert-danger">{{ $errors->first('passconf') }}</span>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2">
			<button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Submit</button>
		</div>
	</div>

	{{ Form::close() }}
</div>
@stop