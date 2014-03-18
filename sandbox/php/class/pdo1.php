<?php
var_dump(PDO::getAvailableDrivers());
try
{
	$dsn = 'mysql:host=localhost;dbname=test';
	$user = 'root';
	$pass = 'greg';
	$options = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);
	$dbh = new PDO(
		$dsn,
		$user,
		$pass,
		$options
		);
	//$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if(($result = $dbh->query('select * from mysql.user'/*show databases*/)) === false)
	{
		echo '<br /><p style="color:red;"><b>'.$dbh->errorCode().'</b></p><br />';
		echo '<br /><p style="color:red;"><b>'.$dbh->errorInfo().'</b></p><br />';
		die();
	}
	else
	{
		/*select * from mysql.user');*/
		echo $dbh->getAttribute(PDO::ATTR_SERVER_VERSION)."<br />";
		echo $dbh->getAttribute(PDO::ATTR_CLIENT_VERSION)."<br />";
		echo $dbh->getAttribute(PDO::ATTR_SERVER_INFO)."<br />";
		echo $dbh->getAttribute(PDO::ATTR_CONNECTION_STATUS)."<br />";
		echo "<pre>";
		/*while($row = $result->fetch())
		{
			print_r($row);
		}*/
		echo "</ pre>";
	}
	if(($result = $dbh->query('select * from mysql.user'/*show databases*/)) === false)
	{
		echo '<br /><p style="color:red;"><b>'.$dbh->errorCode().'</b></p><br />';
		echo '<br /><p style="color:red;"><b>'.$dbh->errorInfo().'</b></p><br />';
		die();
	}
	else
	{
		echo "<pre>";
		$results = $result->fetchall(PDO::FETCH_BOTH);
		foreach($results as $key=>$val)
		{
			var_dump($key);
			//var_dump($val);
			vprintf("num:%d - nom:%s\nnum:%d - user:%s\nnum:%d - pass:%s\n", $val);
		}
		echo "</ pre>";
	}
	class User
	{
		private $host;
		private $user;
		private $password;
		public function a($a)
		{
			if($a === true)
			{
				return $this->host;
			}
			else
			{
				return "mot de passe secret";
			}
		}
	}
	$sql = "SELECT host, user, password FROM mysql.user";
	$stmt = $dbh->query($sql);
	$result = $stmt->fetchAll(PDO::FETCH_CLASS, "User");
	foreach($result as $key=>$val)
	{
		$a[] = $val;
		//var_dump($val);
	}
	var_dump($a[0]);
	var_dump($a[0]->a(true));
	var_dump(get_class($a[0]));
	$sql = "SELECT * FROM mysql.user";
	$stmt = $dbh->query($sql);
	$stmt->bindColumn(25, $utilisateur);
	$stmt->fetch();
	echo $utilisateur."utilisateur";
	/*foreach($result as $key=>$val)
	{
		$a[] = $val;
		//var_dump($val);
	}*/
	unset($dbh);
}
catch(PDOException $e)
{
	echo '<br /><p style="color:red;"><b>'.$e->getMessage().'</b></p><br />';
	die();
}