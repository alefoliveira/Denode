<?php
/* logout.php */
session_start();
session_unset();
session_destroy();
header("Location:denodelogin.php?erro=4");
?>