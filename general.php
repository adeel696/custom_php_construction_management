<?php

$req_type = $_REQUEST["type"];

if($req_type==1) //Delete persons
{
	deletePerson();
}
if($req_type==2) //Delete account detail
{
	deleteAccountDetail();
}
if($req_type==3) //Update stock
{
	updateStockCurrent();
}



function deletePerson()
{
	require_once('include/Person.php');
	$personID=$_REQUEST["personID"];
	$person= new Person();
    $result=$person->DeletePerson($personID);
	
	return $result;
}

function deleteAccountDetail()
{
	require_once('include/Account.php');
	$SN_AccountId=$_REQUEST["accountID"];
	
	//echo $SN_AccountId."<br />";
	$account= new Account();
    $result=$account->DeleteAccount($SN_AccountId);
	
	return $result;
}

function updateStockCurrent()
{
	require_once('include/Stock.php');
	$Stock_CId=$_REQUEST["Stock_CId"];
	$Quantity=$_REQUEST["Quantity"];
	
	//echo $SN_AccountId."<br />";
	$stock= new Stock();
    $result=$stock->updateStockCurrent($Stock_CId,$Quantity);
	
	return $result;
}


?>