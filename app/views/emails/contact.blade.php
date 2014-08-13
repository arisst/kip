@extends('emails.layout')

@section('header')
    {{HTML::linkRoute('admin-index', 'Admin Dashboard')}}
@stop

@section('title')
Pesan Baru
@stop

@section('description')
Halo admin {{{Config::get('setting.site_name')}}}, <br>
Anda mendapat pesan dari {{{$nama}}} - {{{$email}}}:<br>

<br>
{{{$pesan}}}

<br><br>
Dikirim oleh<br>
Sistem {{{Config::get('setting.site_name')}}}
@stop