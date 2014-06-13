@foreach (Theme::getDetail() as $element)
        <h1>{{{$element->title}}}</h1>
      @if($element->attachment)
        <p>
        @if(Input::has('large'))
           {{HTML::image('image/page/'.$element->slug.'/1500/'.$element->attachment)}}
        @else
          <a href="?large=1" style="cursor: -webkit-zoom-in; cursor: -moz-zoom-in;"> {{HTML::image('image/page/'.$element->slug.'/500/'.$element->attachment)}} </a>
        @endif
        </p>
      @endif
        <p class="short_dc">
          {{nl2br($element->description)}}
        </p>
       
@endforeach