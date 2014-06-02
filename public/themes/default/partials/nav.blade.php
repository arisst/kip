<nav>
            <ul class="primary_nav">
            <li class="{{ (Route::currentRouteName()=='home') ? 'active' : '' }}"><a href="/">HOME</a></li>

              @foreach (Theme::getMenu() as $element)
                  <li class="{{(Request::is($element['head'].'/*')) ? 'active' : ''}}"> {{HTML::link('#', $element['head'])}}
                     <ul class="sub_menu">
                        <li> <a href="#">{{$element['subhead']}}</a>
                            <ul>
                                @foreach ($element['list'] as $key)
                                    <li class="{{ (Request::is($element['head'].'/'.Str::slug($key))) ? 'active' : '' }}">
                                        {{HTML::link($element['head'].'/'.Str::slug($key), 'Informasi '.$key)}} 
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                  </li>
              @endforeach


                <li><a href="">Prosedur</a>
                    <!--SUbmenu Starts-->
                    <ul class="sub_menu">
                        <li> <a href="#">Mekanisme dan standar pelayanan</a>
                            <ul>
                                <li><a href="#">Ketentuan Umum</a></li>
                                <li><a href="#">Klasifikasi Informasi</a></li>
                                <li><a href="#">Standard pelayanan Informasi</a></li>
                                <li><a href="#">Hak dan Kewajiban Pemohon/Badan Publik</a></li>
                                <li><a href="#">Hak dan Kewajiban Pemohon</a></li>
                                <li><a href="#">Hak dan Kewajiban Badan Publik</a></li>

                            </ul>
                        </li> 
                        <li> <a href="#">Permohonan Informasi</a>
                            <ul>
                                <li><a href="#">Mengajukan Keberatan</a></li>
                                <li><a href="#">Mengajukan Sengketa</a></li>
                                <li><a href="#">Penyelesaian Sengketa</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!--SUbmenu Ends-->
                </li>
                <li><a href="{{URL::to('contact')}}">Kontak</a></li>
                <li><a href="{{URL::to('faq')}}">Faq</a></li>
                <li><a href="{{URL::to('about')}}">Tentang</a></li>
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