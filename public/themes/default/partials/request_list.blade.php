<section> 
      <!--CART STARTS-->
      <div id="shopping_cart" class="full_page">
        <h1>My Request</h1>
        <!-- <div class="message success">Notch-collar shirt was added to your shopping cart.</div> -->
        
        <div class="cart_table">
          <table class="data-table cart-table" id="shopping-cart-table" cellpadding="0" cellspacing="0">
            <tr>
              <th colspan="1">Informasi</th>
              <th class="align_center" width="6%">Lama</th>
              <th class="align_center" width="12%">Status</th>
              <th class="align_center" width="10%">File</th>
            </tr>
        @foreach (Theme::getRequest() as $key)
            <tr>
              <td class="align_left" width="44%" id="{{$key->id}}" style="cursor:pointer;">
                <!-- <a class="pr_name" href="{{URL::to('informasi/'.Str::slug($key->category).'/'.$key->slug)}}">{{$key->ititle}}</a> -->
                <a class="pr_name" id="{{$key->id}}">{{$key->ititle}}</a>

                <span class="pr_info"> {{$key->title}} </span> <span class="small"> {{$key->added_on}}</span>
                {{--HTML::link('#'.$key->id,'Detail', array('id'=>$key->id))--}}
                <div id="request{{$key->id}}" style="display:none;">
                {{$key->description}}<br><br>
                @if('0'==$key->status) <p class="warning"> {{'Menunggu'}} </p>
                @elseif('1'==$key->status) <p class="success"> {{'Diterima'}} </p>
                @elseif('2'==$key->status) <p class="error"> {{'Ditolak'}} </p>
                @endif 
                <br>
                   <span class="pr_info">{{$key->rtitle}}</span><span class="small"> {{$key->rtanggal}}</span><br>
                  {{$key->rdescription}}
                </div>
              </td>
              <td class="align_center vline">
              <?php 
              $tanggal2 = ($key->rtanggal) ? $key->rtanggal : date("Y-m-d H:i:s") ;
                $date1 = new DateTime($key->added_on);
                $date2 = new DateTime($tanggal2);
                $interval = $date1->diff($date2);
               ?>
              {{$interval->format('%a hari')}}</td>
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
                    {{Form::hidden('sess',Crypt::encrypt($key->iid))}}
                    {{Form::submit('Download')}}
                  {{Form::close()}}
                  @else
                    <p class="warning"></p>
                  @endif
                </p>
              </td>
            </tr>
<script>
$("#{{$key->id}}").click(function() {
  $("#request{{$key->id}}").slideToggle("fast");
});
</script>
        @endforeach
           
          </table>
        </div>
      </div>
    </section>
    <script type="text/javascript">
    var id = location.hash.slice(1);
      if(id){
        // $('html, body').animate({ scrollTop: $('#'+id).offset().top }, 'fast');
        $("#"+id).slideToggle("fast");
      };
    </script>

