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
           $cname = $_POST['company_name'];
           $oname = $_POST['owner_name'];
           $cContact = $_POST['company_contact'];
           $clocation = $_POST['company_location'];
           $cselect = $_POST['company_select'];
           $cdescription = $_POST['company_description'];

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

           $allowed = array('jpg');

           //now check if users file has one of the following extensions

           if (in_array($fileActualExtension, $allowed)) {
               if ($fileError == 0) {
                   if ($fileSize < 4000000) {
                       $fileNameNew = $_SESSION['userIdentity'].".".$fileActualExtension;
                       $_SESSION['userImageName'] = $fileNameNew;
                       $fileDestination = "../images/profileImages/serviceProvider/".$fileNameNew;
                       move_uploaded_file($fileTmpName, $fileDestination);
                       
                       $query = "update userprofileimage set userStatus=1 where username='$username1'";
                       
                       if (mysqli_query($con, $query)) {
                           echo"suceesfully updated";
                       } else {
                           echo"unsuccessful update";
                       }
                   } else {
                       header("Location: ../formatter.php?error=fileSizeTooLarge");
                       exit();
                   }
               } else {
                   header("Location: ../formatter.php?error=fileUploadError");
                   exit();
               }
           } else {
               header("Location: ../formatter.php?error=imageTypeNotSupported");
               exit();
           }


           if(empty($cname) || empty($oname) || empty($cContact)){
            header("Location: ../formatter.php?error=emtpyfields");
            exit();
               
           }
           else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s+]{8,}$/", $cname)){
            header("Location: ../formatter.php?error=companyNameNotCorrect");
            exit();

           }
           else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s+]{8,}$/", $oname)){
            header("Location: ../formatter.php?error=ownerNameCorrect");
            exit();

           }
           else if(!preg_match("/^\d{10}$/", $cContact)){
            header("Location: ../formatter.php?error=contactIncorrect");
            exit();

           }
           else{
            $query = "select username from companydetails where username = ?";
            $stmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($stmt, $query)) {
                header("Location: ../phpCode/serviceProvider1.php?error=sqlError");
 
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $username1);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: ../phpCode/serviceProvider1.php?error=Username Not available");
                    exit();
                } else {
                    $query1 = "insert into companydetails (username,companyName,companyOwner,companyContact,companyLocation,companyService,companyMessage) values (?,?,?,?,?,?,?)";
 
                    $stmtInsert = mysqli_stmt_init($con);
                    if (!mysqli_stmt_prepare($stmtInsert, $query1)) {
                        header("Location: ../phpCode/serviceProvider1.php?error=sqlerror");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmtInsert, "sssssss", $username1, $cname, $oname, $cContact, $clocation, $cselect, $cdescription);
                        mysqli_stmt_execute($stmtInsert);
                        $_SESSION['userImageStatus'] = 1;
                        header("Location: ../profilePages/serviceProviderProfile.php?LoginStatus=successOfcompany");
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
