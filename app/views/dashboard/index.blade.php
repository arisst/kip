@extends('layout')
@section('title')Dashboard Index @stop

@section('content')

	<div class="jumbotron">
	  <h1>Welcome, Admin</h1>
	  {{HTML::ul(array('ID : '.Auth::user()->id, 'Username : '.Auth::user()->username, 'Nama : '.Auth::user()->nama, 'Level : '.Auth::user()->level, 'Password : '.Auth::user()->password))}}
	  <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
	</div>

@stop