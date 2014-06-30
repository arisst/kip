@include('header')
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a href="{{URL::to('admin/')}}" class="navbar-brand">{{Config::get('setting.site_name')}}</a>  
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mobile-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>      
      	</div>
        <div class="collapse navbar-collapse" id="mobile-toggle">
        	<ul class="nav navbar-nav">
            <li class="{{ Request::is('admin/informations*') ? 'active' : '' }}">{{ HTML::link('admin/informations', 'Information') }}</li>
            <li class="{{ Request::is('admin/requests*') ? 'active' : '' }}">{{ HTML::link('admin/requests', 'Request') }}</li>
            <!-- <li class="{{ Request::is('admin/response*') ? 'active' : '' }}">{{ HTML::link('admin/responses', 'Response') }}</li> -->
            <li class="{{ Request::is('admin/pages*') ? 'active' : '' }}">{{ HTML::link('admin/pages', 'Page') }}</li>
            <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">{{ HTML::link('admin/users', 'User') }}</li>
    			  <li class="{{ Request::is('admin/setting*') ? 'active' : '' }}">{{ HTML::link('admin/setting', 'Setting') }}</li>
    			</ul>
    			<div style="text-align:right;">
    				<p class="navbar-text navbar-right"><a href="{{URL::to('admin/profile')}}">Profile</a> 
    				<a href="{{ URL::to('logout') }}">Logout</a></p><p class="navbar-text navbar-right">{{Auth::user()->nama}}</p>
    			</div>
        </div>
      </div>
    </div>
    <div class="container">
    	<div style="padding-top:60px;">
			@yield('content')
		</div>
	</div>
  </body>
</html>