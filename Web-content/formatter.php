
<?php
   session_start();
  if (isset($_SESSION['userIdentity'])) {
      require '../Web-content/phpCode/databaseConnector.php';
      //echo $_SESSION['userIdentity'];
      $username1  = $_SESSION['userIdentity'];
      $query = "SELECT * from companydetails where username=?";
      $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $query)) {
          header("Location: ../phpCode/serviceProvider1.php?error=sqlError");
          echo 'error';
          exit();
      } else {
          mysqli_stmt_bind_param($stmt, "s", $username1);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $resultCheck = mysqli_stmt_num_rows($stmt);
         // echo 'hello dude'.$resultCheck;
          if ($resultCheck > 0) {
         //     echo 'we got it';
              header("Location: ../Web-content/profilePages/serviceProviderProfile.php");
              exit();
          }
      }
  } else {
      header('Location: ../Web-content/login.php');
      exit();
  }

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
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
   
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Unica+One&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Document</title>

    <style>
        .personal-data-customer {
            width: 500px;
            height: auto;
            border-radius: 10px;
            border: 1px solid aqua;
            box-sizing: border-box;
            margin: 50px auto;
            padding: 5px;
        }

        #grid {
            display: grid;
            grid-template-columns: 200px;
            grid-auto-rows: minmax(100px, 200px);
            max-width: 80%;
            margin: 0 auto;

            grid-template-areas:
                "gridimg";
        }

        .grid-img {

            grid-area: gridimg;

        }

        #grid>* {
            background-image: url("../Web-content/images/profile.webp");
        }
    </style>
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

    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        if ($error == 'companyNameNotCorrect') {
            echo '<p style="color:red;text-align:center;">Company\'s name not accepted</p>';
        }
        if ($error == 'ownerNameCorrect') {
            echo '<p style="color:red;text-align:center;">owner\'s name not accepted</p>';
        }
        if ($error == 'contactIncorrect') {
            echo '<p style="color:red;text-align:center;">owner\'s contact format not accepted</p>';
        }
        
        if ($error == 'imageTypeNotSupported') {
            echo '<p style="color:red;text-align:center;">only .jpg format for image is supported</p>';
        }
         
        if ($error == 'fileUploadError') {
            echo '<p style="color:red;text-align:center;">file upload error try again</p>';
        }
          
    }   
    
            echo '<div id="personal-data-customer" class="personal-data-customer">
        <div class="row">
            <h5 style="text-align:center;color:darkturquoise;">We need to know more about you!!!</h5>
            <form class="col s12" action="../Web-content/phpCode/serviceProvider1.php" method="post" enctype="multipart/form-data">
       
                <div class="input-field col s12 m12">
                    <i class="material-icons prefix">work</i>
                    <input id="company_name" v-model="company_name" v-on:keyup="checkCredentialFormatter" name="company_name" type="text" class="validate">
                    <label for="company_name">Company\'s Name</label>
                    <div class="companyName" style="color:green;text-align:center;">{{resultCompanyName}}</div>
                </div>
                <div class="input-field col s12 m12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="owner_name" v-model="owner_name" v-on:keyup="checkCredentialFormatter" name="owner_name" type="text" class="validate">
                    <label for="owner_name">Owner\'s Name</label>
                    <div class="ownerName" style="color:green;text-align:center;">{{resultOwnerName}}</div>
                </div>
       
                <div class="input-field col s12 m12">
                    <i class="material-icons prefix">phone</i>
                    <input id="icon_telephone" v-model="telephone_number" v-on:keyup="checkCredentialFormatter" name="company_contact" type="text" class="validate">
                    <label for="icon_telephone">Telephone</label>
                    <div class="telephone" style="color:green;text-align:center;">{{resultTelephone}}</div>
                </div>
                <div class="input-field col s12 m12">
                    <p style="color:darkblue">Location of company</p>
                    <select class="icons" name="company_location">
       
                        <option value="" disabled selected>Choose your option</option>
                        <option value="mumbai" data-icon="../Web-content/images/mumbai.jpg">Mumbai
                        </option>
                        <option value="pune" data-icon="../Web-content/images/pune.jpg">Pune</option>
                        <option value="nagpur" data-icon="../Web-content/images/nagpur.jpg">Nagpur</option>
                        <option value="thane" data-icon="../Web-content/images/thane.jpg">Thane</option>
                        
       
                    </select>
       
                </div>
                <div class="input-field col s12 m12">
                    <p style="color:darkblue">Service you can provide</p>
                    <select class="icons" name="company_select">
       
                        <option value="" disabled selected>Choose your option</option>
                        <option value="stageDecoration" data-icon="../Web-content/images/stage-decoration.jpg">Stage decoration
                        </option>
                        <option value="catering" data-icon="../Web-content/images/catering.jpg">Catering</option>
                        <option value="location" data-icon="../Web-content/images/location.jpg">location</option>
                        <option value="soundSystem" data-icon="../Web-content/images/sound.jpg">Sound System</option>
                        <option value="videography" data-icon="../Web-content/images/GridVideo.jpg">Videography</option>
                        <option value="costume" data-icon="../Web-content/images/GridMakeUp.jpg">Make Up & costume
                        </option>
       
                    </select>
       
                </div>
       
                <div class="input-field col s12 m12">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea id="textarea1" name="company_description" class="materialize-textarea"></textarea>
                    <label for="textarea1">describe about your company</label>
                </div><br/>
       
                <p>Select your profile pic:</p><input type="file" name="myFile"><br><br>
       
                
                <button type="submit" class="btn waves-effect waves-light btn-large" name="action-test">submit<i class="material-icons right">send</i></button>
       
                
       
       
            </form>
       
        </div>
       </div>
       ';
       
    
}
 ?>

   <?php
     
   ?>

    
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
        $('select').formSelect();

    });

    

</script>
 
 <script src="VueTest1.js"></script>



</html>


