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
    <div class="table-responsive">
        <table class="table table-hover" style="cursor:pointer" id="example1">
        <thead>
                <tr>
                    <th>username</th>
                    <th>company Id</th>
                    <th>company Name</th>
                    <th>company owner</th>
                    <th>company Contact</th>
                    <th>company Location</th>
                    
                    <th>company Service</th>
                    <th>company message</th>
                </tr>
              </thead>
            <tbody>
            <?php
              $stmt = mysqli_query($con,"SELECT * FROM companydetails");
              if (mysqli_num_rows($stmt) > 0) {
                  // output data of each row
                while ($row = mysqli_fetch_assoc($stmt)) {
                    ?>
              <tbody>
                  <tr>
                      <td><?php echo $row['username']?></td>
                      <td><?php echo $row['companyId']?></td>
                      <td><?php echo $row['companyName']?></td>
                      <td><?php echo $row['companyOwner']?></td>
                      <td><?php echo $row['companyContact']?></td>
                      <td><?php echo $row['companyLocation']?></td>
                      <td><?php echo $row['companyService']?></td>
                      <td><?php echo $row['companyMessage']?></td>
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
    url: '../Web-Content/example.php',
    columns: {
        identifier: [0, 'username'],
        editable: [[2, 'companyName'], [3, 'companyOwner'], [4, 'companyContact'] ,[5, 'companyLocation'],[6, 'companyService'],[7, 'companyMessage']]
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