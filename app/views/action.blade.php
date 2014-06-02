<a href="{{ URL::to($l) }}" type="button" class="btn btn-default hidden-print btn-sm {{ Request::is($l) ? 'active' : '' }}">
  <span class="glyphicon glyphicon-th-list"></span> List {{$p}}
</a>

<a href="{{ URL::to($l.'/create') }}" type="button" class="btn btn-default hidden-print btn-sm {{ Request::is($l.'/create') ? 'active' : '' }}">
	  <span class="glyphicon glyphicon-plus"></span> Add {{$p}}
</a>