<?php

include('../Web-content/phpCode/databaseConnector.php');
session_start();


$input = filter_input_array(INPUT_POST);
$userId = mysqli_real_escape_string($con,$input['seekerId']);
$username = mysqli_real_escape_string($con,$input['username']);
echo $username;
$seekerName = mysqli_real_escape_string($con,$input['seekerName']);
$seekerLastName = mysqli_real_escape_string($con,$input['seekerLastName']);
$seekerContact = mysqli_real_escape_string($con,$input['seekerContact']);
$seekerLocation = mysqli_real_escape_string($con,$input['seekerLocation']);
$seekerEducation = mysqli_real_escape_string($con,$input['seekerEducation']);


if($input["action"] === 'edit'){

    $query = "INSERT into requestupdatejobseeker(username,userId,seekerName,seekerLastName,seekerContact,seekerLocation,seekerEducation) values ('".$username."',$userId,'".$seekerName."','".$seekerLastName."','".$seekerContact."','".$seekerLocation."','".$seekerEducation."')";
     mysqli_query($con,$query);

     echo 'successful';

}

echo json_encode($input);

?>


