<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
session_unset($_SESSION['logname']);
echo "<script>window.parent.location.href='login.php'</script>";


?> 