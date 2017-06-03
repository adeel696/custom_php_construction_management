<?php 
session_start(); 
if(!isset($_SESSION['SN_USER']))
{
	header("location:index.php");
}

include('include/Person.php');
include('include/Type.php');
if(isset($_POST['txtSubmit']))
{
	include('include/Stock.php');
	include('include/Account.php');
	
	$stock = new Stock();
	$SN_PersonId=$_POST['ddlName'];
	$SN_SType_Id=$_POST['ddlType'];
	$SN_Amount=$_POST['txtAmount'];
	$SN_Quantity=$_POST['txtQuantity'];
	$SN_ReceipId=$_POST['txtReceipId'];
	$SN_Description=$_POST['txtDescription'];
	$Record_on= date('Y-m-d H:i:s');
	
	$result = $stock->AddStock($SN_PersonId,$SN_SType_Id,$SN_Amount,$SN_Quantity,$SN_Description,$Record_on);
	
	$account = new Account();
	$result = $account->AddAccount($SN_PersonId,$SN_ReceipId,'0',$SN_Amount,$SN_Description,$Record_on);
	//echo $result;	
	//print_r($result);
	
	if($result==1)
	{
		header('location:viewStock.php');
	}
	else
	{
		$_SESSION['error']="Error please try again";
		header('location:addPerson.php');
	}
}


if(isset($_SESSION['error'])==1)
{
	echo "<br>".$_SESSION['error']."<br>";
	unset($_SESSION['error']);
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
		<div class="row-fluid">                    
			<div class="span12 widget-container-span">
				<!--PAGE CONTENT BEGINS-->							
				<div class="row-fluid">								
					<div class="span4">
						<div class="widget-box">
							<div class="widget-header widget-header-flat widget-header-small">
                                <h4>
                                <i class="icon-user"></i>
                                Add Stock
                                </h4>                                                
                          	</div>
							<div class="widget-body">
								<div class="widget-main">												
									<div id="dashboard3">
										<div id="owner_div">
	<div class="control-group warning">
      <label class="control-label" for="inputWarning"><?php if(isset($_SESSION['error'])) echo 	$_SESSION['error']; ?></label>
    </div>               
<form name="form_owners" id="form_owners" method="post" action="#">

    <table>                                                
        <tr>
            <td>Name:</td>
            <td>
                <select name="ddlName" id="ddlName" class="selectpicker" data-style="btn-primary">
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
        </tr>
    
        <tr>
            <td>Type:</td>
            <td>
                <select name="ddlType" id="ddlType" class="selectpicker" data-style="btn-primary">
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
        </tr>
    <tr>
        <td>Amount:</td>
        <td ><input type="text" name="txtAmount" id="txtAmount" placeholder="Amount" /></td>
    </tr>
    <tr>
        <td>Quantity:</td>
        <td ><input type="text" name="txtQuantity" id="txtQuantity" placeholder="Quantity" /></td>
    </tr>
     <tr>
        <td>Receip Id:</td>
        <td ><input type="text" name="txtReceipId" id="txtReceipId" placeholder="Receip Id" /></td>
    </tr>
    <tr>
        <td>Description:</td>
        <td ><textarea id="txtDescription" name="txtDescription" rows="5" cols="5" placeholder="Description"></textarea></td>
    </tr>
    
    <tr>
        <td></td>
        <td ><input type="submit" class="btn btn-lg btn-primary btn-block" name="txtSubmit" id="txtSubmit" value="Add Stock" class="btn btn-small btn-primary"/>
        </td>
    </tr>
    </table>
</form>
                                            
										</div>
										<div id="msgdiv"></div>
									</div>
								</div><!--/widget-main-->
							</div><!--/widget-body-->
						</div><!--/widget-box-->
					</div><!--/span-->          		</div><!--/row-->
				<div class="hr hr32 hr-dotted"></div>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->                                                            
	</div><!--/.page-content-->
</div>
<!---------------------------------------------------------------------------------------->
<!---------------------------------Main Content------------------------------------------->
<!---------------------------------------------------------------------------------------->
<?php include('include/footer.php') ?>
<script type="text/javascript">
	$("#stock").addClass("active");
	$("#add_stock").addClass("active");
</script>
	</body>
</html>
