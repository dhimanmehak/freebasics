<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="{{URL::to("uploads/images/favicon.ico")}}" type="image/gif" sizes="16x16">
        <meta charset="utf-8">
        <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
        <title>Fundstarter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">

            html{float:left; width:100%; height:100%;}
            body{float:left; width:100%; height:100%;}

            .bgcontainer{float:left; width:100%; height:100%;}
            .bgcontainer {
                float: left;
                width: 100%;
                background-attachment: fixed;
                font-family:arial;
                background-size: cover;
                overflow:hidden;
            }

            body{
                padding:0; margin:0;}

            .images-lom {
                float: left;
                padding: 60px 0 0;
                text-align: center;
                width: 100%;
            }
            .container{max-width:1080px; margin:0 auto;}

            .leftside{
                float:left;
                width:50%;
                margin-top:6%;
            }

            .cont-holder{
                float:left;
                width:100%;
                position:relative;
                z-index:9;
            }
            .rightside {
                background-color: rgba(255, 255, 255, 0.62);
                border-radius: 6px;
                float: right;
                margin: 8% 0 0;
                min-height: 200px;
                padding: 30px;
                width: 340px;
                display: inline-block;
                text-align:center;
            }

            span.opacot {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.37);
            }

            .rightside input[type="text"],input[type="password"] {
                border: 1px solid #ccc;
                border-radius: 4px;
                float: left;
                height: 39px;
                margin: 2px 0;
                padding: 1px 9px;
                width: 95%;
            }
            
            input[type="submit"]{
                cursor:pointer;
            }
          

            .intro-text {
                color: #ffffff;
            }

            .large_white_bold {
                font-size: 35px;
                font-weight: 500;
            }

            .medium_white_light  {
                font-size: 16px;
                line-height: 26px;
                margin: 0 0 40px;
            }
            .slide-btn {
                animation: 0.5s ease 0s alternate none infinite running point-down;
                background-color: #2ADA71;
                border: 1px solid #ffffff;
                color: #ffffff;
                font-family:arial;
                font-size: 16px;
                font-weight: normal;
                margin: 10px 3px;
                text-decoration: none;
                padding: 12px 34px;
                position: relative;
                transition: all 0.4s ease-in 0s;
            }
            
            input .slide-btn {
                animation: 0.5s ease 0s alternate none infinite running point-down;
                background-color: #2ADA71;
                border: 1px solid #ffffff;
                color: #ffffff;
                font-family:arial;
                font-size: 16px;
                font-weight: normal;
                margin: 10px 3px;
                text-decoration: none;
                padding: 12px 34px;
                position: relative;
                transition: all 0.4s ease-in 0s;
            }

            .rightside ul{
                float:left;
                width:100%;
                padding:0;
                margin:0;
            }

            .rightside ul li{
                float:left;
                width:100%;
                padding:0;
                margin:0;
                list-style:none;
            }


        </style>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <div  style="background-image: url('{{URL::to("uploads/images/watermark.jpg")}}');" class="bgcontainer">
            <span class="opacot"></span>
            <div class="cont-holder">
                <div class="container">
                    <div class="leftside">
                        <div class="col-md-7 intro-text">
                            <div class="main">
                                <h2 class="large_white_bold"> Fundstarter Installation..</h2>
                                <p class="medium_white_light">We ensure quality & support. People love us & we love them. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
<!--                                <span class="page-scroll">
                                    <a class="btn slide-btn bg-inverse" href="#welcome">View Demo</a>
                                </span>
                                <span class="page-scroll">
                                    <a class="btn slide-btn" href="#download-now">Subscribe NOW</a>
                                </span>-->
                            </div>
                        </div>
                    </div>
                    <div class="rightside">
                        <img src="{{URL::to("uploads/images/logo.png")}}" style="width: 230px;margin-bottom:20px;">
                        <form method="post" action="{{URL::to('postinstall')}}">
                        <ul>
                            <li><input placeholder="DB Host Name" type="text" name="dbhostname" required></li>
<!--                            <li><input placeholder="DB Port Number (MySQL default port 3306)" type="text" name="dbportnumber" required></li>-->
                            <li><input placeholder="Database Name" type="text" name="dbname" required></li>
                            <li><input placeholder="DB Username" type="text" name="dbusername" required></li>
                            <li><input placeholder="DB Password" type="password" name="dbpassword"></li>
                            <li><input placeholder="Admin Name" type="text" name="adminname" required></li>
                            <li><input placeholder="Admin Email" type="text" name="adminemail" required></li>
                            <li><input placeholder="Admin Password" type="password" name="adminpassword" required></li>
                            <li><input class="btn slide-btn" type="submit" style="display:inline-block;" value="Submit"></li>
                        </ul>
                        </form>
                    </div>
                </div>
            </div>

    </body>
</html>
