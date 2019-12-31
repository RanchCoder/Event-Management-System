session_start();
                          $_SESSION['userIdentity'] = $row['userName'];
                          if ($row['requirement'] == 'job') {
                              header("Location: ../profilePages/jobProfile.php?Login=success");
                              exit();
                          } elseif ($row['requirement'] == 'customer') {
                              header("Location: ../profilePages/customerProfile.php?Login=success");
                              exit();
                          } elseif ($row['requirement'] == 'serviceProvider') {
                              header("Location: ../profilePages/serviceProviderProfile.php?Login=success");
                              exit();
                          } elseif ($row['requirement'] == 'admin') {
                              header("Location: ../adminDashBoard.html?Login=success");
                              exit();
                          }













                          else {
                      
                  }