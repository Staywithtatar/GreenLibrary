<!DOCTYPE html>
<?php 
	session_start();
	if(!ISSET($_SESSION['pegawai'])){
		header("location: index.php");
	}
	require_once 'admin/conn.php'
?>
<html lang="en">
	<head>
		<title>SDN 001 File</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="admin/css/jquery.dataTables.css" />
		<link rel="stylesheet" type="text/css" href="admin/css/style.css" />
	</head>
<body>
	<div class="col-md-12">
		<div class="panel panel">
			<div class="panel-heading" style="margin-top:5px;">
				<h1 class="panel-title"style="text-align:center"> <b> Update Detail</b></h1>
			</div>
			<?php
				$query = mysqli_query($conn, "SELECT * FROM `pegawai` WHERE `stud_id` = '$_SESSION[pegawai]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
			?>
			<div class="panel-body">
				<form method="POST" action="update_query.php">
					<div class="form-group">
						<label>ID Pegawai:</label> 
						<input type="text" class="form-control" value="<?php echo $fetch['stud_no']?>" name="stud_no" readonly="readonly"/>
						<input type="hidden" value="<?php echo $fetch['stud_id']?>" name="stud_id"/>
					</div>
					<div class="form-group">
						<label>Nama Pegawai:</label> 
						<input type="text" class="form-control" value="<?php echo $fetch['pegawai']?>" name="pegawai" required="required"/>
					</div>
					<div class="form-group">
						<label>NIP/NRG:</label> 
						<input type="text" class="form-control" value="<?php echo $fetch['nip']?>" name="nip" required="required"/>
					</div>
					<div class="form-group" name="gender" required="required">
						<label>Jenis Kelamin:</label> 
						<select class="form-control" name="gender">
							<option value=""></option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label>Password:</label> 
						<input type="password" class="form-control" value="" name="password" required="required"/>
					</div>
					<button class="btn btn-primary" name="update"><span class="glyphicon glyphicon-edit"></span> Update</button> <a class="btn btn-danger ml-2" href="pegawai_profile.php">Batal</a> 
				</form>
			</div>
		</div>
	</div>
	<?php include 'script.php'?>
</body>
</html>