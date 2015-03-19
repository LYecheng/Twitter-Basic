<?php
session_start();

print 'Log Out successful';
unset($_SESSION['userName']);
unset($_SESSION['userPassword']);

echo '<META HTTP-EQUIV="Refresh" Content="2; URL=1_TBP_new.html">';

?> 