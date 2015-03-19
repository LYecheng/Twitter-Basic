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
$user = $_SESSION['userID'];
$tweetID = $_REQUEST['tweetID'];

// Get the MAX ID of the table of comments 
$query = "INSERT INTO NewAddToFav(userID, tweetID)
VALUES ('$user', $tweetID')";

$result = mysqli_query($dbcon, $query)
or die('Like action failed: ' . mysqli_error($dbcon));

echo 'Tweet added to Favorite';

echo '<META HTTP-EQUIV="Refresh" Content="2; URL=5_Home.php">';

// Closing connection
mysqli_close($dbcon);
?> 

