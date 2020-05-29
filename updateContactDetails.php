<?php

include('includes/connection.php');

$id = $_POST['id'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$mobiles = implode(',',$_POST['number']);
$emails = implode(',',$_POST['emails']);

$ans = "SELECT mobiles FROM phonebook WHERE id != $id";
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
        $inser1 = "UPDATE phonebook SET name='$name', dob='$dob', mobiles='$mobiles', emails='$emails' WHERE id = $id";
        $runQuery = mysqli_query($connection, $inser1);
        if($runQuery){
            echo "<div class='alert alert-success'>
                    Contact Updated Successfully!
                  </div>";
            exit();
        }else{
            echo "<div class='alert alert-danger'>
                    Something went wrong. Please try after sometime.........
                  </div>";
            exit();
        }
        
    }
}



?>