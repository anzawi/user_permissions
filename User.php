<?php 

/**
 * @author : Mohammad Anzawi
 * @url : http://phptricks.org
 */


/**
 * User Class
 */
class User
{
	private $_userInformation = null,
			$_db = null;


	public function __construct()
	{
		// connect with database
		$this->_db = connect();
		// if database object is null so cant connect with db
		if($this->_db === null)
			die("Unable to Connect With Database");
	}


	public function hasPermission($userId, $permissionName = '')
	{
		// built query to get target user pemissions
		$sql = "SELECT permissions.* ".
				    "FROM permissions ".
				        "left JOIN  users ".
				           "ON users.permission_id = permissions.id ".
				            "WHERE users.id =" . $userId;

		// excute query results as object
		$permissions = $this->_db->query($sql);
		$permissions = $permissions->fetch_object();

		// this line to check if retrieved data from db
		// if count <= 0 so the user is not exist
		if(count($permissions))
		{
			$permissions = json_decode($permissions->permission, true);

			if(isset($permissions[$permissionName]) && $permissions[$permissionName] === true)
			{
				return true;
			}
		}

		return false;
	}





 //////////////////////////////////////////
 ///
 ///	LONG WAY
 ///
 /////////////////////////////////////////



	/**
	  * Check if user exist 
	  * 
	*/
	/*
	public function find($userId = 0)
	{
		// built query to get target user
		$sql = "SELECT * FROM users WHERE id = $userId";
		
		// do query
		$user = $this->_db->query($sql);
		
		// excute query results as object
		$user = $user->fetch_object();

		// if count result 
		if(count($user))
		{
			// save user information in $_userInformation var and return true
			$this->_userInformation = $user;
			return true;
		}

		return false;
	}


	/** check if user hase a permission */
	/*
	public function hasPermission($permissionName)
	{
		// built query to get target user perissions
		$sql = "SELECT * FROM permissions WHERE id = " . $this->_userInformation->permission_id;
		// do query
		//die($sql);
		$permissions = $this->_db->query($sql);
		
		// excute query results as object
		$permissions = $permissions->fetch_object();

		// if count result 
		if(count($permissions))
		{
			// get user permissions as array
			$userPermissions = json_decode($permissions->permission, true);
			// check if permission name isset and equal true
			if(isset($userPermissions[$permissionName]) && $userPermissions[$permissionName] === true)
			{
				return true;
			}
		}
		
		return false;
	}

	*/
}