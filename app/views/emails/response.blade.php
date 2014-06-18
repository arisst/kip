@extends('emails.layout')

@section('header')
    {{HTML::linkRoute('user-request-list', 'My Request')}} |
	{{HTML::linkRoute('user-profile-form', 'Profile')}} 
@stop

@section('title')
Respon dari admin
@stop

@section('description')
Halo {{{$name}}}, <br>
Permohonan informasi anda direspon oleh admin,<br>

<br>
Untuk melihat detail respon silahkan klik link berikut:<br>
<h3>{{HTML::link($link, 'Detail respon')}}</h3> 

<br><br>
Hormat kami,<br><br>
{{{Config::get('setting.site_name')}}}
@stop