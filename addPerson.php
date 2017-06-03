<?php 
session_start(); 
if(!isset($_SESSION['SN_USER']))
{
	header("location:index.php");
}


if(isset($_POST['txtSubmit']))
{
	
	include('include/Person.php');
	$person = new Person();
	$SN_Name=$_POST['txtName'];
	$SN_Company=$_POST['txtCompany'];
	$SN_TypeId=$_POST['ddlType'];
	$SN_Title=$_POST['txtTitle'];
	$SN_Phone=$_POST['txtPhone'];
	$SN_Mobile=$_POST['txtMobile'];
	$SN_Email=$_POST['txtEmail'];
	$SN_Website=$_POST['txtWebsite'];
	$SN_Description=$_POST['txtDescription'];
	$Record_on= date('Y-m-d H:i:s');
	
	$result = $person->AddPerson($SN_Name,$SN_Company,$SN_TypeId,$SN_Title,$SN_Phone,$SN_Mobile,$SN_Email,$SN_Website,$SN_Description,$Record_on);
	
	//echo $result;	
	//print_r($result);
	
	if($result==1)
	{
		header('location:viewPerson.php');
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
        <?php include('include/Type.php'); ?>
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
                                Create New Person
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
            <td width="100px">Name:</td>
            <td ><input type="text" name="txtName" id="txtName" placeholder="Name" required/></td>
        </tr>
    <tr>
        <td>Company:</td>
        <td ><input type="text" name="txtCompany" id="txtCompany" placeholder="Company" /></td>
    </tr>
    <tr>
        <td>Type:</td>
        <td>
        	<select name="ddlType" id="ddlType" class="selectpicker" data-style="btn-primary">
			<?php
                $type= new Type();
                $result=$type->GetTotalType();
				//print_r($result);
                foreach($result as $value)
                {
                    echo '<option value="'.$value['SN_Id'].'">'.$value['SN_Description'].'</option>';
                }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Title:</td>
        <td ><input type="text" name="txtTitle" id="txtTitle" placeholder="Title" /></td>
    </tr>
    <tr>
        <td>Phone:</td>
        <td ><input type="text" name="txtPhone" id="txtPhone" placeholder="Phone" /></td>
    </tr>
    <tr>
        <td>Mobile:</td>
        <td ><input type="text" name="txtMobile" id="txtMobile" placeholder="Mobile" /></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td ><input type="email" name="txtEmail" id="txtEmail" placeholder="Email" /></td>
    </tr>
    <tr>
        <td>Website:</td>
        <td ><input type="text" name="txtWebsite" id="txtWebsite" placeholder="Website" /></td>
    </tr>
    <tr>
        <td>Description:</td>
        <td ><textarea id="txtDescription" name="txtDescription" rows="5" cols="5" placeholder="Description"></textarea></td>
    </tr>
    
    <tr>
        <td></td>
        <td ><input type="submit" class="btn btn-lg btn-primary btn-block" name="txtSubmit" id="txtSubmit" value="Create Person" class="btn btn-small btn-primary"/>
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
	$("#new_person").addClass("active");
</script>
	</body>
</html>
