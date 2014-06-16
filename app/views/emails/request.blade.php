@extends('emails.layout')

@section('header')
    {{HTML::linkRoute('admin-index', 'Admin Dashboard')}}
@stop

@section('title')
Request Baru
@stop

@section('description')
Halo admin {{{Config::get('setting.site_name')}}}, <br>
Request permintaan informasi dari {{{$name}}}:<br>

<br>
Untuk melihat detail request silahkan klik link berikut:<br>
<h3>{{HTML::link($link, 'Detail request')}}</h3> 

<br><br>
Dikirim oleh<br>
Sistem {{{Config::get('setting.site_name')}}}
@stop