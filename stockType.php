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
	$type = new Type();
	$txtPersonType=$_POST['txtPersonType'];
	
	$result = $type->AddStockType($txtPersonType);
	
	//echo $result;	
	//print_r($result);
	
	if($result==1)
	{
		header('location:stockType.php');
	}
	else
	{
		$_SESSION['error']="Error please try again";
		header('location:stockType.php');
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
                                Total Stock Type
                                </h4>                                                
                          	</div>
							<div class="widget-body">
								<div class="widget-main">												
									<div id="dashboard3">
										<div id="owner_div">
                                            
											<select name="ddlType" id="ddlType" multiple="multiple">
											<?php
												$type= new Type();
												$result=$type->GetStockType();
												//print_r($result);
												foreach($result as $value)
												{
													echo '<option value="'.$value['SN_Id'].'">'.$value['SN_Description'].'</option>';
												}
											?>
											</select>   
										</div>
										<div id="msgdiv"></div>
									</div>
								</div><!--/widget-main-->
							</div><!--/widget-body-->
						</div><!--/widget-box-->
					</div><!--/span-->          		

            <div class="span4">
						<div class="widget-box">
							<div class="widget-header widget-header-flat widget-header-small">
                                <h4>
                                <i class="icon-user"></i>
                                Add Stock Type
                                </h4>                                                
                          	</div>
							<div class="widget-body">
								<div class="widget-main">												
									<div id="dashboard3">
										<div id="owner_div">
                                        	<div class="control-group warning">
                                              <label class="control-label" for="inputWarning"><?php if(isset($_SESSION['error'])) echo 	$_SESSION['error']; ?></label>
                                            </div>
                                        	<form class="form-horizontal" name="form_persontype" id="form_persontype" method="post" action="#">
                                                <table>                                                
                                                    <tr>
                                                        <td><label>Person Type:</label></td>
                                                        <td ><input type="text" name="txtPersonType" id="txtPersonType" placeholder="Person Type" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td ><input type="submit" class="btn btn-lg btn-primary btn-block" name="txtSubmit" id="txtSubmit" value="Add" class="btn btn-small btn-primary"/>
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
	$("#type").addClass("active");
	$("#stock_type").addClass("active");
</script>
	</body>
</html>
