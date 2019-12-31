
<?php
  
  include('../Web-content/phpCode/databaseConnector.php');
  session_start();
   
   

   
?>
<!DOCTYPE html>
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
            text-align:center;
            font-size: 17px;
            list-style-type: none;
        }

        .bottomList li:hover {
            cursor: pointer;
            transform: scale(1.4);
        }

        #sideCheckBox{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            grid-gap:2em;
            width: 90%;
            margin: 5%;
            grid-auto-rows:minmax(200px,auto);
            grid-template-areas:
               "sideMenu main main main"
               "sideMenu main main main"
        }

        .sideCheckBox{
            
        }

        .sideMenu{
            grid-area:sideMenu;
        }
        .main{
            grid-area:main;
        }

        #sideCheckBox>*{
           

            padding:10px;

        }
    </style>

    <title>Document</title>
</head>

<body>
<?php
   if (isset($_SESSION['userIdentity'])) {
       echo ' <nav class="nav wrapper blue-grey">
       <div class="container">
           <a href="Home.php" class="brand-logo">RV Events</a>
           <a href="" class="sidenav-trigger" data-target="mobile-links">
               <i class="material-icons">
                   menu
               </i>
           </a>
           <ul class="right hide-on-med-and-down">
   
               <li><a href="diveIn.php">Dive In</a></li>
   
   
               <li><a href="statistics.php">statistics</a></li>
   
               <li><a href="../Web-content/phpCode/logout.php">logout</a></li>
   
           </ul>
   
       </div>
   </nav>
   <ul class="sidenav" id="mobile-links">
   
   <li><a href="diveIn.php">Dive In</a></li>
   
   
   <li><a href="statistics.php">statistics</a></li>
   
   <li><a href="../Web-content/phpCode/logout.php">logout</a></li>
   
   </ul>';
}
 if(!isset($_SESSION['userIdentity'])) {

     echo '<nav class="nav wrapper blue-grey">
     <div class="container">
         <a href="Home.php" class="brand-logo">RV Events</a>
         <a href="" class="sidenav-trigger" data-target="mobile-links">
             <i class="material-icons">
                 menu
             </i>
         </a>
         <ul class="right hide-on-med-and-down">

             <li><a href="diveIn.php">Dive In</a></li>


             <li><a href="statistics.php">statistics</a></li>

             <li><a href="login.php">Login</a></li>
             <li><a href="SignUp1.php">SignUP</a></li>

         </ul>

     </div>
 </nav>

 <ul class="sidenav" id="mobile-links">

     <li><a href="diveIn.php">Dive In</a></li>


     <li><a href="statistics.php">statistics</a></li>

     <li><a href="login.php">Login</a></li>
     <li><a href="SignUp1.php">SignUP</a></li>

 </ul>';
         
      }

?>


    <div id="sideCheckBox" class="sideCheckBox">
        <div id="sideMenu" class="sideMenu">
            <p id="city" style="text-align:center">Select city</p>       
            <?php
               $query = "select cityName from city";
               $result = $con->query($query);

               
               if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                       ?>

                <div class="list-item-check checkbox">

                  <ul class="collection">
                    <li class="collection-item">
                       <label>
                          <input id="indeterminate-checkbox" type="checkbox" class="common-selector brand" value="<?php echo $row['cityName']?>" />
                          <span><?php echo $row['cityName']?></span>
                        </label>
                    </li>
                  </ul>
                  
                </div>

                
            <?php
                   }
               }
            ?>
 
        </div>
        <div id="main" class="main"></div>

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
                            with prices and reviews at the click of a button. Whether you are looking to hire event planners
                            in
                            India, or looking for the top photographers, or just some ideas and inspiration for your event.
                            RV Event can help you solve your event planning woes through its unique features. With a
                            checklist,
                            detailed vendor list, inspiration gallery and blog - you won't need to spend hours planning an
                            event
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
                    <a class="grey-text text-lighten-4 right" href="#!">بسم الله   श्रेष्ठः परमात्मा</a>
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

    });


    


</script>


</html>