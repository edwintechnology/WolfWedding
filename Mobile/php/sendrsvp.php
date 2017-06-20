<?php
require("connection.php");

// form variables
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$addr = $_POST["addr"];
$attending = (strtolower($_POST["attending"]) == 'yes' ? 1 : 0);
$num_of_guests = $_POST["num_of_guest"];

// Validation
if(!isset($first_name) or empty($first_name)){
	 header("location: ../rsvp.html?err=1");
		die();
}
if(!isset($last_name) or empty($last_name)){
	 header("location: ../rsvp.html?err=1");
		die();
}

// updating DB
$ssfirst_name = stripslashes($first_name);
$sslast_name = stripslashes($last_name);
$ssemail = stripslashes($email);
$ssphone = stripslashes($phone);
$ssaddr = stripslashes($addr);
$ssattending = stripslashes($attending);
$ssnum_of_guests = stripslashes($num_of_guests);

$esfirst_name = mysqli_real_escape_string($conn, $ssfirst_name);
$eslast_name = mysqli_real_escape_string($conn, $sslast_name);
$esemail = mysqli_real_escape_string($conn, $ssemail);
$esphone = mysqli_real_escape_string($conn, $ssphone);
$esaddr = mysqli_real_escape_string($conn, $ssaddr);
$esattending = mysqli_real_escape_string($conn, $ssattending);
$esnum_of_guests = mysqli_real_escape_string($conn, $ssnum_of_guests);
$pageload = true;

	$sql = "INSERT INTO rsvp (member_id, first_name, last_name, email, phone, address, attending, actual_num) VALUES (-1, '$esfirst_name', '$eslast_name', '$esemail', '$esphone', '$esaddr', '$esattending', '$esnum_of_guests');";
	if(!mysqli_query($conn, $sql)) {
		$pageload = false;
  		echo("Error description: " . mysqli_error($conn));
  	}

	// Email section
	$header = "From: noreply@edwintech.xyz\r\n"; 
	$header.= "MIME-Version: 1.0\r\n"; 
	$header.= "Content-Type: text/html; charset=utf-8\r\n"; 
	$header.= "X-Priority: 1\r\n";

	$subject = $first_name . ' ' . $last_name . ' RSVP';
	$message = "Name: " . $first_name . " " . $last_name . "<br />";
	$message.= "Email: " . $email . "<br />";
	$message.= "Phone: " . $phone . "<br />";
	$message.= "Address: " . $addr . "<br />";
	$message.= "Are you attending: " . $attending . "<br />";
	$message.= "How many people are you bringing: " . $num_of_guests . "<br />";

	mail("allison.and.dustin@gmail.com", $subject, $message, $header);
	mail($email, "Wolf Wedding RSVP Confirmation", "Thank you for your response. <br /> We are looking forward to seeing you on July 8!<br/><br/>Love<br/> Allison and Dustin", $header);

	if($pageload) {  header("location: ../thankyou.html"); }
	else { echo "ERROR:  do you see the violence inherited in the system?"; }

?>
