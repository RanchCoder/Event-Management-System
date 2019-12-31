<?php
   session_start();
   if (isset($_SESSION['userIdentity'])) {
       require '../Web-content/phpCode/databaseConnector.php';
       $username = $_SESSION['userIdentity'];
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

   
       $query = "select * from userprofileimage where username=?;";
       $stmt = mysqli_stmt_init($con);
   
       $status = 0;
       $_SESSION['userImageStatus'] = $status;
  
       if (!mysqli_stmt_prepare($stmt, $query)) {
           header("Location: job.php?error=preparestatementerror");
           exit();
       } else {
           mysqli_stmt_bind_param($stmt, "s", $username);
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $resultCheck = mysqli_stmt_num_rows($stmt);
           if ($resultCheck > 0) {
               header("Location: ../Web-content/jobFormatter.php?error=userAlreadySuccess");
               echo $_SESSION['userIdentity']." ".$_SESSION['userImageStatus'];
               exit();
           } else {
               $query = "insert into userprofileimage (username,userStatus) values(?,?)";
               $stmt1 = mysqli_stmt_init($con);

               if (!mysqli_stmt_prepare($stmt1, $query)) {
                   header("Location: job.php?error=preparestatementerror");
                   exit();
               } else {
                   mysqli_stmt_bind_param($stmt1, "si", $username, $status);
                   mysqli_stmt_execute($stmt1);
               
              
                   header("Location: ../Web-content/jobFormatter.php?Success=newDataAdded");
                   echo $_SESSION['userIdentity'].$_SESSION['userImageStatus'];
                   exit();
               }
           }
       }
   } else {
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
