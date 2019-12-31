<?php


 if (isset($_POST['action-submit'])) {
     require 'databaseConnector.php';

     $username = $_POST['username'];
     $email = $_POST['emailId'];
     $password = $_POST['password'];
     $repassword = $_POST['repassword'];
     $radioOption = $_POST['group1'];

    
     if (empty($username) || empty($email) || empty($password) || empty($radioOption)) {
         header("Location: /signUp1.php?error=emtpyfields&username=".$username."&emailId=".$email);
         exit();
     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $username)) {
         header("Location: ../SignUp1.php?error=invalideuserNameemailId");
         exit();
     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         header("Location: ../SignUp1.php?error=invalidemail&username=".$username);
         exit();
     } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $username)) {
         header("Location: ../SignUp1.php?error=invalideuserName&email=".$emailId);
         exit();
     }else if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password)){
        header("Location: ../SignUp1.php?error=invalidPassword&email=".$emailId);
        exit();
         
     } 
     elseif ($password !== $repassword) {
         header("Location: ../SignUp1.php?error=passwordCheck&username=".$username."&emailId=".$email);
         exit();
     } else {
         $query = "select userName from usersignupdata where userName = ?";
         $stmt = mysqli_stmt_init($con);
         if (!mysqli_stmt_prepare($stmt, $query)) {
             header("Location: ../SignUp1.php?error=sqlError");

             exit();
         } else {
             mysqli_stmt_bind_param($stmt, "s", $username);
             mysqli_stmt_execute($stmt);
             mysqli_stmt_store_result($stmt);
             $resultCheck = mysqli_stmt_num_rows($stmt);

             if ($resultCheck > 0) {
                 header("Location: ../SignUp1.php?error=Username Not available");
                 exit();
             } else {
                 $query = "insert into usersignupdata (userName,userEmail,userPassword,requirement) values (?,?,?,?)";
                 $stmtInsert = mysqli_stmt_init($con);
                 if (!mysqli_stmt_prepare($stmtInsert, $query)) {
                     header("Location: ../SignUp1.php?error=sqlerror");
                     exit();
                 } else {
                     //we excrypt password using bycrypt algorithm

                     $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                     mysqli_stmt_bind_param($stmtInsert, "ssss", $username, $email, $hashPassword, $radioOption);
                     mysqli_stmt_execute($stmtInsert);
                     header("Location: ../SignUp1.php?LoginStatus=success");
                     exit();
                 }
                  
                 


             }
         }
     }
     mysqli_stmt_close($stmt);
     mysqli_close($con);
 }

 else{
    header("Location: ../SignUp1.php?error=Username Not available");
    exit();
 }
