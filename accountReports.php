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
<table class="table table-bordered table-striped" style="width:40%" cellpadding="0" cellspacing="0">
    <tr> 
        <th class="btn-info btn-mini"><b>Name</b></th>
        <td>
        	<input id="txtName" name="txtName" placeholder="Name"/>
        </td>
        <td>
        	<input type="submit" class="btn btn-lg btn-primary btn-block" name="txtSearch" id="txtSearch" value="Search" class="btn btn-small btn-primary"/>
        </th>
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
		$result=$person->GetDetailAccount($SN_Name);	
	}
	else
	{
		$result=$person->GetDetailAccount("");	
	}
	
		
	if($result!="")
	{
?>
    <table class="table table-bordered table-striped" style="width:100%">
        <tr> 
            <th class="btn-info btn-mini"><b>Sr#</th>
            <th class="btn-info btn-mini"><b>Name</th>	
            <th class="btn-info btn-mini"><b>Debit 	</th>
            <th class="btn-info btn-mini"><b>Credit</th>
            <th class="btn-info btn-mini"><b>Remaining</th>
            <!--<th class="btn-info btn-mini"><b>Delete</th>-->
        </tr>
        
        <?php
            $i=0;
            foreach($result as $value)
            {
                $i++;
                echo '<tr id=TR'.$value['SN_PersonId'].'>';
                echo '	<input type="hidden" id="hndID" name="hndID" value="'.$value['SN_PersonId'].'" />';
                echo '	<td>'.$i.'</td>';
                echo '	<td><a href="accountDetail.php?txtPersonId='.$value['SN_PersonId'].'">'.$value['SN_Name'].'</a></td>';
				$debit=$value['SN_Debit'];
				$credit=$value['SN_Credit'];
				
                echo '	<td>'.$debit.'</td>';
                echo '	<td>'.$credit.'</td>';
				;
				$diff=(intval($debit))-(intval($credit));
				echo '	<td>'.$diff.'</td>';
                /*echo '	<td><a class="btn btn-danger" href="#" onclick="javascript:deleteThis('.$value['SN_AccountId'].')">
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
	$("#report").addClass("active");
	$("#account_reports").addClass("active");
	function deleteThis(personID)
	{
		$("#TR"+personID).fadeOut();
		$.post("general.php", { personID: personID , type: "1" },
		function(data) {
			$("#TR"+personID).fadeOut();
		});
	}
</script>
	</body>
</html>
