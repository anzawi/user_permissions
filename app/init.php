<?php
/**
 * @author : Mohammad Anzawi
 * @url : http://phptricks.org
 */

/** Connect with databalse */
function connect()
{
	$db = new mysqli("localhost", "root", "", "users_permission_tutorial");

	if ($db->connect_errno) {
	    return null;
	}

	return $db;
}


/** include User Class file */
require_once('User.php');