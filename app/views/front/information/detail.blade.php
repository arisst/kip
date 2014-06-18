@foreach (Theme::getDetail() as $element)
        <h1>{{{$element->title}}}</h1>
        <p class="short_dc">
          {{nl2br($element->description)}}
        </p>
        <div class="add_to_buttons">
        <?php if(Auth::check()) foreach(Theme::getRequest() as $key);?>
      @if(isset($key))
        @if($key->status==1)
          {{Form::open(array('route'=>'user-download'))}}
                    {{Form::hidden('sess', Crypt::encrypt($key->information_id))}}
                    <button class="add_cart" type="submit">Download</button>
          {{Form::close()}}
        @else
          <button onClick="window.location='{{URL::route('information-request', array($element->id, $element->slug))}}'" class="add_cart">Request</button>
        @endif
      @else
          <button onClick="window.location='{{URL::route('information-request', array($element->id, $element->slug))}}'" class="add_cart">Request</button>
      @endif
        </div>
@endforeach