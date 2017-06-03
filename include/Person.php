<?php

require_once("src/Db.class.php");

class Person

{

	private $db;

	

	function __construct() 

	{		

		$this->db =  new DB();	

	}	

	//Get total products

	function GetTotalPerson()

	{

		$result = $this->db->query("SELECT * FROM sn_person");

		return $result;

	}

	

	//Get total counts

	function GetPersonCounts()

	{

		

	}

	

	//Get search products

	function GetSearchPersonByName($SN_Name)
	{
		$result = $this->db->query("SELECT * FROM sn_person WHERE SN_Name = :SN_Name",array("SN_Name"=>$SN_Name)); 
		return $result;
	}

	
	//Get Get Person Account By Name

	function GetPersonAccountByName($SN_Name)
	{
		$result = $this->db->query("SELECT  sn_account.SN_AccountId , sn_person.SN_Name , sn_account.SN_ReceipId , sn_account.SN_Debit , sn_account.SN_Credit , sn_account.SN_Description , sn_account.Record_on
FROM sn_account , sn_person
WHERE sn_account.SN_PersonId = sn_person.SN_PersonId AND sn_person.SN_Name like '%$SN_Name%'"); 
		return $result;
	}

	//Get Get Person Account By Id

	function GetPersonAccountById($SN_PersonId)
	{
		$result = $this->db->query("SELECT  sn_account.SN_AccountId , sn_person.SN_Name , sn_account.SN_ReceipId , sn_account.SN_Debit , sn_account.SN_Credit , sn_account.SN_Description , sn_account.Record_on
FROM sn_account , sn_person
WHERE sn_account.SN_PersonId = sn_person.SN_PersonId AND sn_person.SN_PersonId = :SN_PersonId",array("SN_PersonId"=>$SN_PersonId)); 
		return $result;
	}
	
	//Get Detail Account

	function GetDetailAccount($SN_Name)
	{
		if($SN_Name=="")
		{
			$result = $this->db->query("SELECT sn_person.SN_PersonId, sn_person.SN_Name, sum(sn_account.SN_Debit) as SN_Debit 			, sum(sn_account.SN_Credit) as SN_Credit
			FROM sn_account, sn_person
			WHERE sn_account.SN_PersonId = sn_person.SN_PersonId
			GROUP BY sn_person.SN_PersonId, sn_person.SN_Name
			ORDER BY sn_person.SN_Name"); 
		}
		else
		{
			
			$result = $this->db->query("SELECT sn_person.SN_PersonId, sn_person.SN_Name, sum(sn_account.SN_Debit) as SN_Debit 			, sum(sn_account.SN_Credit) as SN_Credit
			FROM sn_account, sn_person
			WHERE sn_account.SN_PersonId = sn_person.SN_PersonId
			AND sn_person.SN_Name like '%$SN_Name%'
			GROUP BY sn_person.SN_PersonId, sn_person.SN_Name
			ORDER BY sn_person.SN_Name"); 
		}
		

		return $result;
	}
	
	//Get search products

	function DeletePerson($SN_PersonId)

	{

		$result = $this->db->query("DELETE FROM sn_person WHERE SN_PersonId = :SN_PersonId",array("SN_PersonId"=>$SN_PersonId)); 

		return $result;

	}

	

	//Add new product

	function AddPerson($SN_Name,$SN_Company,$SN_TypeId,$SN_Title,$SN_Phone,$SN_Mobile,$SN_Email,$SN_Website,$SN_Description,$Record_on)

	{

		$params=array("SN_Name"=>$SN_Name,

					"SN_Company"=>$SN_Company,

					"SN_TypeId"=>$SN_TypeId,

					"SN_Title"=>$SN_Title,

					"SN_Phone"=>$SN_Phone,

					"SN_Mobile"=>$SN_Mobile,

					"SN_Email"=>$SN_Email,

					"SN_Website"=>$SN_Website,

					"SN_Description"=>$SN_Description,

					"Record_on"=>$Record_on);

							

		$result	=  $this->db->query("INSERT INTO sn_person(SN_Name,SN_Company,SN_TypeId,SN_Title,SN_Phone,SN_Mobile,SN_Email,SN_Website,SN_Description,Record_on) 	VALUES(:SN_Name,:SN_Company,:SN_TypeId,:SN_Title,:SN_Phone,:SN_Mobile,:SN_Email,:SN_Website,:SN_Description,:Record_on)",$params);

		

		return $result;



	}

}

?>