<?php
session_start();

// Connection parameters
$host = 'cspp53001.cs.uchicago.edu';
$username = 'lyc';
$password = 'databaseisgreat';
$database = $username.'DB';;

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';

// Getting the input parameter (user):
$userid1 = $_SESSION['userID'];
$userid2 = $_REQUEST['userID2'];

// Add follower-followee relationship
$query = "INSERT INTO Follow(userID1, userID2)
VALUES ('$userid1', '$userid2')";

$result = mysqli_query($dbcon, $query)
or die('Register failed: ' . mysqli_error($dbcon));

echo 'Successfully Followed a User';

echo '<META HTTP-EQUIV="Refresh" Content="2; URL=9_userFollowings.php">';

// Closing connection
mysqli_close($dbcon);


?> 