<?php
session_start();
?>

<html>

<head>
    <title>Twitter Basic Plus</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

<?php
// Connection parameters 
$host = 'cspp53001.cs.uchicago.edu';
$username = 'lyc';
$password = 'databaseisgreat';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
or die('Could not connect: ' . mysqli_connect_error());
//print 'Connected successfully!<br>';

$user = $_SESSION['userID'];
$password = $_SESSION['userPassword'];

if(!isset($user)){ $user = $_REQUEST['userID']; }
if(!isset($password)) { $password = $_REQUEST['userPassword'];}

// Get the attributes of the user with the given username
$query = "SELECT userID, userName, userLocation, userPassword
FROM UserNew
WHERE userID = '$user'";

$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_row($result)
or die("Wrong password or user name.");
?>



<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a>
                    What's Going On
                </a>
            </li>
            <li>
                <a href="6_userPosts.php">Your Posts</a>
            </li>
            <li>
                <a href="7_userFavorites.php">Your Favorites</a>
            </li>
            <li>
                <a href="8_userFollowers.php">Your Followers</a>
            </li>
            <li>
                <a href="9_userFollowings.php">Your Following</a>
            </li>
            <li>
                <a href="10_popularUsers.php">Who to Follow</a>
            </li>
            <li>
                <a href="11_popularTweets.php">Who to Follow</a>
            </li>
            <li>
                <a href="12_logout.php">Log Out</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                 <div class="page-header">
                     <h1>Your Information</h1>
                 </div>
                 <div class = "row">
                     <div class="col-sm-4">
                         <div class="list-group">
                             <a href="#" class="list-group-item active"><?php print "$tuple[0]"?></a>
                             <a href="#" class="list-group-item"><?php print "$tuple[1]"?></a>
                             <a href="#" class="list-group-item"><?php print "$tuple[2]"?></a>
                         </div>
                     </div>
                 </div>

<?php
$_SESSION['userName'] = $user;
$_SESSION['userPassword'] = $password;

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>
                    <div class="page-header">
                        <h1>Post something</h1>
                    </div>

                    <form method=get action="13_postTweet.php">
                        <div class="form-group">
                            <!-- <label>Enter Twitter Content:</label> -->
                            <textarea class="form-control" placeholder="What's on your mind?" rows="3" name = "tweetContent"></textarea>
                        </div>

                        <input type="submit" class="btn btn-success" value="Post">
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /#wrapper -->


</body>
</html>
