@extends('layout')

@section('title') Site Configuration @stop
@section('content')


<div class="panel panel-primary">
  <div class="panel-heading">Site Configuration</div>
  <div class="panel-body">
  	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif
  </div>

	{{ Form::open(array('route'=>'admin-setting-update', 'class'=>'form-horizontal')) }}

	<div class="form-group">
		{{ Form::label('site_name', 'Nama Website', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('site_name', Config::get('setting.site_name'), array('class'=>'form-control input-sm', 'id'=>'site_name', 'placeholder'=>'Nama Website', 'required')) }}
		<span class="help-block">{{ $errors->first('site_name') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('site_theme', 'Theme', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
		<?php
			$themes_dir = array();
			foreach (File::directories(public_path().'/themes') as $key) {
				$th = explode('/', $key);
				$themes_dir[end($th)]=end($th);
			}
		?>
			{{ Form::select('site_theme', $themes_dir/*array('default'=>'default')*/, Config::get('setting.site_theme'), array('class'=>'form-control input-sm', 'id'=>'site_theme', 'required')) }}
			<span class="help-block">{{ $errors->first('site_theme') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('per_page', 'List Perpage', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('per_page', Config::get('setting.per_page'), array('class'=>'form-control input-sm', 'id'=>'per_page', 'placeholder'=>'List Perpage', 'required')) }}
			<span class="help-block">{{ $errors->first('per_page') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('mail_driver', 'Mail Driver', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('mail_driver', Config::get('setting.mail_driver'), array('class'=>'form-control input-sm', 'id'=>'mail_driver', 'placeholder'=>'Mail Driver')) }}
			<span class="help-block">{{ $errors->first('mail_driver') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('mail_port', 'Mail Port', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('mail_port', Config::get('setting.mail_port'), array('class'=>'form-control input-sm', 'id'=>'mail_port', 'placeholder'=>'Mail Port')) }}
			<span class="help-block">{{ $errors->first('mail_port') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('mail_host', 'Mail Host', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('mail_host', Config::get('setting.mail_host'), array('class'=>'form-control input-sm', 'id'=>'mail_host', 'placeholder'=>'Mail Host')) }}
			<span class="help-block">{{ $errors->first('mail_host') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('mail_username', 'Mail Username', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('mail_username', Config::get('setting.mail_username'), array('class'=>'form-control input-sm', 'id'=>'mail_username', 'placeholder'=>'Mail Username')) }}
			<span class="help-block">{{ $errors->first('mail_username') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('mail_password', 'Mail Password', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::input('password','mail_password', Config::get('setting.mail_password'), array('class'=>'form-control input-sm', 'id'=>'mail_password', 'placeholder'=>'Mail Password')) }}
			
			<span class="help-block">{{ $errors->first('mail_password') }}</span>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-offset-2">
			<button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
		</div>
	</div>

	{{ Form::close() }}
</div>
{{HTML::script('assets/bootstrap/js/password.js')}}
<script>
    $(function() {
        $('#mail_password').password().on('show.bs.password', function(e) {
            $('#eventLog').text('On show event');
            $('#methods').prop('checked', true);
        }).on('hide.bs.password', function(e) {
                    $('#eventLog').text('On hide event');
                    $('#methods').prop('checked', false);
                });
        $('#methods').click(function() {
            $('#password').password('toggle');
        });
    });
</script>

@stop