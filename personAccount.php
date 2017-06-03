<?php 
session_start(); 
if(!isset($_SESSION['SN_USER']))
{
	header("location:index.php");
}

include('include/Person.php');
if(isset($_POST['txtSubmit']))
{
	
	include('include/Account.php');
	$account = new Account();
	$SN_PersonId=$_POST['ddlType'];
	$SN_ReceipId=$_POST['txtReceipId'];
	$SN_Debit=$_POST['txtDebit'];
	$SN_Credit=$_POST['txtCredit'];
	$SN_Description=$_POST['txtDescription'];
	$Record_on= date('Y-m-d H:i:s');
	
	$result = $account->AddAccount($SN_PersonId,$SN_ReceipId,$SN_Debit,$SN_Credit,$SN_Description,$Record_on);
	
	//echo $result;	
	//print_r($result);
	
	if($result==1)
	{
		header('location:accountReports.php');
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
                                Add Person Amount
                                </h4>                                                
                          	</div>
							<div class="widget-body">
								<div class="widget-main">												
									<div id="dashboard3">
										<div id="owner_div">
	<div class="control-group warning">
      <label class="control-label" for="inputWarning"><?php  if(isset($_SESSION['error'])) echo $_SESSION['error']; ?></label>
    </div>               
<form name="form_owners" id="form_owners" method="post" action="#">

    <table>                                                
        <tr>
            <td>Name:</td>
            <td>
                <select name="ddlType" id="ddlType" class="selectpicker" data-style="btn-primary">
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
            <td>Receip Id:</td>
            <td ><input type="text" name="txtReceipId" id="txtReceipId" placeholder="Receip Id" /></td>
        </tr>
        <tr>
            <td>Debit:</td>
            <td ><input type="text" name="txtDebit" id="txtDebit" placeholder="Debit" /></td>
        </tr>
        <tr>
            <td>Credit:</td>
            <td ><input type="text" name="txtCredit" id="txtCredit" placeholder="Credit" /></td>
        </tr>
		<tr>
        <td>Description:</td>
            <td ><textarea id="txtDescription" name="txtDescription" rows="5" cols="5" placeholder="Description"></textarea></td>
        </tr>
        <td></td>
        <td ><input type="submit" class="btn btn-lg btn-primary btn-block" name="txtSubmit" id="txtSubmit" value="Update"  class="btn btn-small btn-primary"/>
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
	$("#owners").addClass("active");
	$("#person_account").addClass("active");
</script>
	</body>
</html>
