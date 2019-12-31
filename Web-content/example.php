<?php

include('../Web-content/phpCode/databaseConnector.php');
session_start();


$input = filter_input_array(INPUT_POST);

$companyName = mysqli_real_escape_string($con,$input['companyName']);
$companyOwner = mysqli_real_escape_string($con,$input['companyOwner']);
$companyContact = mysqli_real_escape_string($con,$input['companyContact']);
$companyLocation = mysqli_real_escape_string($con,$input['companyLocation']);
$companyService = mysqli_real_escape_string($con,$input['companyService']);
$companyMessage = mysqli_real_escape_string($con,$input['companyMessage']);

if($input["action"] === 'edit'){

    $query = "
               update companydetails
               set companyName ='".$companyName."',
    
                companyOwner='".$companyOwner."',companyContact='".$companyContact."',companyLocation='".$companyLocation."',
                companyService='".$companyService."',companyMessage='".$companyMessage."' where username='".$input["username"]."'
                ";
     mysqli_query($con,$query);

     echo 'successful';

}

echo json_encode($input);

?>


