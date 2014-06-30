@extends('layout')
@section('title')
	Show Request
@stop

@section('content')

@foreach ($request as $request)

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Detail Request</div>
  <div class="panel-body">
 <a href="{{ URL::route('admin.requests.index') }}" type="button" class="btn btn-default hidden-print btn-sm {{ (Route::currentRouteName()=='admin.requests.index') ? 'active' : '' }}">
  <span class="glyphicon glyphicon-th-list"></span> List Request
</a>
@if($request->status==0)
  <a href="{{ URL::route('admin.requests.show',$request->id).'?act=accept' }}" type="button" class="btn btn-success hidden-print btn-sm {{ (Input::get('act')=='accept') ? 'active' : '' }}">
    <span class="glyphicon glyphicon-ok"></span> Accept
  </a>
  <a href="{{ URL::route('admin.requests.show',$request->id).'?act=reject' }}" type="button" class="btn btn-warning hidden-print btn-sm {{ (Input::get('act')=='reject') ? 'active' : '' }}">
    <span class="glyphicon glyphicon-remove"></span> Reject
  </a>
  @if(Input::has('act'))
  <a href="{{ URL::previous() }}" type="button" class="btn btn-default hidden-print btn-sm">
    <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
  </a>
  @endif
@endif

<br><br>


<?php
  switch ($request->status) {
    case '0':
      $headerclass = 'list-group-item-danger';
      break;
    case '1':
      $headerclass = 'list-group-item-success';
      break;
    case '2':
      $headerclass = 'list-group-item-warning';
      break;
    default:
      $headerclass = '';
      break;
  }
?>

<div class="col-md-6">
    <ul class="list-group">
      <li class="list-group-item list-group-item-info"><b>Detail Request</b></li>
      <li class="list-group-item">Informasi : <b>{{$request->ititle}} 
      @if($request->ifile)
      {{HTML::link('uploads/'.$request->ifile,'File',array('target'=>'_blank'))}}
      @endif
      </b></li>
      <li class="list-group-item">Kategori : <b>{{{$request->icategory}}}</b>
      <li class="list-group-item"> <blockquote> <p> {{{$request->title}}} </p> <footer>{{{$request->description}}}</footer></blockquote></li>
      <li class="list-group-item">Tanggal : <b>{{$request->added_on}}</b></li>
      <li class="list-group-item list-group-item-info"><b>Detail User</b></li>
      <li class="list-group-item">Nama : <b>{{{$request->name}}}</b></li>
      <li class="list-group-item">Email : <b>{{{$request->email}}}</b></li>
      <li class="list-group-item">Nomor KTP : <b>{{$request->ktp}}</b></li>
      <li class="list-group-item">Alamat : <blockquote> <footer> {{{$request->address}}}</footer></blockquote></li>
      <li class="list-group-item">Telepon : <b>{{{$request->phone}}}</b></li>
    </ul>
</div>

@if(Input::has('act'))
<div class="col-md-6">
<ul class="list-group">
  {{ Form::open(array('route' => 'admin.responses.store', 'class'=>'form-horizontal')) }}
  {{ Form::hidden('request_id',$request->id) }}
  @if(Input::get('act')=='accept') {{Form::hidden('request_status','1')}} 
    <li class="list-group-item list-group-item-success"><b>Accept Respons Form</b></li>
  @elseif(Input::get('act')=='reject') {{Form::hidden('request_status','2')}}
    <li class="list-group-item list-group-item-warning"><b>Reject Respons Form</b></li>
  @endif
  <div class="form-group">
    {{ Form::label('title', 'Subject', array('class'=>'col-sm-2 control-label')) }}
    <div class="input-group col-xs-6">
      {{ Form::text('title', '', array('class'=>'form-control input-sm', 'id'=>'title', 'placeholder'=>'Subject', 'required', 'autofocus')) }}
    <span class="help-block alert-danger">{{ $errors->first('title') }}</span>
    </div>
  </div>

  <div class="form-group">
  {{ Form::label('description', 'Reason', array('class'=>'col-sm-2 control-label')) }}
    <div class="input-group col-xs-6">
      {{ Form::textarea('description', '', array('class'=>'form-control input-sm', 'id'=>'description', 'placeholder'=>'Reason', 'required')) }}
      <span class="help-block alert-danger">{{ $errors->first('description') }}</span>
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-offset-2">
      <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Submit</button>
    </div>
  </div>

  {{ Form::close() }}
</div>
@endif

@if($request->status!=0)
<div class="col-md-6">
    <ul class="list-group">
      <li class="list-group-item {{ $headerclass }}"><b>Detail Respon</b></li>
      <li class="list-group-item">Status : <b> 
      @if('0'==$request->status) <span class="label label-danger"> {{'Pending'}} </span>
      @elseif('1'==$request->status) <span class="label label-success"> {{'Accepted'}} </span>
      @elseif('2'==$request->status) <span class="label label-warning"> {{'Rejected'}} </span>
      @endif
      </b>
      </li>
      <li class="list-group-item"> <blockquote> <p> {{{$request->rtitle}}} </p> <footer>{{{$request->rdescription}}}</footer></blockquote></li>
      <li class="list-group-item">Oleh : <b>{{{$request->rname}}}</b></li>
      <li class="list-group-item">Tanggal : <b>{{$request->rtanggal}}</b></li>
    </ul>
</div>
@endif

@endforeach
@stop
