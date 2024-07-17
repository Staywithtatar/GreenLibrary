<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <?php
session_start();
include("includes/config.php");
$_SESSION['login']=="";
session_unset();
session_destroy();

?>
        <script language="javascript">
document.location = "index.php";
        </script>
        