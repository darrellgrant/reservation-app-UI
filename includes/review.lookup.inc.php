<?php
session_start();

if (!isset($_POST['send-review-data'])){
    header("Location: ../review.php?review=invalid");
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
            header("Location: ../review.php?review-error:guest-not-found");
            exit();
                }else{

                
        
                
                $row = mysqli_fetch_assoc($result);

                if($row['isCancelled']==1){
                    $_SESSION['message'] = "Sorry, looks like that<br> Reservation has been cancelled.";
                    header('Location: ../review.php?CANCELLED');
                    exit();
                }else{

                $_SESSION['guest'] = $row['customerID'];
                $_SESSION["guest-firstname"] = $row['firstname'];
                $_SESSION["guest-lastname"] = $row['lastname'];
                header("Location: ../guestinfo.php");
                exit();
                }
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