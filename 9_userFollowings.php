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
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Twitter Basic Plus</h1>
        </div>
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

        $user = $_SESSION['userID'];

        // Get the user followed by the given user
        $query = "SELECT UserNew.userID, UserNew.userName
                  FROM UserNew, Follow
                  WHERE Follow.userID1 = '$user' AND UserNew.userID = Follow.userID2 ";

        $result = mysqli_query($dbcon, $query)
        or die('Query failed: ' . mysqli_error($dbcon));

        // Can also check that there is only one tuple in the result
        $tuple = mysqli_fetch_row($result);


        $panel_header =  "The user is following users:";
        $table_content = "<tr><td>$tuple[0]</td><td>$tuple[1]</td></tr>";
        while ($tuple = mysqli_fetch_row($result)) {
            $table_content .= "<tr><td>$tuple[0]</td><td>$tuple[1]</td></tr>";
        }

        mysqli_free_result($result1);

        // Closing connection
        mysqli_close($dbcon);
        ?>

    </div>

    <div class = "row">

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $panel_header ;?>
                </div>
                <div class="panel-body">
                    <table class = "table table-striped table-bordered table-hover dataTable no-footer" style="text-align:center">
                        <tr>
                            <th style="text-align:center">User ID</th>
                            <th style="text-align:center">User Name</th>
                        </tr>
                        <tbody>
                        <?php echo $table_content;?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="panel-footer">

                <hr>
                <it>Home Page</it>
                <p>

                <form method=get action="5_Home.php">
                    <input class = "btn btn-default" type="submit" value="Back">
                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>

