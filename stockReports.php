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
		
<br />
<?php
	include('include/Stock.php');
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
				echo '	<td>'.$value['SN_Quantity'].'</td>';
                /*echo '	<td>'.$value['SN_Amount'].'</td>';
                echo '	<td>'.$value['SN_Description'].'</td>';
                echo '	<td>'.$value['Record_on'].'</td>';
                echo '	<td><a class="btn btn-info" href="#" onclick="javascript:updateThis('.$value['Sn_Stock_CId'].')">
                          <i class="icon-circle-arrow-up icon-white"></i>
                        </a></td>';
                echo '</tr>';*/
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
	$("#stock_reports").addClass("active");
</script>
	</body>
</html>
