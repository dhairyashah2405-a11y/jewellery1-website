<?php
// Root redirection fallback for local servers where mod_rewrite is not active
header("Location: frontend/home.php");
exit();
?>
