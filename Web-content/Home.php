<?php
  session_start();


?>

<!doctype html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="../bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap-3.3.7/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../Web-content/css/main.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>

    <link href='https://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Unica+One&display=swap" rel="stylesheet">
    <style>

    </style>

    <Title>Event is Life</Title>
    <link rel="stylesheet" type="text/css" href="animate.css" media="screen" />
</head>

<body>

<?php
   if (isset($_SESSION['userIdentity'])) {
       echo '<nav class="navbar navbar-default navbar-fixed-top">
       <div class="container-fluid">
           <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="Home.php">RV Events</a>
           </div>
           <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav navbar-center">
                   <li></li>
               </ul>
               <ul class="nav navbar-nav" style="margin-left:20px;">




               </ul>

               <ul class="nav navbar-nav navbar-right">

                   <li><a href="diveIn.php">Dive In</a></li>


                   <li><a href="statistics.php">statistics</a></li>

                   <li><a href="../Web-content/phpCode/logout.php">logout</a></li>
                   





               </ul>


           </div>
       </div>


    
       


   </nav>
   
   
    

   
   
   ';
   }
   else{
       echo'<nav class="navbar navbar-default navbar-fixed-top">
       <div class="container-fluid">
           <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="Home.php">RV Events</a>
           </div>
           <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav navbar-center">
                   <li></li>
               </ul>
               <ul class="nav navbar-nav" style="margin-left:20px;">




               </ul>

               <ul class="nav navbar-nav navbar-right">

                   <li><a href="diveIn.php">Dive In</a></li>


                   <li><a href="statistics.php">statistics</a></li>

                   <li><a href="login.php">Login</a></li>
                   <li><a href="SignUp1.php">SignUP</a></li>





               </ul>


           </div>
       </div>
   </nav>';
   }

 ?>      

    



    <img id="imm" class="img-responsive" src="../Web-content/images/kidSmile3.jpg" alt="Snow" style="width:100%; max-height:570px">

    <div class="centered">
        <h1 id="tan"> Life is HeartBeat,HeartBeat is Event.</h1>
    </div>


    <h3 style="color:rgb(107, 98, 98);">Find Vendors At Every Budgets</h3>

    <p style="color:rgb(107, 98, 98);">Photographer , venue , makeUp artist & more at your budget and style.</p>
    <div id="grid">




        <div class="img1" id="img1">
            <h1 style="margin-top:50%">VideoGraphy</h1>
        </div>
        <div class="img2" id="img2">
            <h1 style="margin-top:50%">Costumes & Dress</h1>
        </div>
        <div class="img3" id="img3">
            <h1 style="margin-top:50%">Sound System</h1>
        </div>
        <div class="img4" id="img4">
            <h1 style="margin-top:50%">Make Up</h1>
        </div>
        <div class="img5" id="img5">
            <h1 style="margin-top:50%">Location</h1>
        </div>
        <div class="img6" id="img6">
            <h1 style="margin-top:50%">Catering</h1>
        </div>


    </div>


    <button type="button" class="btn btn-primary btr"
        style="border:none;background-color:rgb(233, 140, 155);width:40%;height:60px;margin:10px auto;">Browse
        Category</button>



    <div class="caro" style="padding:10px;">
        <div class="container">
            <h2></h2>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="1500">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>



                </ol>

                <!-- Wrapper for slides -->




                <div class="carousel-inner" data-aos="fade-down">

                    <div class="item active">
                        <img src="../Web-content/images/Sliderbirthday.jpg" alt="Birthday" style="width:100%;max-height:600px;">
                        <div class="carousel-caption">
                            <h3>Birthday Celebration</h3>
                            <p>Wish them on their special day with more fun!</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="../Web-content/images/SliderMarraige.jpg" alt="Marraige" style="width:100%; max-height:600px;">
                        <div class="carousel-caption">
                            <h3>Marriage Celebration</h3>
                            <p>Lets make it more auspicious!</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="../Web-content/images/SliderCorporate.jpg" alt="Corporate" style="width:100%;max-height:600px;">
                        <div class="carousel-caption">
                            <h3>Meet & Greet</h3>
                            <p>Corporate means big ,and we make it happen!</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="../Web-content/images/SliderAny.jpg" alt="AnyEvent" style="width:100%;max-height:600px;">
                        <div class="carousel-caption">
                            <h3>We Are ready for Any Thing</h3>
                            <p>Just Bring It!</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="../Web-content/images/SliderRaiseToast.jpg" alt="RaiseAToast"
                            style="width:100%;max-height:600px;">
                        <div class="carousel-caption">
                            <h3>Raise A Toast</h3>
                            <p>we make it happen!</p>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>









    <div class="grid1">

        <div class="left" id="left">

            <img src="../Web-content/images/transition.png"
                style="width:100%;max-width:400px;height:350px;align-content: center;margin-top:100px;">
                
        </div>
        <div class="right" id="right">

            <h3 style="font-family: 'Abril Fatface', cursive;word-spacing: .25em;line-height:1.4">
                RV EVENTS is a full service event management firm based in Sion, Mumbai that was created by pairing
                together
                our passion for business and events. <br /><br />We bring a fresh, unique approach to the event
                management
                industry.<br /><br />
                Our team understands that a properly executed event can be leveraged to support an Individual or
                organization’s strategic vision, incorporated into a company’s marketing plan,
                or used to build networks and client loyalty,or can be a matter of respect and pride for the individual
                and
                family.
                <br/>
                
                
            </h3>
            © 2019 RV Events 
                <p>بسم الله   श्रेष्ठः परमात्मा</p>


        </div>

    </div>



    <h3 style="margin-top:50px;color:rgb(107, 98, 98);">You name any event & we can make that happen.</h3>

    <p style="color:rgb(107, 98, 98);">Be it birthday, marriage, corporate events, personal get together, baby shower
        and many more...</p>
    <div id="grid12">




        <div class="img11" id="img11">
            <h1 style="margin-top:50%">Birthday</h1>
        </div>
        <div class="img22" id="img22">
            <h1 style="margin-top:50%">Corporate Meetings</h1>
        </div>
        <div class="img33" id="img33">
            <h1 style="margin-top:50%">Social</h1>
        </div>
        <div class="img44" id="img44">
            <h1 style="margin-top:50%">Marriage</h1>
        </div>
        <div class="img55" id="img55">
            <h1 style="margin-top:50%">Concerts</h1>
        </div>
        <div class="img66" id="img66">
            <h1 style="margin-top:50%">Cultural event</h1>
        </div>


    </div>








    <div class="row">
        <div class="col-sm-12">

            <div class="whoAreWe">
                <h1 class="ta animated infinite fadeInUp">Event Planning</h1>
                <p class="taa animated infinite fadeInDown">Is Our Passion</p>
            </div>


        </div>
    </div>

    <div class="bottomOfPage">
        <div class="bottomTitle" id="bottomTitle">
            <h1>RV Events</h1>
            <p style="font-family: 'Unica One', cursive;font-family: 'Architects Daughter', cursive;font-size:18px;">
                Plan your wedding with Us

                RV Event is an Indian event Planning Website where you can find the best vendors,
                with prices and reviews at the click of a button. Whether you are looking to hire event planners in
                India, or looking for the top photographers, or just some ideas and inspiration for your event.
                RV Event can help you solve your event planning woes through its unique features. With a checklist,
                detailed vendor list, inspiration gallery and blog - you won't need to spend hours planning an event
                anymore.
            </p>


            <div class="flex-Container">
                <div class="icon"><i class="fa fa-facebook-square" style="font-size:36px"></i></div>
                <div class="icon"><i class="fa fa-google-plus" style="font-size:34px"></i></div>
                <div class="icon"><i class="fa fa-linkedin-square" style="font-size:34px"></i></div>
                <div class="icon"><i class="fa fa-instagram" style="font-size:34px;color:aqua"></i></div>
                <div class="icon"><i class="fa fa-twitter-square" style="font-size:34px;color:red"></i></div>
            </div>

        </div>



        <div class="ab" id="ab">
            <h1>RV Events</h1>
            <ul class="bottomList">

                <li>Contact us.</li>
                <li>Plan an event.</li>
                <li>Hire Vendors.</li>
                <li>Find a Job.</li>
                <li>Offer Service</li>



            </ul>
        </div>

       
            
                
       



    </div>













</body>

<script>

    $(document).ready(function () {
        $(window).scroll(function () {
            $(".navbar").css("opacity", 1 - $(window).scrollTop() / 250);
        });


    });


</script>



</html>