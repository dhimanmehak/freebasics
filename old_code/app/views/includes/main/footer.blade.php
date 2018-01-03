<footer>
    <div class="footer"> 
        <div class="container">
            <span class="sciss"></span>
            <div class=" col-sm-5 pad0">
                <?php $pages = app('pages'); ?> 
                 <span class="headeline">Discover</span>
                <ul class="folter-menus">

                    <li>
                        <a class="mega-footer__link" href="{{URL::to('blog')}}">Blog</a>
                    </li>                    
                    <li>
                        <a class="mega-footer__link" href="{{URL::to('discover')}}">{{trans('messages.discover')}}</a>
                    </li>
                    @foreach($categories as $category)
                    <li>
                        <a class="mega-footer__link"  href="{{URL::to('discover/category')}}/{{$category->id}}/magic">{{$category->categoryname}}</a>
                    </li>
                    @endforeach   
                </ul>
            </div>  


            <div class="col-sm-3 pad0">
                 <span class="headeline">About us</span>
                <ul class="difrent menu2 col-md-4 folter-menus pad0">
                    @foreach($pages as $page)
                    <li>
                        <a class="mega-footer__link" href="{{URL::to('pages')}}/{{$page->seourl}}">{{$page->pagename}}</a>
                    </li>
                    @endforeach      

                </ul>
            </div>
            <div class="col-sm-2 pad0">
                 <span class="headeline">Join Us On</span>
                <ul class="  menu4 difrent">
                    <li>
                        <a href="{{Config::get('adminconfig.facebooklink'); }}"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                    </li>

                    <li>
                        <a href="{{Config::get('adminconfig.twitterlink');}}"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                    </li>
                    <!--
                    <li>
    <a href="#"><i class="fa fa-instagram"></i><span>Instagram</span></a>
</li>
                    -->
                    <li>
                        <a href="{{Config::get('adminconfig.pinterestlink'); }}"><i class="fa fa-pinterest-p"></i><span>Pinterest</span></a>
                    </li>

            </div>           
            <div class="footer-bottom">

                <div class="col-md-9">
                    <a href="{{URL::to('/');}}"><img src="{{URL::asset('');}}/{{Config::get('adminconfig.footerlogo')}}" class="foter-img"></a>
                    <span class="foter-lin">{{Config::get('adminconfig.footercontent')}}</span>
                </div>

                <div class="col-md-3 ">
                    <div class="currency">
                        <form>                           
                            <select class="currency-select" id='currencyselect'>
                                @if(Session::get('currency')=="")
                                <?php
                                $currency = Config::get('adminconfig.currency');
                                Session::put('currency', $currency);
                                ?>
                                @endif
                                @foreach($currencies as $currency)
                                <option value="{{$currency->currencytype}}"  @if((Session::has('currency'))&&(Session::get('currency')==$currency->currencytype))selected="selected" @elseif((Session::get('currency')=="")&&("USD"==$currency->currencytype))selected="selected" @else @endif>{{$currency->currencytype}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                    <div class="language">
                        <form>
                            <select id="languageselect">
                                @if(Session::get('locale')=="")
                                <?php
                                $lang = Config::get('adminconfig.language');
                                Session::put('locale', $lang);
                                ?>
                                @endif
                                @foreach($languages as $lang)
                                <option value="{{$lang->languagecode}}"  @if((Session::has('locale'))&&(Session::get('locale')==$lang->languagecode))selected="selected" @elseif((Session::get('locale')=="")&&(Config::get('adminconfig.language')==$lang->languagecode))selected="selected" @else @endif>{{$lang->languagename}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
    {{Config::get('adminconfig.googleanalyticscode');}}

    <script>
        $(document).ready(function () {
            if (!localStorage.counter) {
                window.location.reload();
                localStorage.counter = true;
            }
        });
    </script>


    <script>

        if (window.location.hash == '#_=_') {
            window.location.hash = ''; // for older browsers, leaves a # behind
            history.pushState('', document.title, window.location.pathname); // nice and clean
            e.preventDefault(); // no page reload
        }
    </script>

    <script>
        setTimeout(function () {
            $('.alert-message').fadeOut('slow');
        }, 8000); // <-- time in milliseconds
    </script>
    <?php $baseurl = url(); ?>
    <script>
        $('#languageselect').on('change', function () {
            var url = '<?php echo $baseurl; ?>';
            dataString = $(this).val();
            $.ajax({
                type: "POST",
                url: url + "/setsession",
                data: "locale=" + dataString,
                success: function (data) {
                    location.reload();
                }
            });
        });

    </script>
    <script>
        $('#currencyselect').on('change', function () {
            var url = '<?php echo $baseurl; ?>';
            dataString = $(this).val();
            $.ajax({
                type: "POST",
                url: url + "/setcurrencysession",
                data: "currency=" + dataString,
                success: function (data) {
                    location.reload();
                }
            });
        });

    </script>

    <script>
        setInterval(function () {
            //alert("Hello"); 
        }, 86400000);
    </script>


</footer>   
