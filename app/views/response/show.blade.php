@extends('layout')
@section('title')
	Show Response
@stop

@section('content')

@foreach ($response as $response)
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Detail Response</div>
  <div class="panel-body">
 <a href="{{ URL::route('admin.responses.index') }}" type="button" class="btn btn-default hidden-print btn-sm {{ (Route::currentRouteName()=='admin.responses.index') ? 'active' : '' }}">
  <span class="glyphicon glyphicon-th-list"></span> List Response
</a>

<br><br>

<div class="col-md-12">
    <ul class="list-group">
      <li class="list-group-item list-group-item-info"><b>Detail Response</b></li>
      <li class="list-group-item"> <blockquote> <p> {{{$response->title}}} </p> <footer>{{{$response->description}}}</footer></blockquote></li>
      <li class="list-group-item">Tanggal : <b>{{$response->added_on}}</b></li>
      <li class="list-group-item">Status : <b> 
      @if('0'==$response->status) <span class="label label-danger"> {{'Pending'}} </span>
      @elseif('1'==$response->status) <span class="label label-success"> {{'Accepted'}} </span>
      @elseif('2'==$response->status) <span class="label label-warning"> {{'Rejected'}} </span>
      @endif
      </b>
      </li>
    </ul>
</div>
<!-- <div class="col-md-6">
    <ul class="list-group">
    
      <li class="list-group-item list-group-item-info"><b>Detail User</b></li>
      <li class="list-group-item">Nama : <b>{{$response->name}}</b></li>
      <li class="list-group-item">Email : <b>{{$response->email}}</b></li>
      <li class="list-group-item">Nomor KTP : <b>{{$response->ktp}}</b></li>
      <li class="list-group-item">Alamat : <blockquote> <footer> {{$response->address}}</footer></blockquote></li>
      <li class="list-group-item">Telepon : <b>{{$response->phone}}</b></li>
    
    </ul>
</div> -->
  </div>
</div>
@endforeach
@stop
