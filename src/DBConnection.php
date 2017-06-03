<?php
	class DBConnection
	{
		//Constructor
		function __construct() 
		{		
			
		}	
		
		//Database Connection
		function DbConnect()
		{
			$Connection = mysql_connect('localhost', 'root', '');
			if (!$Connection) {
				die('Could not connect: ' . mysql_error());
			}
			
			mysql_select_db("FindBuzz") or die('Could not find DB: ' .mysql_error());
			
			//echo 'Connected successfully';
			return $Connection;
		}
		
		//Close connection
		function Close($Connection)
		{
			mysql_close($Connection);
		}
	}
?>