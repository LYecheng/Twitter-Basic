<?php

session_start();

// Connection parameters 
$host = 'cspp53001.cs.uchicago.edu';
$username = 'lyc';
$password = 'databaseisgreat';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';

// Getting the input parameter (user):
$userID = $_REQUEST['userID'];
$userName = $_REQUEST['userName'];
$userLocation = $_REQUEST['userLocation'];
$userPassword = $_REQUEST['userPassword'];

// Get the attributes of the user
$query = "INSERT INTO UserNew(userID, userName, userLocation, userPassword)
VALUES ('$userID', '$userName', '$userLocation', '$userPassword')";

$result = mysqli_query($dbcon, $query)
or die('Register failed: ' . mysqli_error($dbcon));

$_SESSION['userID'] = $userID;
$_SESSION['userPassword'] = $userPassword;

print "Welcome to Twitter Basic Plus";

echo '<META HTTP-EQUIV="Refresh" Content="2; URL=5_Home.php">';

// Closing connection
mysqli_close($dbcon);
?> 