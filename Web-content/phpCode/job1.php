<?php
   session_start();
   if (isset($_SESSION['userIdentity'])) {
       $username1 = $_SESSION['userIdentity'];
       require 'databaseConnector.php';
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
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Unica+One&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  

</head>

<body>

<?php
   if (isset($_SESSION['userIdentity'])) {
       echo ' <nav class="nav wrapper blue-grey">
    <div class="container">
        <a href="../Home.php" class="brand-logo">RV Events</a>
        <a href="" class="sidenav-trigger" data-target="mobile-links">
            <i class="material-icons">
                menu
            </i>
        </a>
        <ul class="right hide-on-med-and-down">

            <li><a href="../diveIn.php">Dive In</a></li>


            <li><a href="../statistics.php">statistics</a></li>

            <li><a href="../phpCode/logout.php">logout</a></li>

        </ul>

    </div>
</nav>
<ul class="sidenav" id="mobile-links">

<li><a href="../diveIn.php">Dive In</a></li>


<li><a href="../statistics.php">statistics</a></li>

<li><a href="../phpCode/logout.php">logout</a></li>

</ul>';

       if (isset($_POST['action-test'])) {
           //collect form data
           $aname = $_POST['applicant_name'];
           $aLname = $_POST['applicant_last_name'];
           $aContact = $_POST['applicant_contact'];
           $alocation = $_POST['applicant_location'];
           $aDegree = $_POST['check_list'];

           $split = implode(",",$aDegree);

           //collect all file details
           $file = $_FILES['myFile'];
           $filename = $_FILES['myFile']['name'];
           $fileTmpName = $_FILES['myFile']['tmp_name'];
           $fileSize = $_FILES['myFile']['size'];
           $fileError = $_FILES['myFile']['error'];
           $fileType = $_FILES['myFile']['type'];

           //explode will split the file name based on the occurence of dot.
           // will generate an array and store in the variable $fileExtension.
           $fileExtension = explode('.', $filename);

           //fileActualExtension will collect the file name in lower case when we use strToLower
           //end returns the last element of the array $fileExtension
           $fileActualExtension = strToLower(end($fileExtension));
    
           // now we will create an array of allowed extensions.

           $allowed = array('jpg','jpeg','png','pdf');

           //now check if users file has one of the following extensions

           if (in_array($fileActualExtension, $allowed)) {
               if ($fileError == 0) {
                   if ($fileSize < 4000000) {
                       $fileNameNew = $_SESSION['userIdentity'].".".$fileActualExtension;
                       $fileDestination = "../images/profileImages/jobSeeker/".$fileNameNew;
                       move_uploaded_file($fileTmpName, $fileDestination);
                
                       $query = "update userprofileimage set userStatus=1 where username='$username1'";
                
                       if (mysqli_query($con, $query)) {
                           echo"suceesfully updated";
                       } else {
                           echo"unsuccessful update";
                       }
                   } else {
                       header("Location: /jobFormatter.php?error=fileSizeTooLarge");
                       exit();
                   }
               } else {
                   header("Location: /jobFormatter.php?error=fileUploadError");
                   exit();
               }
           } else {
               header("Location: /jobFormatter.php?error=imageTypeNotSupported");
               exit();
           }


           if (empty($aname) || empty($aLname) || empty($aContact)) {
               header("Location: /jobFormatter.php?error=emtpyfields");
               exit();
           } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{3,}$/", $aname)) {
               header("Location: ../jobFormatter.php?error=companyNameNotCorrect");
               exit();
           } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{3,}$/", $aLname)) {
               header("Location:  ../jobFormatter.php?error=ownerNameCorrect");
               exit();
           } elseif (!preg_match("/^\d{10}$/", $aContact)) {
               header("Location: ../jobFormatter.php?error=contactIncorrect");
               exit();
           } else {
               $query = "select username from jobseeker where username = ?";
               $stmt = mysqli_stmt_init($con);
               if (!mysqli_stmt_prepare($stmt, $query)) {
                   header("Location: ../jobFormatter.php?error=sqlError");

                   exit();
               } else {
                   mysqli_stmt_bind_param($stmt, "s", $username1);
                   mysqli_stmt_execute($stmt);
                   mysqli_stmt_store_result($stmt);
                   $resultCheck = mysqli_stmt_num_rows($stmt);
                   if ($resultCheck > 0) {
                       header("Location: ../jobFormatter.php?error=Username Not available");
                       exit();
                   } else {
                       $query1 = "insert into jobseeker (username,seekerName,seekerLastName,seekerContact,seekerLocation,seekerEducation) values (?,?,?,?,?,?)";

                       $stmtInsert = mysqli_stmt_init($con);
                       if (!mysqli_stmt_prepare($stmtInsert, $query1)) {
                           header("Location: ../jobFormatter.php?error=InsertError");
                           exit();
                       } else {
                           mysqli_stmt_bind_param($stmtInsert, "ssssss", $username1, $aname, $aLname, $aContact, $alocation, $split);
                           mysqli_stmt_execute($stmtInsert);
                           header("Location: ../profilePages/jobProfile.php?LoginStatus=successOfSeeker");
                           exit();
                       }
                   }
               }
           }
       }
   }
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

});


</script>

<script src="VueTest1.js"></script>

</html>


