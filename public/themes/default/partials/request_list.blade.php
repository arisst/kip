<section> 
      <!--CART STARTS-->
      <div id="shopping_cart" class="full_page">
        <h1>My Request</h1>
        <!-- <div class="message success">Notch-collar shirt was added to your shopping cart.</div> -->
        
        <div class="cart_table">
          <table class="data-table cart-table" id="shopping-cart-table" cellpadding="0" cellspacing="0">
            <tr>
              <th colspan="1">Informasi</th>
              <th class="align_center" width="6%">Tanggal</th>
              <th class="align_center" width="12%">Status</th>
              <th class="align_center" width="10%">File</th>
            </tr>
        @foreach (Theme::getRequest() as $key)
            <tr>
              <td class="align_left" width="44%">
                <a class="pr_name" href="{{URL::to('informasi/'.Str::slug($key->category).'/'.$key->slug)}}">{{$key->ititle}}</a>
                <span class="pr_info"> {{$key->title}} </span>
              </td>
              <td class="align_center vline">{{$key->added_on}}</td>
              <td class="align_center vline">
                @if('0'==$key->status) <p class="warning"> {{'Menunggu'}} </p>
                @elseif('1'==$key->status) <p class="success"> {{'Diterima'}} </p>
                @elseif('2'==$key->status) <p class="error"> {{'Ditolak'}} </p>
                @endif
              </td>
              <td class="align_center vline">
                <p class="info">
                  @if('1'==$key->status)
                  {{Form::open(array('route'=>'user-download'))}}
                    {{Form::hidden('information_id',$key->iid)}}
                    {{Form::submit('Download')}}
                  {{Form::close()}}
                  @else
                    <p class="warning"></p>
                  @endif
                </p>
              </td>
            </tr>
        @endforeach
           
          </table>
        </div>
      </div>
      <!--CART ENDS--> 
      
    </section>