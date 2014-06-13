<section>
            <div class="full_page">
                <h1>Form Permohonan Informasi</h1>
				<div class="col_left_main contact_page"> 
                <div>
                @foreach (Theme::getRequest() as $row)
                    Informasi yang diminta : "{{$row->title}}"
                @endforeach
                </div>  
        <!--Form Starts-->
        <div class="block">
            {{Form::open()}}
                <h3>Tujuan Penggunaan</h3>             
                <ul id="contact_form">
                    <li>
                        {{Form::text('title', Input::old('title'), array('placeholder'=>'Subjek Tujuan'))}}
                        <p class="error">{{{$errors->first('title')}}}</p>
                    </li>
                    <li>
                        {{Form::textarea('description', Input::old('title'), array('placeholder'=>'Uraian tujuan penggunan'))}}
                        <p class="error">{{{$errors->first('description')}}}</p>
                    </li>
                    <li>
                        <button name="submit" type="submit" class="subbutton brown_btn">Submit</button>
                    </li>
                </ul>
            {{Form::close()}}
        </div>
        <!--Form Ends-->
                      
                    <!--Contact Ends-->
                </div>
                <div class="col_right">
                    <div class="block-progress">
                        <div class="block-title">Data Anda</div>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>: {{Auth::user()->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: {{Auth::user()->email}}</td>
                            </tr>
                            <tr>
                                <td>KTP</td>
                                <td>: {{Auth::user()->ktp}}</td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>: {{Auth::user()->phone}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{Auth::user()->address}}</td>
                            </tr>

                        </table>
                            
                    </div>
                </div>
            </div>
            
        </section>