<?php

require_once("src/Db.class.php");

class Account

{

	private $db;

	

	function __construct() 

	{		

		$this->db =  new DB();	

	}	

	//Get total products

	function GetTotalAccount()

	{

		$result = $this->db->query("SELECT * FROM sn_account");

		return $result;

	}

	

	//Get total counts

	function GetAccountCounts()

	{

		

	}

	

	//Get search products

	function GetSearchAccountByName($SN_Name)
	{
		$result = $this->db->query("SELECT * FROM sn_account WHERE SN_Name = :SN_Name",array("SN_Name"=>$SN_Name)); 
		return $result;
	}

	

	//Get search products

	function DeleteAccount($SN_AccountId)

	{
		
		
		$result = $this->db->query("DELETE FROM sn_account WHERE SN_AccountId = :SN_AccountId",array("SN_AccountId"=>$SN_AccountId)); 

		return $result;

	}

	

	//Add new product

	function AddAccount($SN_PersonId,$SN_ReceipId,$SN_Debit,$SN_Credit,$SN_Description,$Record_on)
	{

		$params=array("SN_PersonId"=>$SN_PersonId,
					"SN_ReceipId"=>$SN_ReceipId,
					"SN_Debit"=>$SN_Debit,
					"SN_Credit"=>$SN_Credit,
					"SN_Description"=>$SN_Description,
					"Record_on"=>$Record_on);
		

		$result	=  $this->db->query("INSERT INTO sn_account(SN_PersonId,SN_ReceipId,SN_Debit,SN_Credit,SN_Description,Record_on) 	VALUES(:SN_PersonId,:SN_ReceipId,:SN_Debit,:SN_Credit,:SN_Description,:Record_on)",$params);

		return $result;
	}

}

?>