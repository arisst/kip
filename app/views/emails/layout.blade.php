@extends('emails.template')

@section('headline')
	<p><strong><a href="{{URL::route('home')}}"><singleline label="Title">{{{Config::get('setting.site_name')}}}</singleline></a></strong></p>
@stop

@section('content')
	<layout label="Text only">
	<table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
	    <tbody><tr>
	        <td class="w580" width="580">
	            <p align="left" class="article-title">
	            	<singleline label="Title">
	            		@yield('title')
	            	</singleline>
	            </p>
	            <div align="left" class="article-content">
	                <multiline label="Description">
	                @yield('description')
	                </multiline>
	            </div>
	        </td>
	    </tr>
	    <tr><td class="w580" width="580" height="10"></td></tr>
	</tbody></table>
	</layout>
@stop

@section('footer')
  <table id="footer" class="w640" width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#F38256">
        <tbody><tr><td class="w30" width="30"></td><td class="w580 h0" width="360" height="30"></td><td class="w0" width="60"></td><td class="w0" width="160"></td><td class="w30" width="30"></td></tr>
        <tr>
            <td class="w30" width="30"></td>
            <td class="w580" width="360" valign="top">
            <span class="hide"><p id="permission-reminder" align="left" class="footer-content-left">
            <span>
            	Anda mendapat email ini karena email anda terdaftar sebagai pengguna di {{{Config::get('setting.site_name')}}}.
            	Jika anda tidak merasa mendaftar silakan hubungi kami pada alamat di samping atau kunjungi {{HTML::link('/')}}
            </span></p></span>
            <p align="left" class="footer-content-left">
            	{{HTML::linkRoute('contact', 'Laporkan Bug')}}
            </p>
            </td>
            <td class="hide w0" width="60"></td>
            <td class="hide w0" width="160" valign="top">
            <p id="street-address" align="right" class="footer-content-right">
            <span>{{{Config::get('setting.address')}}}</span>
            </td>
            <td class="w30" width="30"></td>
        </tr>
        <tr><td class="w30" width="30"></td><td class="w580 h0" width="360" height="15"></td><td class="w0" width="60"></td><td class="w0" width="160"></td><td class="w30" width="30"></td></tr>
    </tbody></table>
@stop