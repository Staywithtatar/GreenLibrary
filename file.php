<!DOCTYPE html>
<?php 
   
	require_once 'conn.php'
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NPRU</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <style>
        .footer-title {
            font-family: 'Righteous', cursive;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row my-2">
            <div class="col-md-12">
                <h4 class="text-center fw-bold text-uppercase">เอกสารประกอบ</h4>
                <hr>
            </div>
        </div>
        <table id="table" class="table table-bordered dt-responsive table-hover" style="width:100%;">
            <thead class="table-dark" style="background-color: #343a40; color: #fff;">
                <tr>
                    <th>บทที่</th>
                    <th width="30%">ชื่อเอกสาร</th>
                    <th>ประเภทไฟล์</th>
                    <th>วันที่อัปโหลด</th>
                    <th style="text-align:center">Download</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query1 = mysqli_query($conn, "SELECT * FROM `storage`") or die(mysqli_error());
                while ($fetch1 = mysqli_fetch_array($query1)) {
                ?>
                    <tr class="del_file<?php echo $fetch1['store_id'] ?>">
                        <td style="text-align:center"><?php echo $no++; ?></td>
                        <td><?php echo $fetch1['nama'] ?></td>
                        <td><?php echo $fetch1['file_type'] ?></td>
                        <td><?php echo $fetch1['date_uploaded'] ?></td>
                        <td style="text-align:center">
                            <a href="files/<?php echo $fetch1['filename'] ?>" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-download"></span> Download</a>
                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
    <div id="footer" style="text-align:center">
        <label class="footer-title">&copy; NPRU | NPRU <?php echo date("Y", strtotime("+8 HOURS")) ?></label>
    </div>
    <?php include 'script.php' ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.btn_remove').on('click', function () {
                var store_id = $(this).attr('id');
                $("#modal_remove").modal('show');
                $('#btn_yes').attr('name', store_id);
            });

            $('#btn_yes').on('click', function () {
                var id = $(this).attr('name');
                $.ajax({
                    type: "POST",
                    url: "remove_file.php",
                    data: {
                        store_id: id
                    },
                    success: function (data) {
                        $("#modal_remove").modal('hide');
                        $(".del_file" + id).empty();
                        $(".del_file" + id).html("<td colspan='4'><center class='text-danger'>Menghapus...</center></td>");
                        setTimeout(function () {
                            $(".del_file" + id).fadeOut('slow');
                        }, 1000);

                    }
                });
            });
        });
    </script>
</body>
</html>