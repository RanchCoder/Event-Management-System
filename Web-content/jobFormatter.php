<?php
include('../Web-content/phpCode/databaseConnector.php');
session_start();
if (isset($_SESSION['userIdentity'])) {
  //  echo $_SESSION['userImageStatus'];
    $username1 = $_SESSION['userIdentity'];
    $query = "SELECT * from jobseeker where username=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("Location: ../phpCode/job1.php?error=sqlError");
      //  echo 'error';
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username1);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
       // echo 'hello dude'.$resultCheck;
        if ($resultCheck > 0) {
         //   echo 'we got it';
            header("Location: ../Web-content/profilePages/jobProfile.php");
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
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css"
        rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    <title>Document</title>
 
    <style>
        .personal-data-applicant {
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

         <li><a href="../phpCode/logout.php">logout</a></li>

     </ul>

 </div>
</nav>
<ul class="sidenav" id="mobile-links">

<li><a href="diveIn.php">Dive In</a></li>


<li><a href="statistics.php">statistics</a></li>

<li><a href="../phpCode/logout.php">logout</a></li>

</ul>';
}


 ?>



<?php
     if (isset($_GET['error'])) {
         $error = $_GET['error'];
         if ($error == 'companyNameNotCorrect') {
             echo '<p style="color:red">Company\'s name not accepted</p>';
         }
         if ($error == 'ownerNameCorrect') {
             echo '<p style="color:red">owner\'s name not accepted</p>';
         }
         if ($error == 'contactIncorrect') {
             echo '<p style="color:red">owner\'s contact format not accepted</p>';
         }

         if ($error == 'imageTypeNotSupported') {
            echo '<p style="color:red">only .jpg format for image is supported</p>';
        }
     }
   ?>







<div id="personal-data-applicant" class="personal-data-applicant">
        <div class="row">
            <h5 style="text-align:center;color:darkturquoise;">We need to know more about you!!!</h5>
            <form class="col s12" action="../Web-content/phpCode/job1.php" method="post" enctype="multipart/form-data">

                <div class="input-field col s12 m12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="applicant_name" v-model="applicant_name" v-on:keyup="checkCredentialFormatter1"
                        name="applicant_name" type="text" class="validate">
                    <label for="applicant_name">Applicant's first Name</label>
                    <div class="applicantName" style="color:green;text-align:center;">{{resultApplicantName}}</div>
                </div>

                <div class="input-field col s12 m12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="applicant_last_name" v-model="applicant_last_name" v-on:keyup="checkCredentialFormatter1"
                        name="applicant_last_name" type="text" class="validate">
                    <label for="applicant_last_name">Applicant's last Name</label>
                    <div class="applicantLastName" style="color:green;text-align:center;">{{resultApplicantLastName}}
                    </div>
                </div>

                <div class="input-field col s12 m12">
                    <i class="material-icons prefix">phone</i>
                    <input id="icon_telephone" v-model="telephone_number" v-on:keyup="checkCredentialFormatter1"
                        name="applicant_contact" type="text" class="validate">
                    <label for="icon_telephone">Applicants contact</label>
                    <div class="telephone" style="color:green;text-align:center;">{{resultTelephone}}</div>
                </div>

             


                



                <div class="input-field col s12 m12">
                    <p style="color:darkblue">Applicant's resident location</p>
                    <select class="icons" name="applicant_location">

                        <option value="" disabled selected>Choose your option</option>
                        <option value="mumbai" data-icon="../Web-content/images/mumbai.jpg">Mumbai
                        </option>
                        <option value="pune" data-icon="../Web-content/images/pune.jpg">Pune</option>
                        <option value="nagpur" data-icon="../Web-content/images/nagpur.jpg">Nagpur</option>
                        <option value="thane" data-icon="../Web-content/images/thane.jpg">Thane</option>


                    </select>

                </div>
                <div id="sideCheckBox" class="sideCheckBox">
                    <div id="sideMenu" class="sideMenu">
                        <p id="city" style="color:darkblue">Select your qualifications</p>
                        <?php
                                $query = "select degreeName from degree";
                                $result = $con->query($query);

               
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>

                        <div class="list-item-check checkbox">

                            <ul class="collection">
                                <li class="collection-item">
                                    <label>
                                        <input id="indeterminate-checkbox" type="checkbox" class="common-selector brand" name="check_list[]"
                                            value="<?php echo $row['degreeName']?>" />
                                        <span><?php echo $row['degreeName']?></span>
                                    </label>
                                </li>
                            </ul>

                        </div>
                        <?php
                                    }
                                }
            ?>
                    </div>

                </div>

                


                <p>Select your profile pic:</p><input type="file" name="myFile"><br><br>


                <button type="submit" class="btn waves-effect waves-light btn-large" name="action-test">submit<i
                        class="material-icons right">send</i></button>




            </form>

        </div>
    </div>


   
</body>
<!-- jquery cdn-->

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


<script src="VueTestJob.js"></script>
<script>

    $(document).ready(function () {
        $('.tooltipped').tooltip();
        $('.sidenav').sidenav();
        $('select').formSelect();

        

    });

    

</script>
 
 




</html>
