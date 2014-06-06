<header>
	<div class="top_bar clear">
		<div class="language_switch"> <a target="_blank" class="active" href="http://airputih.or.id" title="Aplikasi Keterbukaan Informasi Publik">{{Config::get('setting.site_name')}}</a></div>
	    <ul class="top_links">
			@if (Auth::check())
		        <li class="{{ (Route::currentRouteName()=='user-request-list') ? 'highlight' : '' }}"><a href="{{URL::route('user-request-list')}}">My Request</a></li>
		        <li class="{{ (Route::currentRouteName()=='user-profile-form') ? 'highlight' : '' }}"><a href="{{URL::route('user-profile-form')}}">Profile</a></li>
		        <li class="{{ (Route::currentRouteName()=='logout') ? 'highlight' : '' }}"><a href="{{URL::route('logout')}}">Logout</a></li>
		    @else
		        <li class="{{ (Route::currentRouteName()=='login-form') ? 'highlight' : '' }}"><a href="{{URL::route('login-form')}}#go">Login</a></li>
			@endif
	    </ul>
	</div>
	<!--Logo Starts-->
	<h1 class="logo"> <a href="{{URL::to('/')}}">
	<!-- <img src="{{Theme::asset()->url('img/logo.png')}}" /></a>  -->
	<img src="http://placehold.it/145x74" /></a> 
	</h1>
	<!--Logo Ends-->
	<!--Responsive NAV-->            
	<div class="responsive-nav" style="display:none;">
	    <select  onchange="if(this.options[this.selectedIndex].value != ''){window.top.location.href=this.options[this.selectedIndex].value}">

	        <option selected="" value="">-- Menu --</option>
	    @foreach (Theme::getMenu() as $element)
	    	@foreach ($element['list'] as $key) 
	    		<option value="{{ URL::to($element['head'].'/'.Str::slug($key)) }}">{{$element['head'].' '.$key}}</option>
	    	@endforeach
	    @endforeach
	    </select>
	</div>
	<!--Responsive NAV-->
	<!--Search Starts-->
	<form class="header_search">
	    <div class="form-search">
	        <input id="search" type="text" name="q" value="" class="input-text" autocomplete="off" placeholder="Search">
	        <button type="submit" title="Search"></button>
	    </div>
	</form>
	<!--Search Ends-->
</header>