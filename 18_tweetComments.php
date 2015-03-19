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
?>

<div class="container">
        <header id="top" class="header">
            <div class="text-vertical-center">
                <h1> Twitter Basic Plus </h1>
        </div>

    <div class="row">
        <div class="alert alert-info">
            <strong> Connected successfully!</strong>
        </div>

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

        // Getting the input parameter (user):
        $tweet = $_REQUEST['tweetID'];

        // Get the attributes of the user with the given username
        $query = "SELECT NewTweet.tweetID, NewTweet.tweetContent, NewComment.commentContent
                  FROM NewTweet JOIN NewComment ON NewTweet.tweetID = NewComment.tweetID
                  WHERE NewTweet.tweetID = $tweet";
        $result = mysqli_query($dbcon, $query)
        or die('Get the Comments failed: ' . mysqli_error($dbcon));

        // Can also check that there is only one tuple in the result
        $tuple = mysqli_fetch_row($result)
        or die("The Tweet has no Comment!");

        $panel_header =  "Tweet has comments:";
        $table_content = "<tr><td>$tuple[0]</td><td>$tuple[2]</td></tr>";
        while ($tuple = mysqli_fetch_row($result)) {
            $table_content .= "<tr><td>$tuple[0]</td><td>$tuple[2]</td></tr>";
        }

        // Free result
        mysqli_free_result($result);

        // Closing connection
        mysqli_close($dbcon);
        ?>
    </div>

    <div class = "row">

        <div class="col-lg-4">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <?php echo $panel_header;?>
                </div>
                <div class="panel-body">
                    <table class = "table table-striped table-bordered table-hover dataTable no-footer" style="text-align:center">
                        <tr>
                            <th style="text-align:center">Comment ID</th>
                            <th style="text-align:center">Comment Content</th>
                        </tr>
                        <tbody>
                        <?php echo $table_content;?>
                        </tbody>
                    </table>
                </div>

                <div class="panel-footer">
                    <hr>
                    <it>Home Page</it>
                    <p>
                    <form method=get action="5_Home.php">
                        <input class = "btn btn-default" type="submit" value="home">
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>




