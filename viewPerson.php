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
		$result=$person->GetSearchPersonByName($SN_Name);	
	}
	else
	{
		$result=$person->GetTotalPerson();	
	}
	
	if($result!="")
	{
?>
    <table class="table table-bordered table-striped" style="width:100%">
        <tr> 
            <th class="btn-info btn-mini"><b>Sr#</th>
            <th class="btn-info btn-mini"><b>Name</th>
            <th class="btn-info btn-mini"><b>Company</th>
            <th class="btn-info btn-mini"><b>Type</th>
            <th class="btn-info btn-mini"><b>Title</th>
            <th class="btn-info btn-mini"><b>Phone</th>
            <th class="btn-info btn-mini"><b>Mobile</th>
            <th class="btn-info btn-mini"><b>Email</th>
            <th class="btn-info btn-mini"><b>Website</th>
            <th class="btn-info btn-mini"><b>Description</th>
            <th class="btn-info btn-mini"><b>Record Date</th>
            <th class="btn-info btn-mini"><b>Delete</th>
        </tr>
        
        <?php
            $i=0;
            foreach($result as $value)
            {
                $i++;
                echo '<tr id=TR'.$value['SN_PersonId'].'>';
                echo '	<input type="hidden" id="hndID" name="hndID" value="'.$value['SN_PersonId'].'" />';
                echo '	<td>'.$i.'</td>';
                echo '	<td>'.$value['SN_Name'].'</td>';
                echo '	<td>'.$value['SN_Company'].'</td>';
                echo '	<td>'.$value['SN_TypeId'].'</td>';
                echo '	<td>'.$value['SN_Title'].'</td>';
                echo '	<td>'.$value['SN_Phone'].'</td>';
                echo '	<td>'.$value['SN_Mobile'].'</td>';
                echo '	<td>'.$value['SN_Email'].'</td>';
                echo '	<td>'.$value['SN_Website'].'</td>';
                echo '	<td>'.$value['SN_Description'].'</td>';
                echo '	<td>'.$value['Record_on'].'</td>';
                echo '	<td><a class="btn btn-danger" href="#" onclick="javascript:deleteThis('.$value['SN_PersonId'].')">
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
	$("#owners").addClass("active");
	$("#view_person").addClass("active");
	function deleteThis(personID)
	{
		if (confirm("Do you want to delete the record?")) 
		{
			$("#TR"+personID).fadeOut();
			$.post("general.php", { personID: personID , type: "1" },
			function(data) {
				$("#TR"+personID).fadeOut();
			});
		}
		return false;
	}
</script>
	</body>
</html>
