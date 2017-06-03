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
                                Create New Person
                                </h4>                                                
                          	</div>
							<div class="widget-body">
								<div class="widget-main">												
									<div id="dashboard3">
										<div id="owner_div">
                                        
                                            <form name="form_owners" id="form_owners" method="post">
                                            <table>                                                
                                            <tr>
                                            <td>User:</td>
                                            <td ><input type="text" name="owner_channel" id="owner_channel" placeholder="Channel Name" /></td>
                                            </tr>
                                            <tr>
                                            <td>Login&nbsp;ID:</td>
                                            <td ><input type="text" name="owner_username" id="owner_username" placeholder="Login ID" /></td>
                                            </tr>
                                            <tr>
                                            <td>Password:&nbsp;</td>
                                            <td ><input type="password" name="owner_password" id="owner_password" placeholder="Password" /></td>
                                            </tr>
                                            <tr>
                                            <td>Status:</td>
                                            <td ><input type="radio" name="owner_status" id="owner_status" value="1" checked="checked" >
                                            <span class="lbl">Active</span>
                                            <input type="radio" name="owner_status" id="owner_status" value="0">&nbsp;&nbsp;&nbsp;
                                            <span class="lbl">Deactive</span>
                                            </td>
                                            </tr>
                                            <tr><td>&nbsp;</td></tr>
                                            <tr>
                                            <td></td>
                                            <td ><input type="button" name="owner_submit" id="owner_submit" value="Create User" class="btn btn-small btn-primary" onClick="func_owner_validation()"/>
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
	$("#services").addClass("active");
	$("#all_Reports").addClass("active");
</script>
	</body>
</html>
