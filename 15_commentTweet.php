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


// Getting the input parameter (user)
$tweetID = $_REQUEST['tweetID'];
$commentsContent = $_REQUEST['CommentsContent'];
$user = $_SESSION['userID'];

// Generate comment ID for new comment
$query = "SELECT MAX(commentID) FROM Comment";
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));
$tuple = mysqli_fetch_row($result)
or die('Query failed');
$commentID = $tuple[0] + 1;

// Insert into Comments Table First
$query1 = "INSERT INTO NewComment(commentID, userID, tweetID, commentContent)
VALUES ('$commentID', '$user', '$tweetID' ,'$commentContent')";
$result1 = mysqli_query($dbcon, $query1)
or die('Insert into Comments Table failed: ' . mysqli_error($dbcon));

echo 'Comment made!';

echo '<META HTTP-EQUIV="Refresh" Content="2; URL=18_tweetComments.php">';

// Closing connection
mysqli_close($dbcon);

?> 
