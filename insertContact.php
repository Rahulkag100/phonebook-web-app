<?php

include('includes/connection.php');

// Get data from Add Contact form via AJAX
$name = $_POST['name'];
$dob = $_POST['dob'];
$mobiles = implode(',',$_POST['number']);
$emails = implode(',',$_POST['emails']);

// Fetching Details from Database
$ans = "SELECT mobiles FROM phonebook ";
$query = mysqli_query($connection, $ans);


while($result = mysqli_fetch_array($query)){
    $mobiles1 = explode(',',$result['mobiles']);
    $sameMobiles = array_intersect($_POST['number'],$mobiles1);
    if(count($sameMobiles) > 0){
        $existMobileList = implode(',',$sameMobiles);
        echo "<div class='alert alert-danger'>
                Sorry! User already exists on this/these ".$existMobileList." number(s).
              </div>";
        exit();
    }else{
        $inser1 = "INSERT INTO phonebook(name,dob,mobiles,emails) VALUES('$name','$dob','$mobiles','$emails')";
        $rQuery = mysqli_query($connection, $inser1);
        if($rQuery){
            echo "<div class='alert alert-success'>
                    Contact Added Successfully!
                  </div>";
            exit();
        }else{
            echo "<div class='alert alert-danger'>
                    Something went wrong. Please try after sometime.
                  </div>";
            exit();
        }
        
    }
}



?>