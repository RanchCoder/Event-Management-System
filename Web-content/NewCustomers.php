<!DOCTYPE html>
</body>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Unica+One&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <!-- Compiled and minified JavaScript -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Document</title>
</head>
<style>
    .container-box {
        width: 500px;
        height: auto;
        border: 1px solid white;
        box-sizing: border-box;
        margin: 50px auto;
    }

    .flex-Container {
        display: flex;
        flex-direction: row;
    }

    .icon {
        margin-top: 40px;
        margin-right: 30px;
    }

    .icon:hover {
        transform: scale(1.4);
    }

    .bottomList {
        line-height: 2;
        text-align: center;
        font-size: 17px;
        list-style-type: none;
    }

    .bottomList li:hover {
        cursor: pointer;
        transform: scale(1.4);
    }

    .grid {
        display: grid;
        grid-gap: 1em;
        width: 100%;
        margin: 10px;
        grid-template-columns: repeat(5, 1fr);
        grid-auto-rows: minmax(200px, auto);
        grid-template-areas:
            "side main main main main"
            "side main main main main";
    }

    .side {
        grid-area: side;
    }

    .main {
        grid-area: main;
    }


    .grid>.side {
        background:  #f3e5f5;
    }

    .collection-item {
        border: 1px solid white;
    }


    .side {
        display: grid;
        grid-gap: 1em;
        width: 100%;
        grid-template-columns: repeat(1, 1fr);
        grid-auto-rows: minmax(200px, auto);
        grid-template-areas:
            "boxImage"
            "textFig"
            "textFig";
    }

    .boxImage {
        margin: 10px;
        border: 5px solid #f5f5f5;
        box-sizing: border-box;
        background: white;
        grid-area: boxImage;
        background-image: url("../images/companyLogo.jpg");
        background-size: 100% 90%;
    }

    .text {
        grid-area: textFig;
    }


   


    .card:hover {
        box-shadow: 5px 5px 5px 5px #888888;
    }

    .card {
        background-image: linear-gradient(to right, #faffd1, #a1ffce);
    }

    .card-content {
        background-image: linear-gradient(to right, #f4e2d8, #ba5370);
    }

    

    

</style>

<body>

        <nav class="nav wrapper #4a148c purple darken-4">
                <div class="container">
                    <a href="../Web-content/adminDashBoard.html" class="brand-logo">RV Events</a>
                    <a href="" class="sidenav-trigger" data-target="mobile-links">
                        <i class="material-icons">
                            menu
                        </i>
                    </a>
                    <ul class="right hide-on-med-and-down">
        
                        <li><a href="../Web-content/JobSeekerList.php">job Seekers</a></li>
        
        
                        <li><a href="../Web-content/NewServices.php">Service Providers</a></li>
                        <li><a href="../Web-content/NewCustomers.php">Customers</a></li>
                        <li><a href="../Web-content/NewUpdateRequested.php">Requested update</a></li>
        
                        <li><a href="../Web-content/phpCode/logout.php">logout</a></li>
        
                    </ul>
        
                </div>
            </nav>
            <ul class="sidenav" id="mobile-links">
        
                    <li><a href="../Web-content/JobSeekerList.php">job Seekers</a></li>
        
        
                    <li><a href="../Web-content/NewServices.php">Service Providers</a></li>
                    <li><a href="../Web-content/NewCustomers.php">Customers</a></li>
                    <li><a href="../Web-content/NewUpdateRequested.php">Requested update</a></li>
                    <li><a href="../Web-content/performRequested.php">Execute update</a></li>
        
                    <li><a href="../Web-content/phpCode/logout.php">logout</a></li>
            </ul>

    <div class="grid" id="grid">



        <div class="side">

            <div class="boxImage"></div>
            <div class="text">

                <div class="collection">
                    <li><a href="../Web-content/JobSeekerList.php" class="collection-item">job Seekers</a></li>


                    <li><a href="../Web-content/NewServices.php" class="collection-item">Service Providers</a></li>
                    <li><a href="../Web-content/NewCustomers.php" class="collection-item">Customers</a></li>
                    <li><a href="../Web-content/NewUpdateRequested.php" class="collection-item">Requested update</a></li>
                    <li><a href="../Web-content/NewEvents.php" class="collection-item">Upcoming Events</a></li>
                    <li><a href="../Web-content/executeUpdate.php" class="collection-item">update job seeker</a></li>
                    <li><a href="../Web-content/executeUpdateService.php" class="collection-item">update service provider</a></li>
                    <li><a href="../Web-content/phpCode/logout.php" class="collection-item">logout</a></li>
                </div>

            </div>


        </div>
        <div class="main" style="color:#8d6e63; text-align:center;">
            
        </div>
    </div>
    <footer class="page-footer  blue-grey darken-3">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">RV Events</h5>
                    <p
                        style="font-family: 'Unica One', cursive;font-family: 'Architects Daughter', cursive;font-size:18px;">
                        Plan your wedding with Us

                        RV Event is an Indian event Planning Website where you can find the best vendors,
                        with prices and reviews at the click of a button. Whether you are looking to hire event
                        planners
                        in
                        India, or looking for the top photographers, or just some ideas and inspiration for your
                        event.
                        RV Event can help you solve your event planning woes through its unique features. With a
                        checklist,
                        detailed vendor list, inspiration gallery and blog - you won't need to spend hours planning
                        an
                        event
                        anymore.
                    </p>

                    <div class="flex-Container">
                        <div class="icon"><i class="fa fa-facebook-square" style="font-size:36px"></i></div>
                        <div class="icon"><i class="fa fa-google-plus" style="font-size:34px"></i></div>
                        <div class="icon"><i class="fa fa-linkedin-square" style="font-size:34px"></i></div>
                        <div class="icon"><i class="fa fa-instagram" style="font-size:34px;color:aqua"></i></div>
                        <div class="icon"><i class="fa fa-twitter-square" style="font-size:34px;color:red"></i>
                        </div>
                    </div>
                </div>
                <div class="col l4 offset-l2 s12">
                    <div class="ab" id="ab">
                        <h4 style="text-align:center;">RV Events</h4>
                        <ul class="bottomList">

                            <li>Contact us.</li>
                            <li>Plan an event.</li>
                            <li>Hire Vendors.</li>
                            <li>Find a Job.</li>
                            <li>Offer Service</li>



                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2019 RV Events
                <a class="grey-text text-lighten-4 right" href="#!">بسم الله श्रेष्ठः परमात्मा</a>
            </div>
        </div>
    </footer>











</body>
<!-- jquery cdn-->

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>

    $(document).ready(function () {
        $('.tooltipped').tooltip();
        $('.sidenav').sidenav();

        $.post("../getNumberOfUsers.php",{no_of_user:'getUser'}, function(data,status){
          
          $('#users1').html(data);

           
        });

    });


</script>

</html>