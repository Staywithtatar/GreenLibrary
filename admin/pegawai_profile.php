<!DOCTYPE html>
<?php 
	
	require_once 'conn.php'
?>
<html lang="en">
	<head>
		<title>JNC FMS</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="assets/css/datatables-1.10.25.min.css" />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.bootstrap.min.css" />
      <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet" />
	</head>
    <body style="background-image:url(admin/images/ed.jpg);background-size: cover;">
	<div class="col-md-12">
	<div style="margin-top:5px; margin-bottom:15px; text-align:center; background-color:#00a2d6; padding:2px; "> 
	<h3 style="margin-top:10px"> <b> </b></h3></div>
	 <button style="margin-top:-5px;" class="btn btn-primary" href="#"  data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Data</button>
	
		<div class="panel panel-default" style="margin-top:10px">
			<div class="panel-body">
			   <table id="table" class="table table-bordered dt-responsive table-hover" style="width:100%;">
				 <thead class="table-dark">
						<tr>
							<th>No</th>
							<th width="20%">Nama_File</th>
							<th>File_Upload</th>
							<th>Tipe File</th>
							<th>Tanggal Upload</th>
							<th style="text-align:center">Download</th>
							<th style="text-align:center">Hapus</th>
						</tr>
					</thead>
					<tbody>
					<?php
						  $no = 1;
							$query1 = mysqli_query($conn, "SELECT * FROM `storage`") or die(mysqli_error());
							while($fetch1 = mysqli_fetch_array($query1)){
						  ?>
						   <tr class="del_file<?php echo $fetch1['store_id']?>">
						   	<td style="text-align:center"><?php echo $no++; ?></td>
						    <td><?php echo $fetch1['nama']?></td>
							<td><?php echo substr($fetch1['filename'], 0 ,30)?></td>
							<td><?php echo $fetch1['file_type']?></td>
							<td><?php echo $fetch1['date_uploaded']?></td>
							<td style="text-align:center">
							 <a href="files/<?php echo $fetch1['filename']?>" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-download"></span> Download</a>
							 </td>
							 <td style="text-align:center"> 
							 <a href="remove_file.php?store_id=<?= $fetch1['store_id']; ?>" style="font-weight: 600;" onclick="return confirm('Yakin ingin menghapus data file <?= $fetch1['filename']; ?> ?');" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
							</td>
						</tr>
						<?php
						}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
<form method="POST" enctype="multipart/form-data" action="save_file.php">
				<label>Nama File</label>
				<input type="text" class="form-control" name="nama" placeholder="Input nama file" required><br>
					<input type="file" name="file" size="4" style="background-color:#fff;" required="required" />
					<br />
					<input type="hidden" name="stud_no" value="<?php echo $fetch1['stud_no']?>"/>
					<button class="btn btn-success" name="save"><span class="glyphicon glyphicon-plus"></span> Simpan File</button>
					<a type="button" class="btn btn-primary" data-dismiss="modal">Tutup</a>
				</form>
<div class="modal fade" id="myModal" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title" style="text-align:center;font-weight: bold;">File Management</h4>
                </div>
				<div class="panel-body">
				<br><br>
				
				<form method="POST" enctype="multipart/form-data" action="save_file.php">
				<label>Nama File</label>
				<input type="text" class="form-control" name="nama" placeholder="Input nama file" required><br>
					<input type="file" name="file" size="4" style="background-color:#fff;" required="required" />
					<br />
					<input type="hidden" name="stud_no" value="<?php echo $fetch1['stud_no']?>"/>
					<button class="btn btn-success" name="save"><span class="glyphicon glyphicon-plus"></span> Simpan File</button>
					<a type="button" class="btn btn-primary" data-dismiss="modal">Tutup</a>
				</form>
				<br style="clear:both;"/>
			</div>
		</div>
	</div>
</div>
	<div id = "footer" style="text-align:center">
		<label class = "footer-title">&copy; JNC Edukasi | FMS <?php echo date("Y", strtotime("+8 HOURS"))?></label>
	</div>
	
<?php include 'script.php'?>
<script type="text/javascript">
$(document).ready(function(){
	$('.btn_remove').on('click', function(){
		var store_id = $(this).attr('id');
		$("#modal_remove").modal('show');
		$('#btn_yes').attr('name', store_id);
	});
	
	$('#btn_yes').on('click', function(){
		var id = $(this).attr('name');
		$.ajax({
			type: "POST",
			url: "remove_file.php",
			data:{
				store_id: id
			},
			success: function(data){
				$("#modal_remove").modal('hide');
				$(".del_file" + id).empty();
				$(".del_file" + id).html("<td colspan='4'><center class='text-danger'>Menghapus...</center></td>");
				setTimeout(function(){
					$(".del_file" + id).fadeOut('slow');
				}, 1000);
				
			}
		});
	});
});
</script>	
</body>
</html>