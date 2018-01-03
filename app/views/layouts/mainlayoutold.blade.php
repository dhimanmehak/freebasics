<!DOCTYPE html>
<html xmlns:fb='http://www.facebook.com/2008/fbml'>
    <!-- Head Section -->   
    @include('includes.main.headold')
    <body> 
        <!--Facebook comments-->
       
        <!--Facebook comments-->
        <!-- Header Section -->
        @include('includes.main.headerold')
        <?php
        header('X-FRAME-OPTIONS: DENY');
        ?>

        <!-- Content -->        
        @yield('content')
        <!-- Footer Section -->
       

        @include('includes.main.footerold')
       

        <script>

            jQuery(".list li").click(function () {
                //alert(this.id);
                jQuery(this).addClass("selected");
                jQuery(".list li").not(this).removeClass("selected");

                jQuery('.project').removeClass('actived');
                // alert( $(this).attr('id'));

                var id = $(this).attr('id');
                //alert( $("#poj_"+id));

                jQuery("#poj_" + id).addClass("actived");

            });
        </script>

        <script>
//            function start_my_script() {
//                var url = window.location.href;
//                var findme = "project/detail";
//                if (url.indexOf(findme) > -1) {
//                    $.ajax({
//                        url: 'postprojectviews',
//                        dataType: 'json',
//                        type: 'post',
//                        contentType: 'application/json',
//                        data: JSON.stringify({"projectid": $('#ajaxprojectid').val()}),
//                        processData: false,
//                        success: function (data) {
//                        },
//                        error: function (jqXhr, textStatus, errorThrown) {
//                            console.log(errorThrown);
//                        }
//                    });
//                }

            function are_cookies_enabled()
            {
                var x = "Cookies enabled: " + navigator.cookieEnabled;
                if (navigator.cookieEnabled == false) {
                    $("#cookie-error").css('display', 'block');
                    return false;
                }
            }
        </script>
         <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId  : 1499637763694725 ,
                    status: true, // check login status
                    cookie: true, // enable cookies to allow the server to access the   session
                    xfbml: true  // parse XFBML
                });
            };
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1499637763694725";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    </body>
</html>