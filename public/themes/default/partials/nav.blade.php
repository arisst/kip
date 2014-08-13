<nav>
            <ul class="primary_nav">
            <li class="{{ (Route::currentRouteName()=='home') ? 'active' : '' }}"><a href="{{URL::route('home')}}">HOME</a></li>

              @foreach (Theme::getMenu() as $element)
                  <li class="{{(Request::is($element['head'].'*')) ? 'active' : ''}}"> {{HTML::link($element['headLink'], str_replace('-',' ',$element['head']))}}
                    @if(isset($element['list'])&&$element['list']!='')
                     <ul class="sub_menu">
                        <li> <a href="#">{{$element['subhead'] or ''}}</a>
                            <ul>
                                @foreach ($element['list'] as $key)
                                    <li class="{{ (Request::is($element['head'].'/'.Str::slug($key))) ? 'active' : '' }}">
                                        {{HTML::link($element['head'].'/'.Str::slug($key), $key)}} 
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    @endif
                  </li>
              @endforeach

            </ul>
        </nav>

<script type="text/javascript">
    $(window).bind('scroll', function() {
         if ($(window).scrollTop() > 150) {
             // $('.menu').addClass('fixed');
             document.getElementById('menu').style.position='fixed';
             document.getElementById('menu').style.top='0';
             document.getElementById('menu').style.opacity='0.9';
         }
         else {
             // $('.menu').removeClass('fixed');
             document.getElementById('menu').style.position='relative';
         }
    });
</script>