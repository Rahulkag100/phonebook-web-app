<?php
    include('includes/connection.php');
    
    $id = $_GET['id'];
    
    $ans = " DELETE FROM phonebook WHERE id = $id ";
    
    mysqli_query($connection, $ans);
    
    header('location:index.php');
?>