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
    <script
			  src="https://code.jquery.com/jquery-2.2.4.min.js"
			  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
			  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
    <script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="../Web-content/jqueryTableEdit/jquery.tabledit.min.js"></script>
    <title>Document</title>
</head>
<style>
    .navbar-brand:hover{
        color:white;
    }
    .navbar-brand{
        color:white;
    }
    .navbar {
    color:white;
    background-color: #4a148c;
    border-color: #E7E7E7;
    }
    .navbar>a:hover{
        color:white;
    }
    li>a{
        color:white;
    }
    #updatemessage{

        text-align: center;
        background-color: #e5eecc;
        border: solid 1px #c3c3c3;

    }
    #updatemessage {
            padding: 50px;
            display: none;
}
</style>

<body>
<nav class="navbar navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="glyphicon glyphicon-tint white"></span>
                </button>
                <a href="../Web-content/adminDashBoard.html" class="navbar-brand">RV Events</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../Web-content/JobSeekerList.php">job Seekers</a>
                    </li>
                    <li>
                        <a href="../Web-content/NewServices.php">Service Providers</a>
                    </li>
                    <li>
                        <a href="../Web-content/NewCustomers.php">Customers</a>
                    </li>
                    <li>
                        <a href="../Web-content/NewUpdateRequested.php">Requested update</a>
                    </li>
                    

                    <li><a href="../Web-content/executeUpdate.php">update job seeker</a></li>
                    <li><a href="../Web-content/executeUpdateService.php">update service provider</a></li>
                    <li>
                        <a href="../Web-content/phpCode/logout.php">logout</a></li>

                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div id="updatemessage">DATA Updated</div>
    <div class="table-responsive">
        <table class="table table-hover" style="cursor:pointer" id="example1">
        <thead>
                <tr >
                    <th>username</th>
                    <th >seeker Id</th>
                    <th>seeker Name</th>
                    <th>seeker lastname</th>
                    <th>seeker contact</th>
                    <th>seeker location</th>
                    
                    <th>seeker education</th>
                </tr>
              </thead>
              <?php
              $stmt = mysqli_query($con,"SELECT * FROM requestupdatejobseeker");
              if (mysqli_num_rows($stmt) > 0) {
                  // output data of each row
                while ($row = mysqli_fetch_assoc($stmt)) {
                    ?>
              <tbody>
                  <tr>
                      <td><?php echo $row['username']?></td>
                      <td><?php echo $row['userId']?></td>
                      <td><?php echo $row['seekerName']?></td>
                      <td><?php echo $row['seekerLastName']?></td>
                      <td><?php echo $row['seekerContact']?></td>
                      <td><?php echo $row['seekerLocation']?></td>
                      <td><?php echo $row['seekerEducation']?></td>
                  </tr>

                <?php
                }
              }?>
                
              </tbody>
        </table>

    </div>



</body>

<script>
   
   $('#example1').Tabledit({
    url: '../Web-Content/NewUpdateRequested1.php',
    columns: {
        identifier: [1, 'seekerId'],
        editable: [[0, 'username'],[2, 'seekerName'], [3, 'seekerLastName'], [4, 'seekerContact'] ,[5, 'seekerLocation'],[6, 'seekerEducation']]
    },
    restoreButton:false,
    onSuccess:function(data,textStatus,jqXHR){
        if(data.action == 'delete'){

            $('#'+data.id).remove();

        }

        
        

    }
});



</script>

</html>