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
$content = $_REQUEST['tweetContent'];
$user = $_SESSION['userID'];
$password = $_SESSION['userPassword'];

// Generate tweetID for the new tweet
$query = "SELECT MAX(tweetID) FROM NewTweet";
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));
$tuple = mysqli_fetch_row($result)
or die('Query failed');
$tweetID = $tuple[0] + 1;

//Running all the insert queries
$query1 = "INSERT INTO NewTweet(tweetID, userID, tweetContent) VALUES ($tweetID, '$user','$tContent')";
$result1 = mysqli_query($dbcon, $query1)
or die('Query failed: ' . mysqli_error($dbcon));
echo "New Tweet Posted";

echo '<META HTTP-EQUIV="Refresh" Content="2; URL=5_Home.php">';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 