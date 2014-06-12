@extends('layout')
@section('title')
	Show Page
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Detail Page</div>
  <div class="panel-body">
 <a href="{{ URL::route('admin.pages.index') }}" type="button" class="btn btn-default hidden-print btn-sm {{ (Route::currentRouteName()=='admin.pages.index') ? 'active' : '' }}">
  <span class="glyphicon glyphicon-th-list"></span> List Page
</a>

<br><br>

<div class="col-md-12">
    <ul class="list-group">
      <li class="list-group-item list-group-item-info"><b>Detail Page</b></li>
      <li class="list-group-item">Page : <b>
        @if ($page->cat == 1) Prosedur
        @elseif ($page->cat == 2) FAQ
        @elseif ($page->cat == 3) Tentang
        @elseif ($page->cat == 4) Berita
        @else Unknown
        @endif
      </b></li>
      <li class="list-group-item"> <blockquote> <p> {{{$page->title}}} </p> <footer>{{ nl2br($page->description) }}</footer></blockquote></li>
      @if($page->attachment)
      <li class="list-group-item">
        {{HTML::image('image/page/'.$page->slug.'/220/'.$page->attachment)}}
      </li>
      @endif
      <li class="list-group-item">Create : <b>{{$page->created_at}}</b></li>
      <li class="list-group-item">Update : <b>{{$page->updated_at}}</b></li>
      
    </ul>
</div>
  </div>
</div>
@stop
