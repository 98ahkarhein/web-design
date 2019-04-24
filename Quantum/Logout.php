<?php  
session_start();
session_destroy();
session_regenerate_id();
header("Location:home_page.php");
?>