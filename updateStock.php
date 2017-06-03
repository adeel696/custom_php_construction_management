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
		<?php
			include('include/header.php');
			include('include/Stock.php');
        	include('include/Type.php');
			include('include/Person.php');
		?>
<!---------------------------------------------------------------------------------------->
<!---------------------------------Main Content------------------------------------------->
<!---------------------------------------------------------------------------------------->
<div class="main-content">
	<div class="page-content">
		
<br />

<form id="searchFrm" method="post" action="#">
<table class="table table-bordered table-striped" style="width:60%" cellpadding="0" cellspacing="0">
    <tr> 
        <th class="btn-info btn-mini"><b>Name</b></th>
        <td>
        	<select name="ddlName" id="ddlName" class="selectpicker" data-style="btn-primary">
            <option value="-1">Select</option>
			<?php
                $person= new Person();
                $result=$person->GetTotalPerson();	
                //print_r($result);
                foreach($result as $value)
                {
                    echo '<option value="'.$value['SN_PersonId'].'">'.$value['SN_Name'].'</option>';
                }
            ?>
            </select>
        </td>
         <th class="btn-info btn-mini"><b>Type</b></th>
        <td>
        	<select name="ddlSN_SType_Id" id="ddlSN_SType_Id" class="selectpicker" data-style="btn-primary">
            	<option value="-1">Select</option>
				<?php
                    $type= new Type();
                    $result=$type->GetStockType();
                    //print_r($result);
                    foreach($result as $value)
                    {
                        echo '<option value="'.$value['SN_SType_Id'].'">'.$value['SN_Description'].'</option>';
                    }
                ?>
            </select>
        </td>
        <td>
        	<input type="submit" class="btn btn-lg btn-primary btn-block" name="txtSearch" id="txtSearch" value="Search" class="btn btn-small btn-primary" onClick="return verifySelect()"/>
        </td>
    </tr>
</table>
</form>

<?php

	$stock = new Stock();
	$where = "";
	
	if(isset($_POST["txtSearch"]))
	{
		if($_POST["ddlName"]<>-1 && $_POST["ddlSN_SType_Id"]<>-1)
		{
			$where = "and sn_stock_current.SN_PersonId=".$_POST["ddlName"]." and sn_stock_current.SN_SType_Id=".$_POST["ddlSN_SType_Id"];
		}
		else
		if($_POST["ddlName"]<>-1)
		{
			$where = "and sn_stock_current.SN_PersonId=".$_POST["ddlName"];
		}
		else
		if($_POST["ddlSN_SType_Id"]<>-1)
		{
			$where = "and sn_stock_current.SN_SType_Id=".$_POST["ddlSN_SType_Id"];
		}
	}
	else
	{
		if(isset($_GET["ddlName"]))
		{
			$where = "and sn_stock_current.SN_PersonId=".$_GET["ddlName"];
		}
		else
		if(isset($_GET["ddlSN_SType_Id"]))
		{
			$where = "and sn_stock_current.SN_SType_Id=".$_GET["ddlSN_SType_Id"];
		}
	}
	
	$result = $stock->GetGeneralStock($where);
		
	if(sizeof($result)>0)
	{
?>
    <table class="table table-bordered table-striped" style="width:100%">
        <tr> 
            <th class="btn-info btn-mini"><b>Sr#</th>
            <th class="btn-info btn-mini"><b>Name</th>
            <th class="btn-info btn-mini"><b>Stock Type</th>
            <th class="btn-info btn-mini"><b>Quantity</th>
            <!--<th class="btn-info btn-mini"><b>Amount</th>
            <th class="btn-info btn-mini"><b>Description</th>
            <th class="btn-info btn-mini"><b>Record Date</th>-->
            <th class="btn-info btn-mini"><b>Update</th>
        </tr>
        
        <?php
            $i=0;
            foreach($result as $value)
            {
                $i++;
                echo '<tr>';
                echo '	<td>'.$i.'</td>';
                echo '	<td><a href="viewStock.php?ddlName='.$value['SN_PersonId'].'">'.$value['SN_Name'].'</a></td>';
				echo '	<td><a href="viewStock.php?ddlSN_SType_Id='.$value['SN_SType_Id'].'">'.$value['SN_Type_Desc'].'</a></td>';
				echo '	<td><input id="txtQuantity'.$value['Sn_Stock_CId'].'" name="txtQuantity'.$value['Sn_Stock_CId'].'" value='.$value['SN_Quantity'].' /></td>';
                /*echo '	<td>'.$value['SN_Amount'].'</td>';
                echo '	<td>'.$value['SN_Description'].'</td>';
                echo '	<td>'.$value['Record_on'].'</td>';*/
                echo '	<td><a class="btn btn-info" href="#" onclick="javascript:updateThis('.$value['Sn_Stock_CId'].')">
                          <i class="icon-circle-arrow-up icon-white"></i>
                        </a></td>';
                echo '</tr>';
            }
        ?>  
    </table>
<?php
}
else
{
	echo "No Data";
}
?>                                                         
	</div><!--/.page-content-->
</div>
<!---------------------------------------------------------------------------------------->
<!---------------------------------Main Content------------------------------------------->
<!---------------------------------------------------------------------------------------->
<?php include('include/footer.php') ?>
<script type="text/javascript">
	$("#stock").addClass("active");
	$("#updatestock").addClass("active");
	function updateThis(Stock_CId)
	{
		var Quantity =  $("#txtQuantity"+Stock_CId).val();
		//alert(Quantity);
		$.post("general.php", { Stock_CId: Stock_CId , Quantity: Quantity , type: "3" },
		function(data) {
			alert("Updated")
		});
		return false;
	}
</script>
	</body>
</html>
