@extends('layout')
@section('title')
	Show User
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Show {{{$user->name}}}</div>
  <div class="panel-body">
  	@include('action', array('p' => 'User', 'l'=>'admin.users', 'a'=>'active'))
<br><br>
  	<ul class="list-group">
    	<li class="list-group-item">User ID : <b>{{$user->id}}</b></li>
    	<li class="list-group-item">Nama : <b>{{{$user->name}}}</b></li>
    	<li class="list-group-item">Email : <b>{{{$user->email}}}</b></li>
    	<li class="list-group-item">Phone : <b>{{{$user->phone}}}</b></li>
    	<li class="list-group-item">No. KTP : <b>{{{$user->ktp}}}</b></li>
    	<li class="list-group-item">User Level : <b> @if ($user->level == '1') Root
														@elseif ($user->level == '2') Admin
														@elseif ($user->level == '3') Guest
														@else Unknown
														@endif
													</b></li>
    	<li class="list-group-item">Status : <b> @if ($user->status == '0') Pending
														@elseif ($user->status == '1') Active
														@elseif ($user->status == '2') Blocked
														@else Unknown
														@endif</b></li>
    	<li class="list-group-item">Created : <b>{{$user->created_at}}</b></li>
    	<li class="list-group-item">Updated : <b>{{$user->updated_at}}</b></li>
  	</ul>

  </div>
</div>
@stop