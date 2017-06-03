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
    	<script type="text/javascript" src="assets/js/date-time/bootstrap-datepicker.min.js" charset="UTF-8"></script>
            
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
<table class="table table-bordered table-striped" style="width:100%" cellpadding="0" cellspacing="0">
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
        <th class="btn-info btn-mini"><b>From</b></th>
        <td>
        	<div class="input-append date" id="dpFrom" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
            <input class="span2" size="16" type="text" style="width:55%">
            <span class="add-on"><i class="icon-th"></i></span>
            </div>
            <script type="text/javascript">	$('#dpFrom').datepicker('show'); </script>
        </td>
        <th class="btn-info btn-mini"><b>To</b></th>
        <td>
            <div class="input-append date" id="dpTo" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
            <input class="span2" size="16" type="text" style="width:55%">
            <span class="add-on"><i class="icon-th"></i></span>
            </div>
            <script type="text/javascript">	$('#dpTo').datepicker('show'); </script>
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
			$where = "and sn_stock.SN_PersonId=".$_POST["ddlName"]." and sn_stock.SN_SType_Id=".$_POST["ddlSN_SType_Id"];
		}
		else
		if($_POST["ddlName"]<>-1)
		{
			$where = "and sn_stock.SN_PersonId=".$_POST["ddlName"];
		}
		else
		if($_POST["ddlSN_SType_Id"]<>-1)
		{
			$where = "and sn_stock.SN_SType_Id=".$_POST["ddlSN_SType_Id"];
		}
	}
	else
	{
		if(isset($_GET["ddlName"]))
		{
			$where = "and sn_stock.SN_PersonId=".$_GET["ddlName"];
		}
		else
		if(isset($_GET["ddlSN_SType_Id"]))
		{
			$where = "and sn_stock.SN_SType_Id=".$_GET["ddlSN_SType_Id"];
		}
	}
	$result = $stock->GetTotalStock($where);	
	
	if($result!="")
	{
?>
    <table class="table table-bordered table-striped" style="width:100%">
        <tr> 
            <th class="btn-info btn-mini"><b>Sr#</b></th>
            <th class="btn-info btn-mini"><b>Name</b></th>
            <th class="btn-info btn-mini"><b>Phone</b></th>
            <th class="btn-info btn-mini"><b>Mobile</b></th>
            <th class="btn-info btn-mini"><b>Stock Type</b></th>
            <th class="btn-info btn-mini"><b>Quantity</b></th>
            <th class="btn-info btn-mini"><b>Amount</b></th>
            <th class="btn-info btn-mini"><b>Description</b></th>
            <th class="btn-info btn-mini"><b>Record Date</b></th>
            <!--<th class="btn-info btn-mini"><b>Delete</b></th>-->
        </tr>
        
        <?php
            $i=0;
            foreach($result as $value)
            {
                $i++;
                echo '<tr id=TR'.$value['SN_Stock_Id'].'>';
                echo '	<input type="hidden" id="hndID" name="hndID" value="'.$value['SN_Stock_Id'].'" />';
                echo '	<td>'.$i.'</td>';
                echo '	<td>'.$value['SN_Name'].'</td>';
                echo '	<td>'.$value['SN_Phone'].'</td>';
                echo '	<td>'.$value['SN_Mobile'].'</td>';
                echo '	<td>'.$value['SN_Type_Desc'].'</td>';
				echo '	<td>'.$value['SN_Quantity'].'</td>';
                echo '	<td>'.$value['SN_Amount'].'</td>';
                echo '	<td>'.$value['SN_Description'].'</td>';
                echo '	<td>'.$value['Record_on'].'</td>';
                /*echo '	<td><a class="btn btn-danger" href="#" onclick="javascript:deleteThis('.$value['SN_Stock_Id'].')">
                          <i class="icon-trash icon-white"></i>
                        </a></td>';*/
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
	$("#stock").addClass("active");
	$("#viewstock").addClass("active");
	function deleteThis(personID)
	{
		$("#TR"+personID).fadeOut();
		$.post("general.php", { personID: personID , type: "1" },
		function(data) {
			$("#TR"+personID).fadeOut();
		});
	}
	function verifySelect()
	{
		if ($("#ddlPerson").val() == -1 && $("#ddlSN_SType_Id").val()  == -1)
		{
			return false;
		}
	}
</script>
	</body>
</html>
