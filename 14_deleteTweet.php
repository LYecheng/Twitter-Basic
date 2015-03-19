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
$tweetID = $_REQUEST['tweetID'];

//Running all the insert queries
$query1 = "DELETE FROM NewAddToFav WHERE tweetID = '$tweetID'";
$query2 = "DELETE FROM NewComment WHERE tweetID = '$tweetID'";
$query3 = "DELETE FROM NewTweet WHERE tweetID = '$tweetID'";

$result1 = mysqli_query($dbcon, $query1)
or die('Query failed: ' . mysqli_error($dbcon));
$result2 = mysqli_query($dbcon, $query2)
or die('Query failed: ' . mysqli_error($dbcon));
$result3 = mysqli_query($dbcon, $query2)
or die('Query failed: ' . mysqli_error($dbcon));
print "Tweet deleted";

echo '<META HTTP-EQUIV="Refresh" Content="2; URL=6_userPosts.php">';

// Closing connection
mysqli_close($dbcon);

?>

