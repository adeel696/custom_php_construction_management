<?php
require_once("src/Db.class.php");
class Type
{
	private $db;
	
	function __construct() 
	{		
		$this->db =  new DB();	
	}	
	//Get total products
	function GetTotalType()
	{
		$result = $this->db->query("SELECT SN_Id , SN_Description FROM sn_type");
		return $result;
	}
	
	//Get total products
	function GetStockType()
	{
		$result = $this->db->query("SELECT SN_SType_Id , SN_Description FROM sn_stock_type");
		return $result;
	}
	
	//Get total counts
	function GetTypeCounts()
	{

	}
	
	//Get search products
	function GetSearchType($keyword)
	{

	}
	
	//Add Person Type
	function AddPersonType($SN_Description)
	{
		$params=array("SN_Description"=>$SN_Description);
		$result	=  $this->db->query("INSERT INTO sn_type(SN_Description) 	VALUES(:SN_Description)",$params);
		return $result;
	}
	
	//Add Stock Type
	function AddStockType($SN_Description)
	{
		$params=array("SN_Description"=>$SN_Description);
		$result	=  $this->db->query("INSERT INTO sn_stock_type(SN_Description) VALUES (:SN_Description)",$params);
		return $result;
	}

}
?>
