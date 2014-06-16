@extends('emails.layout')

@section('header')
    {{HTML::linkRoute('user-request-list', 'My Request')}} |
	{{HTML::linkRoute('user-profile-form', 'Profile')}} 
@stop

@section('title')
Aktivasi Akun
@stop

@section('description')
Halo {{{$name}}}, <br>
Berikut adalah link aktivasi untuk pendaftaran aplikasi KIP dengan data sebagai berikut:<br><br>
----------------------------------------------------------------------------------------
<table>
	<tr>
		<td>Nama</td>
		<td>: {{{$name}}}</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>: {{{$email}}}</td>
	</tr>
	<tr>
		<td>No HP</td>
		<td>: {{{$phone}}} </td>
	</tr>
	<tr>
		<td>No. KTP</td>
		<td>: {{{$ktp}}} </td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>: {{{$address}}} </td>
	</tr>

</table>
----------------------------------------------------------------------------------------
<br>
Untuk mengaktifkan akun anda silahkan klik link dibawah ini:<br>
<h3>{{HTML::link($link, 'Aktivasi')}}</h3> 

<br><br>
Hormat kami,<br><br>
{{{Config::get('setting.site_name')}}}
@stop