<?php
session_start();

if(!isset($_POST['submitUpdate'])){
	header("Location: ../404.php?update=invalid");
	exit();
	}else{
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
	$customerID = check_input($_POST['customerID']);
	//hidden value from update.php --> should equal 'special-note'/$note value
	$tempNote = check_input($_POST['temp-note']);

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
	header("Location ../404.php?missing_info");
	exit();


	}else{
		if($accomodations === "no"){
		$sql="UPDATE customer SET firstname='$fname', 
		lastname='$lname', phone='$phone', user_date='$date', 
		user_time='$time', guests='$guestNUM', needsAccess='$accomodations', 
		accessNote='', smokePref='$preference' 
		WHERE customerID=$customerID";
		mysqli_query($conn, $sql);

		$_SESSION['message'] = "Reservation has been updated";
		header("Location: ../guestinfo_updated.php?reservation_updated_accom=no");
		exit();
		}
		else if($accomodations ==="yes" && $note ==""){
		//assign value of $tempNote to $note
		$note = $tempNote;
		$sql="UPDATE customer SET firstname='$fname', 
		lastname='$lname', phone='$phone', user_date='$date', 
		user_time='$time', guests='$guestNUM', needsAccess='$accomodations', accessNote='$note',
		smokePref='$preference' 
		WHERE customerID=$customerID";
		mysqli_query($conn, $sql);

		$_SESSION['message'] = "Reservation has been updated";
		header("Location: ../guestinfo_updated.php?reservation_updated_accom=yes&note=unchanged");
		exit();

		}
		else {
		$sql="UPDATE customer SET firstname='$fname', 
		lastname='$lname', phone='$phone', user_date='$date', 
		user_time='$time', guests='$guestNUM', needsAccess='$accomodations', accessNote='$note',
		smokePref='$preference' 
		WHERE customerID=$customerID";
		mysqli_query($conn, $sql);

		$_SESSION['message'] = "Reservation has been updated";
		header("Location: ../guestinfo_updated.php?reservation_updated_accom=yes&note=changed");
		exit();
		}
	}
	
}


function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}