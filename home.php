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

        <?php include('include/Type.php') ?>

<!---------------------------------------------------------------------------------------->

<!---------------------------------Main Content------------------------------------------->

<!---------------------------------------------------------------------------------------->

<div class="main-content">

        <div class="page-header" align="center">

            <div class="hero-unit">
                <h1>Welcome <small>Snowra Builders</small></h1>
            </div>	

        </div>		
        	        	                                                         

</div>

<!---------------------------------------------------------------------------------------->

<!---------------------------------Main Content------------------------------------------->

<!---------------------------------------------------------------------------------------->

<?php include('include/footer.php') ?>


	</body>

</html>

