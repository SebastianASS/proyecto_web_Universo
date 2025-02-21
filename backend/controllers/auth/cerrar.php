<?php
session_start();
session_destroy();
header("Location: /proyecto-universoCop/index.php");
exit();
?>

