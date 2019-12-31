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

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script src="../Web-content/jqueryTableEdit/jquery.tabledit.min.js"></script>


    
    <style>
       
    .container-box {
        width: 500px;
        height: auto;
        border: 1px solid white;
        box-sizing: border-box;
        margin: 50px auto;
    }

    .flex-Container {
        display: flex;
        flex-direction: row;
    }

    .icon {
        margin-top: 40px;
        margin-right: 30px;
    }

    .icon:hover {
        transform: scale(1.4);
    }

    .bottomList {
        line-height: 2;
        text-align: center;
        font-size: 17px;
        list-style-type: none;
    }

    .bottomList li:hover {
        cursor: pointer;
        transform: scale(1.4);
    }

    .grid {
        display: grid;
        grid-gap: 1em;
        width: 100%;
        margin: 10px;
        grid-template-columns: repeat(5, 1fr);
        grid-auto-rows: minmax(200px, auto);
        grid-template-areas:
            "side main main main main"
            "side main main main main";
    }

    .side {
        grid-area: side;
    }

    .main {
        grid-area: main;
    }


    .grid>.side {
        background:  #f3e5f5;
    }

    .collection-item {
        border: 1px solid white;
    }


    .side {
        display: grid;
        grid-gap: 1em;
        width: 100%;
        grid-template-columns: repeat(1, 1fr);
        grid-auto-rows: minmax(200px, auto);
        grid-template-areas:
            "boxImage"
            "textFig"
            "textFig";
    }

    .boxImage {
        margin: 10px;
        border: 5px solid #f5f5f5;
        box-sizing: border-box;
        background: white;
        grid-area: boxImage;
        background-image: url("../images/companyLogo.jpg");
        background-size: 100% 90%;
    }

    .text {
        grid-area: textFig;
    }


   


    .card:hover {
        box-shadow: 5px 5px 5px 5px #888888;
    }

    .card {
        background-image: linear-gradient(to right, #faffd1, #a1ffce);
    }

    .card-content {
        background-image: linear-gradient(to right, #f4e2d8, #ba5370);
    }
    

    .navbar {
    color:white;
    background-color: #4a148c;
    border-color: #E7E7E7;
    }

    .nav-link{
        color:white;
    }
    .navbar-brand{
        color:white;
    }

    .nav-link:hover{
        color:white;
        background-color:#6a1b9a;
    }


    .navbar-brand:hover{
        color:white;
    }



    

</style>
    

</head>

<body onload="tableData()">
<nav class="navbar navbar-expand-lg">
  <button class="navbar-toggler" style="background:white;" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" ></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
  <a href="" class="navbar-brand">RV Events</a>
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      <a class="nav-link" href="../Web-content/JobSeekerList.php">job Seekers</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="../Web-content/NewServices.php">Service Providers</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="../Web-content/NewCustomers.php">Customers</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="../Web-content/NewUpdateRequested.php">Requested update</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="../Web-content/phpCode/logout.php">logout</a></li>

      </li>

    </ul>
    
  </div>
</nav>

<div class="grid" id="grid">



        <div class="side">

            <div class="boxImage"></div>
            <div class="text">

                <div class="list-group">
                    <li><a href="../Web-content/JobSeekerList.php" class="list-group-item list-group-item-action">job Seekers</a></li>


                    <li><a href="../Web-content/NewServices.php" class="list-group-item list-group-item-action">Service Providers</a></li>
                    <li><a href="../Web-content/NewCustomers.php" class="list-group-item list-group-item-action">Customers</a></li>
                    <li><a href="../Web-content/NewUpdateRequested.php" class="list-group-item list-group-item-action">Requested update</a></li>
                    <li><a href="../Web-content/NewEvents.php" class="list-group-item list-group-item-action">Upcoming Events</a></li>
                    <li><a href="../Web-content/executeUpdate.php" class="list-group-item list-group-item-action">update job seeker</a></li>
                    <li><a href="../Web-content/executeUpdateService.php" class="list-group-item list-group-item-action">update service provider</a></li>
                    <li><a href="../Web-content/phpCode/logout.php" class="list-group-item list-group-item-action">logout</a></li>
                </div>

            </div>


        </div>
        <div class="main" style="color:#8d6e63; text-align:center;">
            


            
        <table class="table table-hover" id="example6" style="cursor:pointer;text-align:center;color:#8d6e63;">
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
              $stmt = mysqli_query($con,"SELECT * FROM jobseeker");
              if (mysqli_num_rows($stmt) > 0) {
                  // output data of each row
                while ($row = mysqli_fetch_assoc($stmt)) {
                    ?>
              <tbody>
                  <tr>
                      <td><?php echo $row['username']?></td>
                      <td><?php echo $row['seekerId']?></td>
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
            <!-- jquery cdn-->


           
            <script>
              $('#example6').Tabledit({
    url: 'example.php',
    columns: {
        identifier: [0, 'seekerId'],
        editable: [[1, 'seekerName'], [2, 'seekerLastName'], [3, 'seekerContact']]
    }
});
</script>
                
             
            


        </div>
    </div>
</body>
