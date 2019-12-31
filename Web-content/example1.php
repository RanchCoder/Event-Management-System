<?php

include('../Web-content/phpCode/databaseConnector.php');
session_start();


$input = filter_input_array(INPUT_POST);

$seekerName = mysqli_real_escape_string($con,$input['seekerName']);
$seekerLastName = mysqli_real_escape_string($con,$input['seekerLastName']);
$seekerContact = mysqli_real_escape_string($con,$input['seekerContact']);
$seekerLocation = mysqli_real_escape_string($con,$input['seekerLocation']);
$seekerEducation = mysqli_real_escape_string($con,$input['seekerEducation']);


if($input["action"] === 'edit'){

    $query = "
               update jobseeker
               set seekerName ='".$seekerName."',
    
                seekerLastName='".$seekerLastName."',seekerContact='".$seekerContact."',seekerLocation='".$seekerLocation."',
                seekerEducation='".$seekerEducation."' where username='".$input["username"]."'
                ";
     mysqli_query($con,$query);

     echo 'successful';

}

echo json_encode($input);

?>


