<?php 
	session_start(); 
	if(!isset($_SESSION['SN_USER']))
	{
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
            
		<?php include('include/bootstrap.php') ?>
		<meta charset="utf-8" />
		<title>Snowra Builders</title>
	<body>
		<?php include('include/header.php') ?>
<!---------------------------------------------------------------------------------------->
<!---------------------------------Main Content------------------------------------------->
<!---------------------------------------------------------------------------------------->
<div class="main-content">
	<div class="page-content">
<form id="searchFrm" method="post" action="#">
<table cellpadding="5" cellspacing="5" border="0">
	<tr>
        <td valign="top">
        	<input type="text" id="txtName" name="txtName" class="" placeholder="Name"/>
        </td>
        <td valign="top">
        	<input type="submit" id="btnSubmit" name="btnSubmit" value="Search" class="btn btn-lg btn-primary btn-block" />
        </td>
    </tr>
</table>
</form>			
<br />
<?php
	include('include/Person.php');
	$person= new Person();
	
	if(isset($_POST["txtName"]))
	{
		$SN_Name=$_POST["txtName"];
		$result=$person->GetPersonAccountByName($SN_Name);
	}
	else if(isset($_GET["txtPersonId"]))
	{
		//echo $_GET["txtPersonId"];
		$SN_PersonId=$_GET["txtPersonId"];
		$result=$person->GetPersonAccountById($SN_PersonId);
	}
		
	if($result!="")
	{
?>
    <table class="table table-bordered table-striped" style="width:100%">
        <tr> 
            <th class="btn-info btn-mini"><b>Sr#</th>
            <th class="btn-info btn-mini"><b>Name</th>
            <th class="btn-info btn-mini"><b>Receip Id</th>
            <th class="btn-info btn-mini"><b>Debit 	</th>
            <th class="btn-info btn-mini"><b>Credit</th>
            <th class="btn-info btn-mini"><b>Description</th>
            <th class="btn-info btn-mini"><b>Record Date</th>
            <th class="btn-info btn-mini"><b>Delete</th>
        </tr>
        
        <?php
            $i=0;
            foreach($result as $value)
            {
                $i++;
                echo '<tr id=TR'.$value['SN_AccountId'].'>';
                echo '	<input type="hidden" id="hndID" name="hndID" value="'.$value['SN_AccountId'].'" />';
                echo '	<td>'.$i.'</td>';
                echo '	<td>'.$value['SN_Name'].'</td>';
                echo '	<td>'.$value['SN_ReceipId'].'</td>';
                echo '	<td>'.$value['SN_Debit'].'</td>';
                echo '	<td>'.$value['SN_Credit'].'</td>';
                echo '	<td>'.$value['SN_Description'].'</td>';
                echo '	<td>'.$value['Record_on'].'</td>';
                echo '	<td><a class="btn btn-danger" href="#" onclick="javascript:deleteThis('.$value['SN_AccountId'].')">
                          <i class="icon-trash icon-white"></i>
                        </a></td>';
                echo '</tr>';
            }
        ?>  
    </table>
<?php
}
?>                                                         
	</div><!--/.page-content-->
</div>
<!---------------------------------------------------------------------------------------->
<!---------------------------------Main Content------------------------------------------->
<!---------------------------------------------------------------------------------------->
<?php include('include/footer.php') ?>
<script type="text/javascript">
	$("#report").addClass("active");
	$("#account_reports").addClass("active");
	function deleteThis(accountID)
	{
		if (confirm("Do you want to delete the record?")) 
		{
			$("#TR"+accountID).fadeOut();
			$.post("general.php", { accountID: accountID , type: "2" },
			function(data) {
				//alert(data)
				$("#TR"+accountID).fadeOut();
			});
		}
	}
</script>
	</body>
</html>
