<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

<?php include('../header.php') ?>

<?php include('admin.header.php') ?>

<div class="container jumbotron">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2 class="text-center">ADD TASKS FOR KIDS</h2>
			<form action="" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    
				     Work Name:<input type="text" class="form-control" name="name" placeholder="name">
				  </div>
				  <div class="form-group">
				      Minimum Time: <input type="text" class="form-control" name="mint" placeholder="Enter City">
				  </div>
				  <div class="form-group">
				    
				    Maximum Time:<input type="text" class="form-control" name="maxt" placeholder="Enter Parent Phone No.">
				  </div>
				  

				  <button type="submit" name="submit" class="btn btn-success btn-lg">INSERT</button>
			</form>
		</div>
	</div>
</div>

<?php include('../footer.php') ?>

<?php 

	if (isset($_POST['submit'])) {
		if (!empty($_POST['name']) && !empty($_POST['maxt'])) {
		
			include ('../dbcon.php');
			$name=$_POST['name'];
			$mint=$_POST['mint'];
			$maxt=$_POST['maxt'];
		

			$sql = "INSERT INTO task ( `name`, `mint`, `maxt`) VALUES ('$name','$mint','$maxt')";

			$run = mysqli_query($conn,$sql);

			if ($run == true) {
				
				?>
				<script>
					alert("Data Inserted Successfully");
				</script>
				<?php
			} else {
				echo "Error : ".$sql."<br>". mysqli_error($conn); 
			}
		} else {
				?>
				<script>
					alert("Please insert atleast roll no. and fullname");
				</script>
				<?php
		}


	}

 ?>








