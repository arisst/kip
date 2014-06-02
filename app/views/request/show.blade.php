@extends('layout')
@section('title')
	Show Request
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Show</div>
  <div class="panel-body">
  <a href="{{ URL::to('admin/requests') }}" type="button" class="btn btn-default hidden-print btn-sm {{ Request::is('admin/requests') ? 'active' : '' }}">
  <span class="glyphicon glyphicon-th-list"></span> List Request
</a>
<br><br>
  	<ul class="list-group">
    @foreach ($request as $request)
    	<li class="list-group-item">Request ID : <b>{{$request->id}}</b></li>
    	<li class="list-group-item">Nama : <b>{{$request->name}}</b></li>
    	<li class="list-group-item">Subjek : <b>{{$request->title}}</b></li>
    	<li class="list-group-item">Deskripsi : <blockquote>{{$request->description}}</blockquote></li>
    	<li class="list-group-item">Tanggal : <b>{{$request->added_on}}</b></li>
    	<li class="list-group-item">Status : <b> 
      {{$request->status}}
      </b>
      </li>
      @endforeach
    </ul>

  </div>
</div>
@stop
