<?php

require_once("src/Db.class.php");

class Stock
{
	private $db;

	function __construct() 
	{		
		$this->db =  new DB();	
	}	

	//Get total stock

	function GetTotalStock($where)
	{

		$result = $this->db->query("SELECT sn_stock.SN_Stock_Id , sn_person.SN_Name , sn_person.SN_Phone, sn_person.SN_Mobile , sn_stock_type.SN_Description SN_Type_Desc , sn_stock.SN_Quantity , sn_stock.SN_Amount,sn_stock.SN_Description,sn_stock.Record_on
from
sn_person , sn_stock ,  sn_stock_type
where
sn_stock.SN_PersonId=sn_person.SN_PersonId
and 
sn_stock.SN_SType_Id=sn_stock_type.SN_SType_Id ".$where);
		return $result;
	}


	function GetGeneralStock($where)
	{
		$result = $this->db->query("SELECT sn_stock_current.Sn_Stock_CId , sn_person.SN_Name , sn_stock_type.SN_Description SN_Type_Desc , sn_stock_current.SN_Quantity , sn_stock_current.SN_PersonId , sn_stock_current.SN_SType_Id
from
sn_person , sn_stock_current ,  sn_stock_type
where
sn_stock_current.SN_PersonId=sn_person.SN_PersonId
and 
sn_stock_current.SN_SType_Id=sn_stock_type.SN_SType_Id ".$where);
		return $result;
	}

	//Get total counts
	function GetStockCounts()
	{		

	}

	//Get search products
	function GetSearchStock()
	{
		$result = $this->db->query("SELECT * FROM sn_stock"); 
		return $result;
	}

	
	//Get search person with account

	

	//Get search products

	function DeleteStock($SN_PersonId)
	{
		
	}

	//Add new product

	function AddStock($SN_PersonId,$SN_SType_Id,$SN_Amount,$SN_Quantity,$SN_Description,$Record_on)
	{
		$params=array("SN_PersonId"=>$SN_PersonId,
					"SN_SType_Id"=>$SN_SType_Id,
					"SN_Amount"=>$SN_Amount,
					"SN_Quantity"=>$SN_Quantity,
					"SN_Description"=>$SN_Description,
					"Record_on"=>$Record_on);
						
		$result	=  $this->db->query("INSERT INTO sn_stock(SN_PersonId,SN_SType_Id,SN_Amount,SN_Quantity,SN_Description,Record_on) 	VALUES(:SN_PersonId,:SN_SType_Id,:SN_Amount,:SN_Quantity,:SN_Description,:Record_on)",$params);

		$result_chk = $this->db->query("SELECT * FROM sn_stock_current where SN_PersonId=".$SN_PersonId." and SN_SType_Id=".$SN_SType_Id); 
		
		
		//print(sizeof($result_chk));

		if(sizeof($result_chk)>0)
		{
			$SN_Quantity = $SN_Quantity + $result_chk['SN_Quantity'];
			$this->updateStockCurrent($result_chk['Sn_Stock_CId'],$SN_Quantity);
		}
		else
		{
			$this->insertStockCurrent($SN_PersonId,$SN_SType_Id,$SN_Quantity);
		}
		
		return $result;
	}
	
	
	//update stock current
	function updateStockCurrent($Sn_Stock_CId,$SN_Quantity)
	{
		$params=array("Sn_Stock_CId"=>$Sn_Stock_CId,
		"SN_Quantity"=>$SN_Quantity);
		$result	=  $this->db->query("update sn_stock_current set SN_Quantity=:SN_Quantity where Sn_Stock_CId=:Sn_Stock_CId",$params);
		
		return $result; 
	}
	
	//insert stock current
	function insertStockCurrent($SN_PersonId,$SN_SType_Id,$SN_Quantity)
	{
		$params=array("SN_PersonId"=>$SN_PersonId,
		"SN_SType_Id"=>$SN_SType_Id,	
		"SN_Quantity"=>$SN_Quantity);
		
		$result_current	=  $this->db->query("INSERT INTO sn_stock_current(SN_PersonId,SN_SType_Id,SN_Quantity) 	VALUES(:SN_PersonId,:SN_SType_Id,:SN_Quantity)",$params);
		
		return $result; 
	}

}

?>