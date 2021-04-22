<?php
session_start();

if (!isset($_POST['send-cancel-data'])){
    header("Location: ../404.php?cancel=invalid");
    exit();

    }else{
        include_once 'dbh.inc.php';
        $firstname = check_input($_POST['firstname']);
        $lastname = check_input($_POST['lastname']);
        $phone = check_input($_POST['phone']);

        

        
        $sql = "SELECT * FROM customer WHERE firstname='$firstname' AND lastname='$lastname' AND phone='$phone'";
        $result = mysqli_query($conn, $sql);
	    $resultCheck = mysqli_num_rows($result);

            if ($resultCheck < 1) {

               
            $_SESSION['message'] = "Sorry, the info you entered<br> was not found in our database.";
            
            header("Location: ../cancel.step1.php?cancellation-error:guest-not-found");
            exit();
                }else{
                
                $row = mysqli_fetch_assoc($result);
                if($row['isCancelled']==1){
                    $_SESSION['message'] = "Sorry, looks like that<br> Reservation was already cancelled.";
                    header('Location: ../cancel.step1.php?CANCELLED');
                    exit();
                }
                $_SESSION['guest-cancel'] = $row['customerID'];
                $_SESSION["guest-firstname"] = $row['firstname'];
                $_SESSION["guest-lastname"] = $row['lastname'];
                header("Location: ../cancel.step2.php?cancel-data-sent");
                exit();
                }
	}
//end

function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}