<?php
session_start();
// make sure users arrive here via the button and not thru url window


if (isset($_POST['submitForm'])) {
    include_once 'dbh.inc.php';
	$fname = check_input($_POST['first-name']);
	$lname = check_input($_POST['last-name']);
	
	$phone = check_input($_POST['phone']);
	//filter date:
	$filtered_date = check_input($_POST['dateInput']);
	//convert date from datepicker format to mysql format:
	$date = date('Y-m-d', strtotime($filtered_date));
	$time = check_input($_POST['timeInput']);
	$guestNUM = check_input($_POST['guests']);
	$accomodations = check_input($_POST['accomodations']);
	$note = check_input($_POST['special-note']);
	$preference = check_input($_POST['preference']);
	
	if (
		empty($fname) ||
		empty($lname) ||
		empty($phone)  ||
		empty($date) ||
		empty($time) ||
		empty($guestNUM)||
		empty($accomodations) ||
		empty($preference)
	){
	header("Location: ../reservation.php?missing_info");
	exit();
	}
	else
	{
	$sql = "INSERT INTO customer (firstname, lastname, phone, user_date, user_time, guests, needsAccess, accessNote, smokePref)
	 VALUES('$fname', '$lname', '$phone', '$date', '$time', '$guestNUM', '$accomodations', '$note', '$preference');";
	 mysqli_query($conn, $sql);

	$sql2 = "SELECT customerID FROM customer WHERE phone='$phone' AND lastname='$lname'";
	$result = mysqli_query($conn, $sql2);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck < 1) {
		header("Location: ../404.php");
		exit();
	}else{
		$row = mysqli_fetch_assoc($result);
		$_SESSION['guest'] = $row['customerID'];
		header("Location: ../guestinfo.php");
		exit();

	}
	
	
	}

}//end isset from submitForm




function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
