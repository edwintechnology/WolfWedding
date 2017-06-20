<?php
//include('connection.php');

///$hashpassword = hash("sha256", "Wolf1dustin");

//echo $hashpassword;
//$update_query = "INSERT INTO User (first_name, last_name, username, password) VALUES ('Allison', 'Haag', 'ahaag', '$hashpassword');";
//$update_query = "UPDATE User SET password = '$hashpassword' WHERE id = 1"; 
//mysqli_query($conn, $update_query);


//$test_query = "SELECT * FROM User";
//$result = mysqli_query($conn, $test_query);
//$sql = "SELECT * FROM User;";
//$result = mysqli_query($conn, $sql);

//if(!$result){/
//	echo "DB List Error <br />";
//	echo "MySQL Error: " . mysqli_error();
//	exit;
//}

/*$pass = "something";
while($row = mysqli_fetch_array($result, MYSQL_BOTH)){
	$pass = $row["password"];
}
echo $pass;
*/
echo hash("sha256", "ArhDew0321");
//mysqli_close($conn);
?>
