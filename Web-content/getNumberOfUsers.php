<?php

include('../Web-content/phpCode/databaseConnector.php');
if(isset($_POST['nouser'])){
  
    $result=mysqli_query($con,"SELECT count(*) as total from usersignupdata");
    $data=mysqli_fetch_assoc($result);
    echo $data['total'];
}
else{
//    echo 'not set';
   
  

}

if(isset($_POST['noservice'])){
  
    $result=mysqli_query($con,"SELECT count(*) as total from usersignupdata where requirement='serviceProvider'");
    $data=mysqli_fetch_assoc($result);
    echo $data['total'];
}
else{
  //  echo 'not set';
   
  

}
if(isset($_POST['nojob'])){
  
    $result=mysqli_query($con,"SELECT count(*) as total from usersignupdata where requirement='job'");
    $data=mysqli_fetch_assoc($result);
    echo $data['total'];
}
else{
  //  echo 'not set';
   
  

}

if(isset($_POST['nocustomer'])){
  
    $result=mysqli_query($con,"SELECT count(*) as total from usersignupdata where requirement='customer'");
    $data=mysqli_fetch_assoc($result);
    if($data['total'] > 0){
        echo $data['total'];
    }
    else{
        echo '0';
    }
}
else{
  //  echo 'not set';
   
  

}

?>