<script src = "js/jquery-3.2.1.min.js"></script>
<script src = "js/bootstrap.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
                var table = $('#table').DataTable( {
                dom: 
                "<'row text-white'<'col-md-4'l><'col-md-4'B><'col-md-4'f>>" +
                "<'row text-white'<'col-md-12'tr>>" +
                "<'row text-white'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[[5, 10, 20, 30, 40, 50, 100, -1], [5, 10, 20, 30, 40, 50, 100, "All"]],
            } );
        
             ( '#table_wrapper' );
        });
    </script>
	