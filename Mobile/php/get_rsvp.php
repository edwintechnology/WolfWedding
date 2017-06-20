<?php
include("connection.php");

ini_set('display_errors', 1);
$get_data = "SELECT * FROM rsvp";

$data = array();
$result = mysqli_query($conn, $get_data);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
		}
} else {
	echo "0 results";
}

$outp = json_encode($data);
mysqli_close($conn);
echo($outp);

?>
