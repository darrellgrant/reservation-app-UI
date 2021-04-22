<?php
session_start();

if (!isset($_POST['cancel-confirmed'])){
    header("Location: ../404.php?cancel=invalid");
    exit();

    }else{
        include_once 'dbh.inc.php';
        $id = check_input($_POST['id']);
        $isCancelled = true;
       
        
        $sql = "UPDATE customer SET isCancelled='$isCancelled' WHERE customerID=$id;";
        mysqli_query($conn, $sql);
        
        header("Location: ../cancel.step3.php?Reservation-CANCELLED");
        exit(); 
       
	}



//end

function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}