<?php
  
  if (isset($_POST['action-login'])) {
      require '../phpCode/databaseConnector.php';
      $username = $_POST['username'];
      $emailId = $_POST['emailId'];
      $password = $_POST['password'];

      if (empty($emailId) || empty($password)) {
          header("Location: ../login.php?error=incompleteFormData");
          exit();
      } elseif (!filter_var($emailId, FILTER_VALIDATE_EMAIL) && !preg_match("/^[A-Za-z\s.\(\)0-9]{3,}$/", $username)) {
          header("Location: ../login.php?error=invalideuserNameAndemailId");
          exit();
      } elseif (!filter_var($emailId, FILTER_VALIDATE_EMAIL)) {
          header("Location: ../login.php?error=invalidemail&username=".$username);
          exit();
      } elseif (!preg_match("/^[A-Za-z\s.\(\)0-9]{3,}$/", $username)) {
          header("Location: ../login.php?error=invalideuserName&email=".$emailId);
          exit();
      } 
      
      else {
          $query = "select * from usersignupdata where userName=?;";
          $stmt = mysqli_stmt_init($con);
      
          if (!mysqli_stmt_prepare($stmt, $query)) {
              header("Location: ../login.php?error=LoginError");
              exit();
          } else {
              mysqli_stmt_bind_param($stmt, "s", $username);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              if ($row = mysqli_fetch_assoc($result)) {
                  if (mysqli_num_rows($result) > 0) {


                      //direct to page
                      $pwdCheck = password_verify($password, $row['userPassword']);
                      if ($pwdCheck == false) {
                          header("Location: ../login.php?error=wrongpassword");
                          exit();
                      } elseif ($pwdCheck == true) {
                          session_start();
                          $_SESSION['userIdentity'] = $row['userName'];
                          if ($row['requirement'] == 'job') {
                              header("Location: ../job.php?Login=success");
                              exit();
                          } elseif ($row['requirement'] == 'customer') {
                              header("Location: ../customer.php?Login=success");
                              exit();
                          } elseif ($row['requirement'] == 'serviceProvider') {
                              header("Location: ../serviceProvider.php?Login=success");
                              exit();
                          } elseif ($row['requirement'] == 'admin') {
                              header("Location: ../adminDashBoard.html?Login=success");
                              exit();
                          }
                      } else {
                          header("Location: ../login.php?error=wrongpassword");
                          exit();
                      }
                  }
              } else {
                  header("Location: ../login.php?error=NoUser");
                  exit();
              }
          }

          
      }
  } else {
      header("Location: ../login.php?error=thisisamess");
      exit();
  }
