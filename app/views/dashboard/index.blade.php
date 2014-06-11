@extends('layout')
@section('title')Dashboard @stop

@section('content')

	<div class="jumbotron">
	  <h1>Welcome, Admin</h1>
	  {{HTML::ul(array('ID : '.Auth::user()->id, 'Username : '.Auth::user()->email, 'Nama : '.Auth::user()->name))}}
	  <!-- <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p> -->
	</div>

@stop