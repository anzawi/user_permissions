<?php
/**
 * @author : Mohammad Anzawi
 * @url : http://phptricks.org
 */

// include init file 
require_once('app/init.php');

// create new user object
$user = new User();


// check if user id 1 , has permission ' admin '
if($user->hasPermission(1, 'user'))
{
	echo " Mohammad has admin permission ";
}
else
{
	echo "Mohammad not have admin permission";
}

echo "<br>"
// check if user id 2 , has permission ' admin '
iif($user->hasPermission(2, 'admin'))
{
	echo " ahmed has not admin permission ";
}
else
{
	echo "ahmed has not admin permission";
}

/*
	etc ... 
 */